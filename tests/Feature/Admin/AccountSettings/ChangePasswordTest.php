<?php

namespace Tests\Feature\Admin\AccountSettings;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.accountSettings');
        $this->patchRouteUrl = route('admin.accountSettings.changePassword');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_account_settings_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Account Settings')
            ->assertSee('Change Password')
            ->assertViewIs('admin.account-settings.index');
    }

    /** @test */
    public function only_authenticated_user_can_access_the_account_settings_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_categories_list()
    {
        $this->withoutExceptionHandling();

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'current_password' => 'Password',
            'new_password' => 'Secret',
            'repeat_new_password' => 'Secret',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Password changed successfully.',
        ]);
    }

    /** @test */
    public function display_invalid_error_message_if_current_password_is_wrong()
    {
        $this->withoutExceptionHandling();

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'current_password' => '1233446',
            'new_password' => 'Secret',
            'repeat_new_password' => 'Secret',
        ]))->assertJson([
            'status'   => 'failed',
            'title'    => 'Failed !',
            'message'  => 'Invalid current password.',
        ]);
    }

    /** @test */
    public function current_password_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['current_password' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('current_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('current_password'),
            'The current password field is required.'
        );
    }

    /** @test */
    public function new_password_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['new_password' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
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
        $userPayload = $this->mergeUserPayload(['repeat_new_password' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('repeat_new_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('repeat_new_password'),
            'The repeat new password field is required.'
        );
    }

    /** @test */
    public function repeat_new_password_must_be_same_as_new_password()
    {
        $userPayload = $this->mergeUserPayload([
            'new_password' => 'Secret',
            'repeat_new_password' => '123456',
        ]);

        $this->patch($this->patchRouteUrl, $userPayload)
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
            'current_password' => 'Password',
            'new_password' => 'Password',
            'repeat_new_password' => 'Password',
        ], $payload);
    }
}
