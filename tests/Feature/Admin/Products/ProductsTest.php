<?php

namespace Tests\Feature\Admin\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.products');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_products_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Products')
            ->assertViewIs('admin.products.index');
    }

    /** @test */
    public function only_admin_can_access_the_products_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_products_list()
    {
        $this->withoutExceptionHandling();
        $this->assertEmpty(Product::all());

        Product::factory(5)->create();

        $this->assertNotEmpty(Product::all());
        $this->assertCount(5, Product::all());
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeProductPayload($payload = [])
    {
        return array_merge([
            'name' => $words = $this->faker->words(2, true),
            'code' => strtoupper($this->faker->word),
            'sku' => strtoupper($this->faker->word),
            'slug' => \Illuminate\Support\Str::slug($words),
            'description' => $this->faker->sentences(3, true),
            'rate' => mt_rand(10.00, 999.00),
            'stock' => mt_rand(0, 99),
            'sort_number' => mt_rand(0, 99),
            'tax_percent' => mt_rand(1.0, 9.0),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
