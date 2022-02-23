<?php

namespace Tests\Feature\Users\AccountSettings;

use Tests\TestCase;
use App\Traits\CreateDirectory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonalInformationTest extends TestCase
{
    use RefreshDatabase, WithFaker, CreateDirectory;

    public function setUp(): void
    {
        parent::setUp();

        $this->dummySuperAdministrator();
        $this->signInDummyUser();
        $this->getRouteUrl = route('users.accountSettings');
        $this->patchRouteUrl = route('users.accountSettings.general');
    }

    /** @test */
    public function users_can_access_the_account_settings_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Account Settings')
            ->assertSee('Personal Information')
            ->assertViewIs('users.account-settings.index');
    }

    /** @test */
    public function only_authenticated_user_can_access_the_account_settings_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function users_update_their_personal_details()
    {
        $this->withoutExceptionHandling();

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'first_name' => 'First',
            'email' => 'first@example.com',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Personal details updated successfully.',
        ]);

        $this->assertEquals('First', auth()->user()->first_name);
        $this->assertEquals('first@example.com', auth()->user()->email);
    }

    /** @test */
    public function user_may_update_their_avatar_image()
    {
        $this->withoutExceptionHandling();

        $user = auth()->user();

        $this->assertNull($user->avatar);

        $this->patch($this->patchRouteUrl, $this->mergeUserPayload([
            'username' => $user->username,
            'avatar_image_file' => \Illuminate\Http\UploadedFile::fake()->create('file.jpg'),
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Personal details updated successfully.',
            'avatar' => $user->avatar ?? null,
            'avatar_path' => $user->fresh()->getAvatarPath(),
        ]);

        $user = $user->fresh();

        $this->assertNotNull($user->avatar);
        $this->assertEquals("/images/testing-user-{$user->id}/file.jpg", $user->avatar);

        \Illuminate\Support\Facades\File::deleteDirectory($this->getPublicPath() . 'images/testing-user-'. $user->id);
    }

    /** @test */
    public function first_name_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['first_name' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('first_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('first_name'),
            'The first name field is required.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function first_name_must_not_be_greater_than_255_characters()
    {
        $userPayload = $this->mergeUserPayload(['first_name' => $this->faker->paragraphs(10, true)]);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('first_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('first_name'),
            'The first name must not be greater than 255 characters.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function last_name_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['last_name' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('last_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('last_name'),
            'The last name field is required.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function last_name_must_not_be_greater_than_255_characters()
    {
        $userPayload = $this->mergeUserPayload(['last_name' => $this->faker->paragraphs(10, true)]);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('last_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('last_name'),
            'The last name must not be greater than 255 characters.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function username_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['username' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username field is required.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function username_must_be_unique()
    {
        \App\Models\User::factory()->create(['username' => 'user1']);
        $userPayload = $this->mergeUserPayload(['username' => 'user1']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username has already been taken.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function username_must_only_contain_letters_numbers_dashes_and_underscores()
    {
        $userPayload = $this->mergeUserPayload(['username' => 'user1#$%^&*']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must only contain letters, numbers, dashes and underscores.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function username_may_not_be_greater_than_50_characters()
    {
        $userPayload = $this->mergeUserPayload(['username' => implode('', $this->faker->words(100))]);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('username');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('username'),
            'The username must not be greater than 50 characters.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function email_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['email' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email field is required.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function email_must_be_unique()
    {
        \App\Models\User::factory()->create(['email' => 'user1@example.com']);
        $userPayload = $this->mergeUserPayload(['email' => 'user1@example.com']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email has already been taken.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function email_must_be_valid()
    {
        $userPayload = $this->mergeUserPayload(['email' => '...user1@@example$%^.com']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('email'),
            'The email must be a valid email address.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function contact_number_must_be_numbers_only()
    {
        $userPayload = $this->mergeUserPayload(['contact_number' => '...user1@@example$%^.com']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('contact_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('contact_number'),
            'The contact number must be a number.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function contact_number_must_not_be_greater_than_10_characters()
    {
        $userPayload = $this->mergeUserPayload(['contact_number' => '9876543210547924762']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('contact_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('contact_number'),
            'The contact number must be 10 digits.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function the_gender_field_is_required()
    {
        $userPayload = $this->mergeUserPayload(['gender' => '']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('gender');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('gender'),
            'The gender field is required.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function gender_must_be_either_male_or_female_only()
    {
        $userPayload = $this->mergeUserPayload(['gender' => 'some-other-gender']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('gender');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('gender'),
            'The gender must be either Male or Female only.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function the_avatar_image_file_must_be_a_file()
    {
        $userPayload = $this->mergeUserPayload(['avatar_image_file' => '9876543210547924762']);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('avatar_image_file');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('avatar_image_file'),
            'The avatar image file must be a file.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function avatar_image_file_should_be_either_jpg_or_jpeg_or_png_format_only()
    {
        $userPayload = $this->mergeUserPayload([
            'avatar_image_file' => \Illuminate\Http\UploadedFile::fake()->create('file.txt')
        ]);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('avatar_image_file');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('avatar_image_file'),
            'The avatar image file must be a file of type: jpg, jpeg, png.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function avatar_image_file_may_not_be_greater_than_300_kilobytes()
    {
        $userPayload = $this->mergeUserPayload([
            'avatar_image_file' => \Illuminate\Http\UploadedFile::fake()->create('file.jpg', 500)
        ]);

        $this->patch($this->patchRouteUrl, $userPayload)
            ->assertSessionHasErrors('avatar_image_file');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('avatar_image_file'),
            'The avatar image file must not be greater than 300 kilobytes.'
        );

        \Illuminate\Support\Facades\File::delete($this->getPublicPath() . '/testing-user-' . auth()->id());
    }

    /** @test */
    public function users_can_delete_the_uploaded_avatar_image_file()
    {
        $this->withoutExceptionHandling();

        $user = auth()->user();
        $user->update(['avatar' => '/images/testing-user-1/file.jpg']);

        $user = $user->fresh();
        $this->assertNotNull($user->avatar);

        $this->delete(route('users.accountSettings.deleteAvatar', auth()->id()))
            ->assertJson([
                'status'   => 'success',
                'title'    => 'Success !',
                'message'  => 'Avatar deleted successfully.',
                'defaultAvatar' => $user->fresh()->getAvatarPath(),
            ]);

        $user = $user->fresh();

        $this->assertNull($user->avatar);

        \Illuminate\Support\Facades\File::deleteDirectory($this->getPublicPath() . 'images/testing-user-'. $user->id);
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeUserPayload($payload = [])
    {
        $username = str_replace(
            ['!','@','$','%','^','&','*','(',')','#','_','-','.','\''],
            '_',
            $this->faker->unique()->userName
        );

        return array_merge([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $username,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('Password'),
            'contact_number' => '9876543210',
            'gender' => \Illuminate\Support\Arr::random(['Male', 'Female']),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'avatar' => null,
            'avatar_image_file' => null,
        ], $payload);
    }
}
