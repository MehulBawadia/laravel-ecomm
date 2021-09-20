<?php

namespace Tests\Feature\Admin\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->category = Category::factory()->create([
            'name' => 'Category 1',
            'slug' => 'category-1',
            'status' => Category::DRAFT,
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.categories.edit', $this->category->id);
        $this->patchRouteUrl = route('admin.categories.update', $this->category->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_category_page()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->category->name)
            ->assertViewIs('admin.categories.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_category_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_category()
    {
        $this->get(route('admin.categories.edit', mt_rand(2, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_edit_the_category()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Category 1', Category::first()->name);
        $this->assertEquals('category-1', Category::first()->slug);

        $this->patch($this->patchRouteUrl, $this->mergeCategoryPayload([
            'name' => 'Category New 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category updated successfully.',
        ]);

        $this->assertEquals('Category New 1', Category::first()->name);
        $this->assertEquals('category-new-1', Category::first()->slug);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeCategoryPayload(['name' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('name'),
            'The name field is required.'
        );
    }

    /** @test */
    public function name_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeCategoryPayload([
            'name' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('name'),
            'The name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_status_field_is_required()
    {
        $payload = $this->mergeCategoryPayload(['status' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('status');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('status'),
            'The status field is required.'
        );
    }

    /** @test */
    public function status_must_be_an_integer()
    {
        $payload = $this->mergeCategoryPayload([
            'status' => 'random-status'
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('status');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('status'),
            'The status must be either draft or published only.'
        );
    }

    /** @test */
    public function status_can_be_either_draft_published_or_temporary_deleted()
    {
        $payload = $this->mergeCategoryPayload([
            'status' => 100
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('status');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('status'),
            'The status must be either draft or published only.'
        );
    }


    /** @test */
    public function the_description_field_is_required()
    {
        $payload = $this->mergeCategoryPayload(['description' => $this->faker->sentences(30, true)]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('description');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('description'),
            'The description must not be greater than 255 characters.'
        );
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeCategoryPayload($payload = [])
    {
        return array_merge([
            'name' => $words = $this->faker->words(2, true),
            'slug' => \Illuminate\Support\Str::slug($words),
            'status' => \Illuminate\Support\Arr::random([Category::PUBLISHED, Category::DRAFT]),
            'description' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
