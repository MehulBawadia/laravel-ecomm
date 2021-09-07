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
