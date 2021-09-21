<?php

namespace Tests\Feature\Admin\Coupons;

use Tests\TestCase;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CouponsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.coupons');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_coupons_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('All Coupons')
            ->assertViewIs('admin.coupons.index');
    }

    /** @test */
    public function only_admin_can_access_the_coupons_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_can_see_the_coupons_list()
    {
        $this->withoutExceptionHandling();
        $this->assertEmpty(Coupon::all());

        Coupon::factory(5)->create();

        $this->assertNotEmpty(Coupon::all());
        $this->assertCount(5, Coupon::all());
    }

    /**
     * Merge the custom payload with the default payload.
     *
     * @param  array  $payload
     * @return array
     */
    private function mergeCouponPayload($payload = [])
    {
        return array_merge([
            'name' => $this->faker->word,
            'type' => \Illuminate\Support\Arr::random(['flat', 'percencoupone']),
            'code' => strtoupper($this->faker->word . mt_rand(1, 30)),
            'description' => $this->faker->sentences(3, true),
            'minimum_amount' => mt_rand(10.00, 100.00),
            'percent_or_amount' => mt_rand(10.00, 100.00),
            'starts_at' => today()->addDays(mt_rand(1, 10)),
            'ends_at' => today()->addDays(mt_rand(11, 100)),
        ], $payload);
    }
}
