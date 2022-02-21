<?php

namespace Tests\Feature\Admin\Brands;

use Tests\TestCase;
use App\Models\Brand;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddBrandTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.brands');
        $this->postRouteUrl = route('admin.brands.store');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_add_new_brand_section()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Add New Brand')
            ->assertViewIs('admin.brands.index');
    }

    /** @test */
    public function only_admin_can_access_the_add_new_brand_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_add_a_new_brand()
    {
        $this->withoutExceptionHandling();

        $this->post($this->postRouteUrl, $this->mergeBrandPayload([
            'name' => 'Brand 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand added successfully! Redirecting...',
            'location' => route('admin.brands.edit', 1)
        ]);

        $this->assertEquals('Brand 1', Brand::first()->name);
        $this->assertEquals('brand-1', Brand::first()->slug);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeBrandPayload(['name' => '']);

        $this->post($this->postRouteUrl, $payload)
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

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('name'),
            'The name must not be greater than 255 characters.'
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
