<?php

namespace Tests\Feature\Admin\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.products');
        $this->postRouteUrl = route('admin.products.store');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_add_new_product_section()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Add New Product')
            ->assertViewIs('admin.products.index');
    }

    /** @test */
    public function only_admin_can_access_the_add_new_product_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_add_a_new_product()
    {
        $this->withoutExceptionHandling();

        $this->post($this->postRouteUrl, $this->mergeProductPayload([
            'name' => 'Product 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product added successfully! Redirecting...',
            'location' => route('admin.products.edit', 1)
        ]);

        $this->assertEquals('Product 1', Product::first()->name);
        $this->assertEquals('product-1', Product::first()->slug);
    }

    /** @test */
    public function the_code_field_is_required()
    {
        $payload = $this->mergeProductPayload(['code' => '']);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code field is required.'
        );
    }

    /** @test */
    public function code_cannot_be_more_than_15_characters()
    {
        $payload = $this->mergeProductPayload([
            'code' => str_replace(' ', '', $this->faker->words(10, true)),
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code must not be greater than 15 characters.'
        );
    }

    /** @test */
    public function code_must_be_unique()
    {
        Product::factory()->create(['code' => 'PRD-123']);
        $payload = $this->mergeProductPayload([
            'code' => 'PRD-123',
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code has already been taken.'
        );
    }

    /** @test */
    public function code_may_contain_only_alphabets_digits_dashes_or_underscores()
    {
        $data = $this->mergeProductPayload([
            'code' => "P/\rND" . array_rand(['!','@','$','%','^','&','*','(',')','#','.','\''])
        ]);

        $this->post($this->postRouteUrl, $data)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code must only contain letters, numbers, dashes and underscores.'
        );
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeProductPayload(['name' => '']);

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
        $payload = $this->mergeProductPayload([
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
