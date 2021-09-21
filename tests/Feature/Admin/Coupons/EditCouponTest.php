<?php

namespace Tests\Feature\Admin\Coupons;

use Tests\TestCase;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditCouponTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->coupon = Coupon::factory()->create([
            'code' => 'Coupon1',
            'name' => 'Coupon 1',
            'description' => $this->faker->sentences(3, true),
        ]);

        $this->getRouteUrl = route('admin.coupons.edit', $this->coupon->id);
        $this->patchRouteUrl = route('admin.coupons.update', $this->coupon->id);
        $this->signInAdministrator();
    }

    /** @test */
    public function admin_can_access_the_edit_coupon_page()
    {
        $this->get($this->getRouteUrl)
            ->assertSee('Edit: '. $this->coupon->name)
            ->assertViewIs('admin.coupons.edit');
    }

    /** @test */
    public function guest_user_cannot_access_edit_coupon_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_sees_404_page_if_invalid_coupon()
    {
        $this->get(route('admin.coupons.edit', mt_rand(2, 9)))
            ->assertNotFound();
    }

    /** @test */
    public function admin_may_edit_the_coupon()
    {
        $this->withoutExceptionHandling();
        $this->assertEquals('Coupon 1', Coupon::first()->name);
        $this->assertEquals('Coupon1', Coupon::first()->code);

        $this->patch($this->patchRouteUrl, $this->mergeCouponPayload([
            'name' => 'Coupon New 1',
            'code' => 'COUPONNEW1',
        ]))->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon updated successfully.',
        ]);

        $this->assertEquals('Coupon New 1', Coupon::first()->name);
        $this->assertEquals('COUPONNEW1', Coupon::first()->code);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['name' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('name'),
            'The name field is required.'
        );
    }

    /** @test */
    public function name_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeCouponPayload([
            'name' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('name'),
            'The name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_type_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['type' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('type');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('type'),
            'The type field is required.'
        );
    }

    /** @test */
    public function type_can_be_either_percentage_or_flat_only()
    {
        $payload = $this->mergeCouponPayload([
            'type' => 'random-type'
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('type');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('type'),
            'The type must be either percentage or flat only.'
        );
    }

    /** @test */
    public function the_description_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['description' => $this->faker->sentences(30, true)]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('description');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('description'),
            'The description must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function the_minimum_amount_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['minimum_amount' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('minimum_amount');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('minimum_amount'),
            'The minimum amount field is required.'
        );
    }

    /** @test */
    public function minimum_amount_must_be_numeric()
    {
        $payload = $this->mergeCouponPayload([
            'minimum_amount' => $this->faker->paragraphs(2, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('minimum_amount');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('minimum_amount'),
            'The minimum amount must be a number.'
        );
    }

    /** @test */
    public function the_percent_or_amount_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['percent_or_amount' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('percent_or_amount');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('percent_or_amount'),
            'The percent or amount field is required.'
        );
    }

    /** @test */
    public function percent_or_amount_must_be_numeric()
    {
        $payload = $this->mergeCouponPayload([
            'percent_or_amount' => $this->faker->paragraphs(2, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('percent_or_amount');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('percent_or_amount'),
            'The percent or amount must be a number.'
        );
    }

    /** @test */
    public function the_starts_at_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['starts_at' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('starts_at');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('starts_at'),
            'The starts at field is required.'
        );
    }

    /** @test */
    public function starts_at_must_be_a_date()
    {
        $payload = $this->mergeCouponPayload([
            'starts_at' => $this->faker->paragraphs(2, true)
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('starts_at');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('starts_at'),
            'The starts at is not a valid date.'
        );
    }

    /** @test */
    public function the_ends_at_field_is_required()
    {
        $payload = $this->mergeCouponPayload(['ends_at' => '']);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('ends_at');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('ends_at'),
            'The ends at field is required.'
        );
    }

    /** @test */
    public function ends_at_must_be_a_date_after_today()
    {
        $payload = $this->mergeCouponPayload([
            'ends_at' => today()->subMonths(5)->toDateTimeString(),
        ]);

        $this->patch($this->patchRouteUrl, $payload)
            ->assertSessionHasErrors('ends_at');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('ends_at'),
            'The ends at must be a date after or equal to starts at.'
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
            'type' => \Illuminate\Support\Arr::random(['flat', 'percentage']),
            'code' => strtoupper($this->faker->word . mt_rand(1, 30)),
            'description' => $this->faker->sentences(3, true),
            'minimum_amount' => mt_rand(10.00, 100.00),
            'percent_or_amount' => mt_rand(10.00, 100.00),
            'starts_at' => today()->addDays(mt_rand(1, 10))->toDateTimeString(),
            'ends_at' => today()->addDays(mt_rand(11, 100))->toDateTimeString(),
        ], $payload);
    }
}
