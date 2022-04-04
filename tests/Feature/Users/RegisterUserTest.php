<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->dummySuperAdministrator();
        $this->dummySiteSettings();

        $this->getUrl = route('users.register');
        $this->postUrl = route('users.register.store');
    }

    /** @test */
    public function admin_already_exusts()
    {
        $this->assertEquals(1, User::withTrashed()->count());
    }

    /** @test */
    public function guest_user_can_see_the_registration_page()
    {
        $this->withoutExceptionHandling()
            ->get($this->getUrl)
            ->assertViewIs('users.register')
            ->assertSee('Register User');
    }

    /** @test */
    public function user_can_register()
    {
        $this->withoutExceptionHandling()
            ->post($this->postUrl, $data = $this->mergeFormData())
            ->assertJson([
                'status'   => 'success',
                'title'    => 'Success !',
                'message'  => 'User registered successfully! Redirecting...',
                'location' => route('users.dashboard')
            ]);

        $this->assertNotNull($user = User::where('id', '>', 1)->first());
        $this->assertEquals($user->username, $data['username']);
    }

    /** @test */
    public function user_is_logged_in_after_registering()
    {
        $this->withoutExceptionHandling()
            ->post($this->postUrl, $this->mergeFormData());

        $this->assertNotNull($user = User::where('id', '>', 1)->first());
        $this->assertTrue(auth()->check($user));
    }

    /** @test */
    public function user_receives_a_successful_registration_email()
    {
        Mail::fake();

        $this->withoutExceptionHandling()
            ->post($this->postUrl, $data = $this->mergeFormData());

        Mail::assertSent(UserRegistered::class);
    }

    /** @test */
    public function first_name_field_is_required()
    {
        $data = $this->mergeFormData(['first_name' => '']);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('first_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('first_name'),
            'The first name field is required.'
        );
    }

    /** @test */
    public function first_name_cannot_be_more_than_255_characters()
    {
        $data = $this->mergeFormData([
            'first_name' => $this->faker->paragraphs(10, true)
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('first_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('first_name'),
            'The first name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function last_name_field_is_required()
    {
        $data = $this->mergeFormData(['last_name' => '']);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('last_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('last_name'),
            'The last name field is required.'
        );
    }

    /** @test */
    public function last_name_cannot_be_more_than_255_characters()
    {
        $data = $this->mergeFormData([
            'last_name' => $this->faker->paragraphs(10, true)
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('last_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('last_name'),
            'The last name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function username_field_is_required()
    {
        $data = $this->mergeFormData(['username' => '']);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username field is required.'
        );
    }

    /** @test */
    public function username_cannot_be_more_than_30_characters()
    {
        $data = $this->mergeFormData([
            'username' => \Illuminate\Support\Str::random(55)
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must not be greater than 30 characters.'
        );
    }

    /** @test */
    public function username_may_contain_only_alphabets_digits_dashes_or_underscores()
    {
        $data = $this->mergeFormData([
            'username' => "U\$erN@" . array_rand(['!','@','$','%','^','&','*','(',')','#','.','\'']) . "me"
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must only contain letters, numbers, dashes and underscores.'
        );
    }

    /** @test */
    public function email_field_is_required()
    {
        $data = $this->mergeFormData(['email' => '']);

        $this->post($this->postUrl, $data)
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
        $data = $this->mergeFormData([
            'email' => $this->getInvalidEmailAddress()
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email must be a valid email address.'
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

    /** @test */
    public function confirm_password_field_is_required()
    {
        $data = $this->mergeFormData(['confirm_password' => '']);

        $this->post($this->postUrl, $data)
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
        $data = $this->mergeFormData([
            'password'         => 'Password',
            'confirm_password' => 'Secret',
        ]);

        $this->post($this->postUrl, $data)
            ->assertSessionHasErrors('confirm_password');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('confirm_password'),
            'The confirm password and password must match.'
        );
    }

    /**
     * Merge the register user form payload with the given payload.
     *
     * @param  array  $payload
     * @return array
     */
    protected function mergeFormData($payload = [])
    {
        $username = str_replace(
            ['!','@','$','%','^','&','*','(',')','#','_','-','.','\''],
            '_',
            $this->faker->unique()->userName
        );

        return array_merge([
            'first_name'       => $this->faker->firstName,
            'last_name'        => $this->faker->lastName,
            'username'         => $username,
            'email'            => $this->faker->unique()->email,
            'password'         => 'Secret',
            'confirm_password' => 'Secret',
        ], $payload);
    }
}
