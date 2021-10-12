<?php

namespace Tests\Feature\Admin\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::factory()->create([
            'name' => 'Product 1',
            'slug' => 'product-1',
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.products');
        $this->deleteRouteUrl = route('admin.products.delete', $this->product->id);
        $this->signInAdministrator();
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.products.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_products_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Products')
            ->assertViewIs('admin.products.index');
    }

    /** @test */
    public function guest_user_cannot_access_products_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_product()
    {
        $product = Product::withTrashed()->first();

        $response = $this->delete($this->deleteUrl('delete', $product->id));

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product deleted successfully.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);

        $this->assertNotNull($product->fresh()->deleted_at);
        $this->assertEquals($product->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_product_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_product()
    {
        $product = Product::withTrashed()->orderBy('id', 'DESC')->first();
        $product->delete();
        $this->assertNotNull($product->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $product->id));

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product restored successfully.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);

        $this->assertNull($product->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_product_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_product()
    {
        $product = Product::withTrashed()->orderBy('id', 'DESC')->first();
        $product->delete();
        $this->assertNotNull($product->deleted_at);

        $this->assertEquals(1, Product::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $product->id));

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product deleted permanently.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);

        $this->assertEquals(0, Product::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_product_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. 50,
            ]);
    }
}
