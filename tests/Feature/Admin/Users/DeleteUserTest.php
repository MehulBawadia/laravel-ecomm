<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signInAdministrator();

        $this->getRouteUrl = route('admin.users');
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.users.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_users_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Users')
            ->assertViewIs('admin.users.index');
    }

    /** @test */
    public function guest_user_cannot_access_users_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_user()
    {
        $user = User::withTrashed()->orderBy('id', 'DESC')->first();

        $response = $this->delete($this->deleteUrl('delete', $user->id));

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User deleted successfully.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);

        $this->assertNotNull($user->fresh()->deleted_at);
        $this->assertEquals($user->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_user_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_user()
    {
        $user = User::withTrashed()->orderBy('id', 'DESC')->first();
        $user->delete();
        $this->assertNotNull($user->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $user->id));

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User restored successfully.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);

        $this->assertNull($user->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_user_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_user()
    {
        $user = User::withTrashed()->orderBy('id', 'DESC')->first();
        $user->delete();
        $this->assertNotNull($user->deleted_at);

        $this->assertEquals(1, User::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $user->id));

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User deleted permanently.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);

        $this->assertEquals(0, User::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_user_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. 50,
            ]);
    }
}
