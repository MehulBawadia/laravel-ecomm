<?php

namespace Tests\Feature\Admin\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditSeoInformationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create([
            'meta_title' => 'Product 1 - Meta Title'
        ]);

        $this->getRouteUrl = route('admin.products.edit', $this->product->id);
        $this->patchRouteUrl = route('admin.products.updateSeo', $this->product->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_product_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->product->name)
            ->assertSee('SEO Details')
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
    public function admin_may_edit_the_seo_details_of_the_product()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Product 1 - Meta Title', Product::first()->meta_title);

        $this->patch($this->patchRouteUrl, $this->mergeProductPayload([
            'meta_title' => 'Product New 1 - Meta Title Here',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product SEO details updated successfully.',
        ]);

        $this->assertEquals('Product New 1 - Meta Title Here', Product::first()->meta_title);
    }

    /** @test */
    public function the_meta_title_field_is_required()
    {
        $payload = $this->mergeProductPayload(['meta_title' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('meta_title');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('meta_title'),
            'The meta title field is required.'
        );
    }

    /** @test */
    public function meta_title_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeProductPayload([
            'meta_title' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('meta_title');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('meta_title'),
            'The meta title must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_meta_description_field_is_required()
    {
        $payload = $this->mergeProductPayload(['meta_description' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('meta_description');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('meta_description'),
            'The meta description field is required.'
        );
    }

    /** @test */
    public function meta_description_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeProductPayload([
            'meta_description' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('meta_description');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('meta_description'),
            'The meta description must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function meta_keywords_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeProductPayload([
            'meta_keywords' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('meta_keywords');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('meta_keywords'),
            'The meta keywords must not be greater than 255 characters.'
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
            'meta_title' => $this->faker->words(5, true),
            'meta_description' => $this->faker->sentences(2, true),
            'meta_keywords' => $this->faker->words(5, true),
        ], $payload);
    }
}
