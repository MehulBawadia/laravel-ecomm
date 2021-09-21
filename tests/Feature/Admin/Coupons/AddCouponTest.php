<?php

namespace Tests\Feature\Admin\Coupons;

use Tests\TestCase;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCouponTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getRouteUrl = route('admin.coupons');
        $this->postRouteUrl = route('admin.coupons.store');
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_add_new_coupon_section()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('Add New Coupon')
            ->assertViewIs('admin.coupons.index');
    }

    /** @test */
    public function only_admin_can_access_the_add_new_coupon_section()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_add_a_new_coupon()
    {
        $this->withoutExceptionHandling();

        $this->post($this->postRouteUrl, $this->mergeCouponPayload([
            'code' => 'Coupon1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon added successfully! Redirecting...',
            'location' => route('admin.coupons.edit', 1)
        ]);

        $this->assertEquals('Coupon1', Coupon::first()->code);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['code' => '']);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code field is required.'
        );
    }

    /** @test */
    public function name_cannot_be_more_than_30_characters()
    {
        $payload = $this->mergeCouponPayload([
            'code' => \Illuminate\Support\Str::random(50),
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code must not be greater than 30 characters.'
        );
    }

    /** @test */
    public function code_must_contain_only_alpha_numberic_characters()
    {
        $payload = $this->mergeCouponPayload([
            'code' => 'random-word$#@'
        ]);

        $this->post($this->postRouteUrl, $payload)
            ->assertSessionHasErrors('code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('code'),
            'The code must only contain letters and numbers.'
        );
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
