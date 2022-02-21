<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->dummySuperAdministrator();
        $this->getUrl = route('users.dashboard');
        $this->signInDummyUser();
    }

    /** @test */
    public function user_sees_the_dashboard_page()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getUrl)
            ->assertViewIs('users.dashboard')
            ->assertSee('Dashboard');
    }

    /** @test */
    public function user_cannot_see_login_page_if_already_logged_in()
    {
        $this->withoutExceptionHandling()
            ->get(route('users.login'))
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function user_can_logout()
    {
        $this->withoutExceptionHandling()
            ->get(route('users.logout'))
            ->assertRedirect(route('homePage'));
    }
}
