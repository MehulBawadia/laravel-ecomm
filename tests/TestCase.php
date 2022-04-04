<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a dummy super administrator.
     *
     * @return \App\Models\User
     */
    public function dummySuperAdministrator()
    {
        $this->dummySiteSettings();

        return User::factory()->create([
            'first_name'       => 'Super',
            'last_name'        => 'Administrator',
            'username'         => 'admin',
            'email'            => 'admin@example.com',
            'password'         => bcrypt('Password'),
        ]);
    }

    /**
     * Sign in the administrator.
     *
     * @return  \App\Models\User
     */
    public function signInAdministrator()
    {
        return $this->be(
            $this->dummySuperAdministrator()
        );
    }

    /**
     * Create a dummy user.
     *
     * @return \App\Models\User
     */
    public function dummyUser()
    {
        return User::factory()->create([
            'first_name'       => 'Dummy',
            'last_name'        => 'User',
            'username'         => 'dummyUser',
            'email'            => 'dummyuser@example.com',
            'password'         => bcrypt('Password'),
        ]);
    }

    /**
     * Sign in the dummy user.
     *
     * @return  \App\Models\User
     */
    public function signInDummyUser()
    {
        return $this->be($this->dummyUser());
    }

    /**
     * Generate Dummy SiteSettings for testing.
     *
     * @return \App\Models\SiteSetting
     */
    public function dummySiteSettings()
    {
        return \App\Models\SiteSetting::create([
            'address_info' => json_encode([
                'address_line_1' => 'Line 1',
                'address_line_2' => 'Line 2',
                'area' => 'Awesome Area',
                'landmark' => 'Best Landmark',
                'city' => 'Mumbai',
                'pin_code' => '400001',
                'state' => 'Maharashtra',
                'country' => 'India',
            ]),
            'email_info' => json_encode([
                'from_email' => 'no-reply@email@-example.com',
                'from_name' => config('app.name'),
                'order_notification_email' => 'admin@example.com',
            ]),
            'contact_info' => json_encode([
                'support_email' => 'support@example.com',
                'contact_number' => '+919876543210',
                'fax_number' => '9876543210',
            ]),
        ]);
    }

    /**
     * Get the list of invalid E-Mail Addresses.
     *
     * @return  array
     */
    protected function getInvalidEmailAddress()
    {
        return array_rand([
            "plainaddress", "#@%^%#$@#$@#.com", "@example.com", "Joe Smith-<email@example.com>",
            "email.example.com", "email@example@example.com", ".email@example.com", "email.@example.com",
            "email..email@example.com", "email@example.com...(Joe Smith)",
            "email@-example.com", "email@example..com",
            "Abc..123@example.com"
        ]);
    }
}
