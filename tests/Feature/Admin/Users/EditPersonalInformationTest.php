<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditPersonalInformationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->signInAdministrator();

        $this->user = User::factory()->create([
            'username' => 'userone',
            'email' => 'user1@example.com',
            'first_name' => 'User',
            'last_name' => 'One',
            'contact_number' => '9876543210',
            'gender' => 'male',
            'email_verified_at' => now()->subMinutes(mt_rand(1, 59)),
        ]);
        $this->getRouteUrl = route('admin.users.edit', $this->user->id);
        $this->patchRouteUrl = route('admin.users.updateGeneral', $this->user->id);
    }

    /** @test */
    public function admin_can_access_the_edit_user_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->user->getFullName())
            ->assertSee('Personal Information')
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
    public function admin_may_edit_the_general_information_of_the_user()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('User One', $this->user->getFullName());
        $this->assertEquals('userone', $this->user->username);

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'first_name' => 'One',
            'last_name' => 'User',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User updated successfully.',
        ]);

        $this->assertEquals('One User', $this->user->fresh()->getFullName());
    }

    /** @test */
    public function the_first_name_field_is_required()
    {
        $payload = $this->mergeUserPayload(['first_name' => '']);

        $this->patch($this->patchRouteUrl, $payload)
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
        $payload = $this->mergeUserPayload([
            'first_name' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('first_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('first_name'),
            'The first name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_last_name_field_is_required()
    {
        $payload = $this->mergeUserPayload(['last_name' => '']);

        $this->patch($this->patchRouteUrl, $payload)
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
        $payload = $this->mergeUserPayload([
            'last_name' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('last_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('last_name'),
            'The last name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_username_field_is_required()
    {
        $payload = $this->mergeUserPayload(['username' => '']);

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $data)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
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

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email has already been taken.'
        );
    }

    /** @test */
    public function contact_number_must_be_numeric()
    {
        $payload = $this->mergeUserPayload([
            'contact_number' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('contact_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('contact_number'),
            'The contact number must be a number.'
        );
    }

    /** @test */
    public function the_gender_field_is_required()
    {
        $payload = $this->mergeUserPayload(['gender' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('gender');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('gender'),
            'The gender field is required.'
        );
    }

    /** @test */
    public function the_gender_may_be_either_male_or_female()
    {
        $payload = $this->mergeUserPayload(['gender' => $this->faker->word]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('gender');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('gender'),
            'The selected gender is invalid.'
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
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => implode('', $this->faker->words(2)),
            'email' => $this->faker->unique()->safeEmail,
            'contact_number' => mt_rand(1111111111, 9999999999),
            'gender' => $this->faker->randomElement(['male', 'female']),
        ], $payload);
    }
}
