<?php

namespace Tests\Feature\Admin\Tags;

use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.tags');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_tags_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Tags')
            ->assertViewIs('admin.tags.index');
    }

    /** @test */
    public function only_admin_can_access_the_tags_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_tags_list()
    {
        $this->withoutExceptionHandling();
        $this->assertEmpty(Tag::all());

        Tag::factory(5)->create();

        $this->assertNotEmpty(Tag::all());
        $this->assertCount(5, Tag::all());
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
