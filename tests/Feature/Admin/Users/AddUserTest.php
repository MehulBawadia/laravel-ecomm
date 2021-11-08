<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.users');
        $this->postRouteUrl = route('admin.users.store');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_add_new_user_section()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Add New User')
            ->assertViewIs('admin.users.index');
    }

    /** @test */
    public function only_admin_can_access_the_add_new_user_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_add_a_new_user()
    {
        $this->withoutExceptionHandling();

        $this->post($this->postRouteUrl, $this->mergeUserPayload([
            'username' => 'userone',
            'email' => 'userone@example.com',
            'password' => 'Password',
            'confirm_password' => 'Password',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User added successfully! Redirecting...',
            'location' => route('admin.users.edit', 2)
        ]);

        $this->assertEquals('userone@example.com', User::find(2)->email);
        $this->assertEquals('userone', User::find(2)->username);
    }

    /** @test */
    public function the_username_field_is_required()
    {
        $payload = $this->mergeUserPayload(['username' => '']);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username field is required.'
        );
    }

    /** @test */
    public function username_cannot_be_more_than_50_characters()
    {
        $payload = $this->mergeUserPayload([
            'username' => str_replace(' ', '', $this->faker->words(50, true)),
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must not be greater than 50 characters.'
        );
    }

    /** @test */
    public function username_must_be_unique()
    {
        User::factory()->create(['username' => 'PRD-123']);
        $payload = $this->mergeUserPayload([
            'username' => 'PRD-123',
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username has already been taken.'
        );
    }

    /** @test */
    public function username_may_contain_only_alphabets_digits_dashes_or_underscores()
    {
        $data = $this->mergeUserPayload([
            'username' => "P/\rND" . array_rand(['!','@','$','%','^','&','*','(',')','#','.','\''])
        ]);

        $this->post($this->postRouteUrl, $data)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must only contain letters, numbers, dashes and underscores.'
        );
    }

    /** @test */
    public function the_email_field_is_required()
    {
        $payload = $this->mergeUserPayload(['email' => '']);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email field is required.'
        );
    }

    /** @test */
    public function email_should_be_a_valid_email_address()
    {
        $payload = $this->mergeUserPayload([
            'email' => $this->getInvalidEmailAddress()
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email must be a valid email address.'
        );
    }

    /** @test */
    public function the_email_should_be_unique()
    {
        User::factory()->create(['email' => 'userone@example.com']);
        $payload = $this->mergeUserPayload([
            'email' => 'userone@example.com',
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email has already been taken.'
        );
    }

    /** @test */
    public function password_field_is_required()
    {
        $payload = $this->mergeUserPayload([
            'password' => ''
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('password'),
            'The password field is required.'
        );
    }

    /** @test */
    public function confirm_password_field_is_required()
    {
        $payload = $this->mergeUserPayload([
            'confirm_password' => ''
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('confirm_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('confirm_password'),
            'The confirm password field is required.'
        );
    }

    /** @test */
    public function confirm_password_and_password_must_match()
    {
        $payload = $this->mergeUserPayload([
            'password' => 'Secret',
            'confirm_password' => 'Password'
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('confirm_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('confirm_password'),
            'The confirm password and password must match.'
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
            'username' => implode('', $this->faker->words(2)),
            'email' => $words = $this->faker->unique()->safeEmail,
            'password' => 'Password',
            'confirm_password' => 'Password',
        ], $payload);
    }
}
