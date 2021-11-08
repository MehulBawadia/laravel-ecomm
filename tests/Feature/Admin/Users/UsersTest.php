<?php

namespace Tests\Feature\Admin\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.users');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_users_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Users')
            ->assertViewIs('admin.users.index');
    }

    /** @test */
    public function only_admin_can_access_the_users_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_users_list()
    {
        $this->withoutExceptionHandling();
        $this->assertEmpty(User::where('id', '<>', 1)->get());

        User::factory(5)->create();

        $this->assertNotEmpty(User::where('id', '<>', 1)->get());
        $this->assertCount(5, User::where('id', '<>', 1)->get());
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
            'name' => $words = $this->faker->words(2, true),
            'code' => strtoupper($this->faker->word),
            'sku' => strtoupper($this->faker->word),
            'slug' => \Illuminate\Support\Str::slug($words),
            'description' => $this->faker->sentences(3, true),
            'rate' => mt_rand(10.00, 999.00),
            'stock' => mt_rand(0, 99),
            'sort_number' => mt_rand(0, 99),
            'tax_percent' => mt_rand(1.0, 9.0),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ], $payload);
    }
}
