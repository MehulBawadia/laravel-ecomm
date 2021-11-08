<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signInAdministrator();
        $this->user = User::factory()->create();

        $this->getRouteUrl = route('admin.users.edit', $this->user->id);
        $this->patchRouteUrl = route('admin.users.changePassword', $this->user->id);
    }

    /** @test */
    public function admin_can_access_the_edit_user_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->user->name)
            ->assertSee('Change Password')
            ->assertViewIs('admin.users.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_user_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_user()
    {
        $this->get(route('admin.users.edit', mt_rand(3, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_change_the_password_of_the_user()
    {
        $this->withoutExceptionHandling();

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'new_password' => 'Random',
            'repeat_new_password' => 'Random',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User password changed successfully.',
        ]);
    }

    /** @test */
    public function new_password_field_is_required()
    {
        $payload = $this->mergeUserPayload([
            'new_password' => ''
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('new_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('new_password'),
            'The new password field is required.'
        );
    }

    /** @test */
    public function repeat_new_password_field_is_required()
    {
        $payload = $this->mergeUserPayload(['repeat_new_password' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('repeat_new_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('repeat_new_password'),
            'The repeat new password field is required.'
        );
    }

    /** @test */
    public function repeat_new_password_and_password_must_match()
    {
        $payload = $this->mergeUserPayload([
            'new_password' => 'Secret',
            'repeat_new_password' => 'Password'
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('repeat_new_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('repeat_new_password'),
            'The repeat new password and new password must match.'
        );
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeUserPayload($payload = [])
    {
        return array_merge([
            'new_password'        => 'Secret',
            'repeat_new_password' => 'Secret',
        ], $payload);
    }
}
