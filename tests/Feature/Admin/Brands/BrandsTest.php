<?php

namespace Tests\Feature\Admin\Brands;

use Tests\TestCase;
use App\Models\Brand;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.brands');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_brands_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Brands')
            ->assertViewIs('admin.brands.index');
    }

    /** @test */
    public function only_admin_can_access_the_brands_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_brands_list()
    {
        $this->withoutExceptionHandling();
        $this->assertEmpty(Brand::all());

        Brand::factory(5)->create();

        $this->assertNotEmpty(Brand::all());
        $this->assertCount(5, Brand::all());
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
