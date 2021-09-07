<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginAdministratorTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUrl = route('admin.login');
        $this->postUrl = route('admin.login.check');

        $this->dummySuperAdministrator();
    }

    /** @test */
    public function user_sees_the_login_page()
    {
        $this->get($this->getUrl)
            ->assertViewIs('admin.login')
            ->assertSee('Login');
    }

    /** @test */
    public function user_is_redirected_if_already_logged_in()
    {
        auth()->login(User::first());

        $this->withoutExceptionHandling()
            ->get($this->getUrl)
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function admin_can_login_into_the_admin_panel()
    {
        $this->withoutExceptionHandling()
            ->post($this->postUrl, $this->mergeFormData())
            ->assertJson([
                'status'   => 'success',
                'title'    => 'Success !',
                'message'  => 'Admin logged in successfully! Redirecting...',
                'location' => route('admin.dashboard')
            ]);
    }

    /** @test */
    public function admin_cannot_submit_login_credentials_if_already_logged_in()
    {
        auth()->login(User::first());

        $this->withoutExceptionHandling()
            ->post($this->postUrl, $this->mergeFormData())
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function admin_cannot_login_if_wrong_credentials_are_given()
    {
        $data = $this->mergeFormData(['usernameOrEmail' => 'hello@example.com']);

        $this->withoutExceptionHandling()
            ->post($this->postUrl, $data)
            ->assertJson([
                'status'  => 'failed',
                'title'   => 'Failed !',
                'message' => 'Invalid Credentials'
            ]);
    }

    /** @test */
    public function username_or_email_field_is_required()
    {
        $data = $this->mergeFormData(['usernameOrEmail' => '']);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('usernameOrEmail');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('usernameOrEmail'),
            'The username or email field is required.'
        );
    }

    /** @test */
    public function password_field_is_required()
    {
        $data = $this->mergeFormData(['password' => '']);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('password'),
            'The password field is required.'
        );
    }

    /**
     * Merge the contents of Login form data.
     *
     * @param  array  $data
     * @return array
     */
    private function mergeFormData($data = [])
    {
        return array_merge([
            'usernameOrEmail' => \Illuminate\Support\Arr::random(['admin', 'admin@example.com']),
            'password'        => 'Password'
        ], $data);
    }
}
