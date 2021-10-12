<?php

namespace Tests\Feature\Admin\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditGeneralInformationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create([
            'name' => 'Product 1',
            'slug' => 'product-1',
        ]);

        $this->getRouteUrl = route('admin.products.edit', $this->product->id);
        $this->patchRouteUrl = route('admin.products.updateGeneral', $this->product->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_product_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->product->name)
            ->assertSee('General Information')
            ->assertViewIs('admin.products.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_product_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_product()
    {
        $this->get(route('admin.products.edit', mt_rand(2, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_edit_the_general_information_of_the_product()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Product 1', Product::first()->name);
        $this->assertEquals('product-1', Product::first()->slug);

        $this->patch($this->patchRouteUrl, $this->mergeProductPayload([
            'name' => 'Product New 1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product updated successfully.',
        ]);

        $this->assertEquals('Product New 1', Product::first()->name);
        $this->assertEquals('product-new-1', Product::first()->slug);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeProductPayload(['name' => '']);

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
        $payload = $this->mergeProductPayload([
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
    public function the_code_field_is_required()
    {
        $payload = $this->mergeProductPayload(['code' => '']);

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $data)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code must only contain letters, numbers, dashes and underscores.'
        );
    }

    /** @test */
    public function the_sku_field_is_required()
    {
        $payload = $this->mergeProductPayload(['sku' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('sku');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('sku'),
            'The sku field is required.'
        );
    }

    /** @test */
    public function sku_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeProductPayload([
            'sku' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('sku');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('sku'),
            'The sku must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_rate_field_is_required()
    {
        $payload = $this->mergeProductPayload(['rate' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('rate');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('rate'),
            'The rate field is required.'
        );
    }

    /** @test */
    public function rate_must_be_numeric()
    {
        $payload = $this->mergeProductPayload([
            'rate' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('rate');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('rate'),
            'The rate must be a number.'
        );
    }

    /** @test */
    public function the_rate_must_be_at_least_0()
    {
        $payload = $this->mergeProductPayload(['rate' => -50.25]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('rate');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('rate'),
            'The rate must be at least 0.0.'
        );
    }

    /** @test */
    public function the_tax_percent_field_is_required()
    {
        $payload = $this->mergeProductPayload(['tax_percent' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('tax_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('tax_percent'),
            'The tax percent field is required.'
        );
    }

    /** @test */
    public function tax_percent_must_be_numeric()
    {
        $payload = $this->mergeProductPayload([
            'tax_percent' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('tax_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('tax_percent'),
            'The tax percent must be a number.'
        );
    }

    /** @test */
    public function the_tax_percent_must_be_at_least_0()
    {
        $payload = $this->mergeProductPayload(['tax_percent' => -50.25]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('tax_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('tax_percent'),
            'The tax percent must be at least 0.0.'
        );
    }

    /** @test */
    public function the_tax_percent_not_be_greater_than_100()
    {
        $payload = $this->mergeProductPayload(['tax_percent' => 250.25]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('tax_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('tax_percent'),
            'The tax percent must not be greater than 100.00.'
        );
    }

    /** @test */
    public function discount_percent_must_be_numeric()
    {
        $payload = $this->mergeProductPayload([
            'discount_percent' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('discount_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('discount_percent'),
            'The discount percent must be a number.'
        );
    }

    /** @test */
    public function the_discount_percent_not_be_greater_than_100()
    {
        $payload = $this->mergeProductPayload(['discount_percent' => 250.25]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('discount_percent');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('discount_percent'),
            'The discount percent must not be greater than 100.00.'
        );
    }

    /** @test */
    public function the_short_description_may_not_be_greater_than_255_characters()
    {
        $payload = $this->mergeProductPayload([
            'short_description' => $this->faker->sentences(30, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('short_description');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('short_description'),
            'The short description must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_stock_field_is_required()
    {
        $payload = $this->mergeProductPayload(['stock' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('stock');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('stock'),
            'The stock field is required.'
        );
    }

    /** @test */
    public function the_stock_must_be_an_integer()
    {
        $payload = $this->mergeProductPayload(['stock' => $this->faker->sentence]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('stock');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('stock'),
            'The stock must be an integer.'
        );
    }

    /** @test */
    public function the_stock_must_be_at_least_0()
    {
        $payload = $this->mergeProductPayload(['stock' => -50]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('stock');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('stock'),
            'The stock must be at least 0.'
        );
    }

    /** @test */
    public function the_sort_number_field_is_required()
    {
        $payload = $this->mergeProductPayload(['sort_number' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('sort_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('sort_number'),
            'The sort number field is required.'
        );
    }

    /** @test */
    public function the_sort_number_must_be_an_integer()
    {
        $payload = $this->mergeProductPayload(['sort_number' => $this->faker->sentence]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('sort_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('sort_number'),
            'The sort number must be an integer.'
        );
    }

    /** @test */
    public function the_sort_number_must_be_at_least_0()
    {
        $payload = $this->mergeProductPayload(['sort_number' => -50]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('sort_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('sort_number'),
            'The sort number must be at least 0.'
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
        ], $payload);
    }
}
