<?php

namespace Tests\Feature\Admin;

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

        $this->getUrl = route('admin.dashboard');

        $this->be($this->dummySuperAdministrator());
    }

    /** @test */
    public function user_sees_the_dashboard_page()
    {
        $this->get($this->getUrl)
            ->assertViewIs('admin.dashboard')
            ->assertSee('Dashboard');
    }

    /** @test */
    public function admin_cannot_see_login_page_if_already_logged_in()
    {
        $this->withoutExceptionHandling()
            ->get(route('admin.login'))
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function admin_can_logout()
    {
        $this->withoutExceptionHandling()
            ->get(route('admin.logout'))
            ->assertRedirect(route('homePage'));
    }
}
