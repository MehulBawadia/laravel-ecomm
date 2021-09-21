<?php

namespace Tests\Feature\Admin\Tags;

use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteTagTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->tag = Tag::factory()->create([
            'name' => 'Tag 1',
            'slug' => 'tag-1',
            'status' => Tag::PUBLISHED,
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.tags');
        $this->deleteRouteUrl = route('admin.tags.delete', $this->tag->id);
        $this->signInAdministrator();
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.tags.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_tags_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Tags')
            ->assertViewIs('admin.tags.index');
    }

    /** @test */
    public function guest_user_cannot_access_tags_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_tag()
    {
        $tag = Tag::withTrashed()->first();

        $response = $this->delete($this->deleteUrl('delete', $tag->id));

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag deleted successfully.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);

        $this->assertNotNull($tag->fresh()->deleted_at);
        $this->assertEquals($tag->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_tag_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_tag()
    {
        $tag = Tag::withTrashed()->orderBy('id', 'DESC')->first();
        $tag->delete();
        $this->assertNotNull($tag->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $tag->id));

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag restored successfully.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);

        $this->assertNull($tag->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_tag_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_tag()
    {
        $tag = Tag::withTrashed()->orderBy('id', 'DESC')->first();
        $tag->delete();
        $this->assertNotNull($tag->deleted_at);

        $this->assertEquals(1, Tag::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $tag->id));

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag deleted permanently.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);

        $this->assertEquals(0, Tag::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_tag_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. 50,
            ]);
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeTagPayload($payload = [])
    {
        return array_merge([
            'name' => $words = $this->faker->words(2, true),
            'slug' => \Illuminate\Support\Str::slug($words),
            'status' => \Illuminate\Support\Arr::random([Tag::PUBLISHED, Tag::DRAFT]),
            'descrption' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
