<?php

namespace Tests\Feature\Admin\Brands;

use Tests\TestCase;
use App\Models\Brand;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteBrandTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->brand = Brand::factory()->create([
            'name' => 'Brand 1',
            'slug' => 'brand-1',
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.brands');
        $this->deleteRouteUrl = route('admin.brands.delete', $this->brand->id);
        $this->signInAdministrator();
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.brands.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_brands_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Brands')
            ->assertViewIs('admin.brands.index');
    }

    /** @test */
    public function guest_user_cannot_access_brands_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_brand()
    {
        $brand = Brand::withTrashed()->first();

        $response = $this->delete($this->deleteUrl('delete', $brand->id));

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand deleted successfully.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);

        $this->assertNotNull($brand->fresh()->deleted_at);
        $this->assertEquals($brand->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_brand_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_brand()
    {
        $brand = Brand::withTrashed()->orderBy('id', 'DESC')->first();
        $brand->delete();
        $this->assertNotNull($brand->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $brand->id));

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand restored successfully.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);

        $this->assertNull($brand->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_brand_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_brand()
    {
        $brand = Brand::withTrashed()->orderBy('id', 'DESC')->first();
        $brand->delete();
        $this->assertNotNull($brand->deleted_at);

        $this->assertEquals(1, Brand::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $brand->id));

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand deleted permanently.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);

        $this->assertEquals(0, Brand::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_brand_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. 50,
            ]);
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
            'descrption' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
