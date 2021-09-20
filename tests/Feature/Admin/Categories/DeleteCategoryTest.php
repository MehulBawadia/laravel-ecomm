<?php

namespace Tests\Feature\Admin\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->category = Category::factory()->create([
            'name' => 'Category 1',
            'slug' => 'category-1',
            'status' => Category::PUBLISHED,
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.categories');
        $this->deleteRouteUrl = route('admin.categories.delete', $this->category->id);
        $this->signInAdministrator();
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.categories.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_categories_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Categories')
            ->assertViewIs('admin.categories.index');
    }

    /** @test */
    public function guest_user_cannot_access_categories_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_category()
    {
        $category = Category::withTrashed()->first();

        $response = $this->delete($this->deleteUrl('delete', $category->id));

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category deleted successfully.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);

        $this->assertNotNull($category->fresh()->deleted_at);
        $this->assertEquals($category->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_category_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_category()
    {
        $category = Category::withTrashed()->orderBy('id', 'DESC')->first();
        $category->delete();
        $this->assertNotNull($category->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $category->id));

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category restored successfully.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);

        $this->assertNull($category->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_category_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_category()
    {
        $category = Category::withTrashed()->orderBy('id', 'DESC')->first();
        $category->delete();
        $this->assertNotNull($category->deleted_at);

        $this->assertEquals(1, Category::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $category->id));

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category deleted permanently.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);

        $this->assertEquals(0, Category::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_category_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. 50,
            ]);
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
            'descrption' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
