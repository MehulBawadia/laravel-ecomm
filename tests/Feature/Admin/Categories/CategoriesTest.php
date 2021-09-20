<?php

namespace Tests\Feature\Admin\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.categories');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_categories_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Categories')
            ->assertViewIs('admin.categories.index');
    }

    /** @test */
    public function only_admin_can_access_the_categories_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_categories_list()
    {
        $this->withoutExceptionHandling();

        $this->assertEmpty(Category::all());

        Category::factory(5)->create();

        $this->assertNotEmpty(Category::all());
        $this->assertCount(5, Category::all());
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
