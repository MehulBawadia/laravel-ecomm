<?php

namespace Tests\Feature\Admin\Coupons;

use Tests\TestCase;
use App\Models\Coupon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCouponTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->coupon = Coupon::factory()->create([
            'name' => 'Coupon 1',
            'code' => 'coupon-1',
            'type' => 'flat',
            'description' => $this->faker->sentences(2, true),
        ]);

        $this->getRouteUrl = route('admin.coupons');
        $this->deleteRouteUrl = route('admin.coupons.delete', $this->coupon->id);
        $this->signInAdministrator();
    }

    protected function deleteUrl($type, $id)
    {
        return route('admin.coupons.' . $type, $id);
    }

    /** @test */
    public function admin_sees_the_coupons_page()
    {
        $this->withoutExceptionHandling();
        $this->get($this->getRouteUrl)
            ->assertSee('All Coupons')
            ->assertViewIs('admin.coupons.index');
    }

    /** @test */
    public function guest_user_cannot_access_coupons_page()
    {
        auth()->logout();

        $this->get($this->getRouteUrl)
            ->assertRedirect(route('homePage'));
    }

    /** @test */
    public function admin_may_temorary_delete_the_coupon()
    {
        $coupon = Coupon::withTrashed()->first();

        $response = $this->delete($this->deleteUrl('delete', $coupon->id));

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon deleted successfully.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);

        $this->assertNotNull($coupon->fresh()->deleted_at);
        $this->assertEquals($coupon->fresh()->deleted_at->format('Y-m-d h:i A'), now()->format('Y-m-d h:i A'));
    }

    /** @test */
    public function admin_cannot_delete_a_coupon_that_does_not_exists()
    {
        $this->delete($this->deleteUrl('delete', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_restores_the_temporary_deleted_coupon()
    {
        $coupon = Coupon::withTrashed()->orderBy('id', 'DESC')->first();
        $coupon->delete();
        $this->assertNotNull($coupon->deleted_at);

        $response = $this->patch($this->deleteUrl('restore', $coupon->id));

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon restored successfully.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);

        $this->assertNull($coupon->fresh()->deleted_at);
    }

    /** @test */
    public function admin_cannot_restore_a_temporarily_deleted_coupon_that_does_not_exists()
    {
        $this->patch($this->deleteUrl('restore', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. 50,
            ]);
    }

    /** @test */
    public function admin_may_permanently_delete_the_temproarily_deleted_coupon()
    {
        $coupon = Coupon::withTrashed()->orderBy('id', 'DESC')->first();
        $coupon->delete();
        $this->assertNotNull($coupon->deleted_at);

        $this->assertEquals(1, Coupon::withTrashed()->count());

        $response = $this->delete($this->deleteUrl('destroy', $coupon->id));

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        $response->assertJson([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon deleted permanently.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);

        $this->assertEquals(0, Coupon::withTrashed()->count());
    }

    /** @test */
    public function admin_cannot_permanently_delete_the_temproarily_deleted_coupon_that_does_not_exist()
    {
        $this->delete($this->deleteUrl('destroy', 50))
            ->assertJson([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. 50,
            ]);
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
            'starts_at' => today()->addDays(mt_rand(1, 10)),
            'ends_at' => today()->addDays(mt_rand(11, 100)),
        ], $payload);
    }
}
