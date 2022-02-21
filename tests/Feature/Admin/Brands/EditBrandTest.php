<?php

namespace Tests\Feature\Admin\Brands;

use Tests\TestCase;
use App\Models\Brand;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditBrandTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->brand = Brand::factory()->create([
            'name' => 'Brand 1',
            'slug' => 'brand-1',
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.brands.edit', $this->brand->id);
        $this->patchRouteUrl = route('admin.brands.update', $this->brand->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_brand_page()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->brand->name)
            ->assertViewIs('admin.brands.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_brand_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_brand()
    {
        $this->get(route('admin.brands.edit', mt_rand(2, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_edit_the_brand()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Brand 1', Brand::first()->name);
        $this->assertEquals('brand-1', Brand::first()->slug);

        $this->patch($this->patchRouteUrl, $this->mergeBrandPayload([
            'name' => 'Brand New 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand updated successfully.',
        ]);

        $this->assertEquals('Brand New 1', Brand::first()->name);
        $this->assertEquals('brand-new-1', Brand::first()->slug);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeBrandPayload(['name' => '']);

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
        $payload = $this->mergeBrandPayload([
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
    public function the_description_field_is_required()
    {
        $payload = $this->mergeBrandPayload(['description' => $this->faker->sentences(30, true)]);

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
    private function mergeBrandPayload($payload = [])
    {
        return array_merge([
            'name' => $words = $this->faker->words(2, true),
            'slug' => \Illuminate\Support\Str::slug($words),
            'description' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
