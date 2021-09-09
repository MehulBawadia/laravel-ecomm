<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteSettingsOrderEmailInfoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUrl = route('admin.siteSettingsGeneral');
        $this->contactPatchUrl = route('admin.siteSettingsGeneral.updateOrderEmailInfo');

        $this->be($this->dummySuperAdministrator());
    }

    /** @test */
    public function user_sees_the_site_settings_general_page()
    {
        $this->withoutExceptionHandling()
            ->get($this->getUrl)
            ->assertViewIs('admin.site-settings.general')
            ->assertSee('Edit Site Settings: General')
            ->assertSee('Order E-Mail Information');
    }

    /** @test */
    public function admin_can_update_the_order_email_info()
    {
        $this->assertNull(SiteSetting::first());

        $payload = $this->mergeOrderEmailFormData(['from_email' => 'orders@example.com']);

        $this->withoutExceptionHandling()
            ->patch($this->contactPatchUrl, $payload)
            ->assertJson([
                'status' => 'success',
                'title' => 'Success !',
                'message' => 'Order E-Mail information updated successfully.',
            ]);

        $setting = SiteSetting::first();
        $this->assertNotNull($setting->email_info);
        $this->assertEquals(json_decode($setting->email_info, true)['from_email'], 'orders@example.com');
    }

    /** @test */
    public function from_email_field_is_required()
    {
        $payload = $this->mergeOrderEmailFormData(['from_email' => '']);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('from_email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('from_email'),
            'The from email field is required.'
        );
    }

    /** @test */
    public function from_email_must_be_valid_email()
    {
        $payload = $this->mergeOrderEmailFormData([
            'from_email' => $this->getInvalidEmailAddress()
        ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('from_email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('from_email'),
            'The from email must be a valid email address.'
        );
    }

    /** @test */
    public function from_name_field_is_required()
    {
        $payload = $this->mergeOrderEmailFormData(['from_name' => '' ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('from_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('from_name'),
            'The from name field is required.'
        );
    }

    /** @test */
    public function from_name_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeOrderEmailFormData([
            'from_name' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('from_name');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('from_name'),
            'The from name must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function order_notification_email_field_is_required()
    {
        $payload = $this->mergeOrderEmailFormData(['order_notification_email' => '']);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('order_notification_email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('order_notification_email'),
            'The order notification email field is required.'
        );
    }

    /**
     * Merge the order email payload with the given payload.
     *
     * @param  array  $payload
     * @return array
     */
    protected function mergeOrderEmailFormData($payload = [])
    {
        return array_merge([
            'from_email' => $this->faker->unique()->safeEmail,
            'from_name' => $this->faker->company,
            'order_notification_email' => $this->faker->unique()->safeEmail,
        ], $payload);
    }
}
