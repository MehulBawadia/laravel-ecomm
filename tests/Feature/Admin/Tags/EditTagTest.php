<?php

namespace Tests\Feature\Admin\Tags;

use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditTagTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->tag = Tag::factory()->create([
            'name' => 'Tag 1',
            'slug' => 'tag-1',
            'status' => Tag::DRAFT,
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.tags.edit', $this->tag->id);
        $this->patchRouteUrl = route('admin.tags.update', $this->tag->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_tag_page()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->tag->name)
            ->assertViewIs('admin.tags.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_tag_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_tag()
    {
        $this->get(route('admin.tags.edit', mt_rand(2, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_edit_the_tag()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Tag 1', Tag::first()->name);
        $this->assertEquals('tag-1', Tag::first()->slug);

        $this->patch($this->patchRouteUrl, $this->mergeTagPayload([
            'name' => 'Tag New 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag updated successfully.',
        ]);

        $this->assertEquals('Tag New 1', Tag::first()->name);
        $this->assertEquals('tag-new-1', Tag::first()->slug);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeTagPayload(['name' => '']);

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
        $payload = $this->mergeTagPayload([
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
        $payload = $this->mergeTagPayload(['status' => '']);

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
        $payload = $this->mergeTagPayload([
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
        $payload = $this->mergeTagPayload([
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
        $payload = $this->mergeTagPayload(['description' => $this->faker->sentences(30, true)]);

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
    private function mergeTagPayload($payload = [])
    {
        return array_merge([
            'name' => $words = $this->faker->words(2, true),
            'slug' => \Illuminate\Support\Str::slug($words),
            'status' => \Illuminate\Support\Arr::random([Tag::PUBLISHED, Tag::DRAFT]),
            'description' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
