<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteSettingsContactInfoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUrl = route('admin.siteSettingsGeneral');
        $this->contactPatchUrl = route('admin.siteSettingsGeneral.updateContactInfo');

        $this->be($this->dummySuperAdministrator());
    }

    /** @test */
    public function user_sees_the_site_settings_general_page()
    {
        $this->withoutExceptionHandling()
            ->get($this->getUrl)
            ->assertViewIs('admin.site-settings.general')
            ->assertSee('Edit Site Settings: General')
            ->assertSee('Contact Information');
    }

    /** @test */
    public function admin_can_update_the_contact_info()
    {
        $this->assertNull(SiteSetting::first());

        $payload = $this->mergeContactFormData(['support_email' => 'support@example.com']);

        $this->withoutExceptionHandling()
            ->patch($this->contactPatchUrl, $payload)
            ->assertJson([
                'status' => 'success',
                'title' => 'Success !',
                'message' => 'Contact information updated successfully.',
            ]);

        $setting = SiteSetting::first();
        $this->assertNotNull($setting->contact_info);
        $this->assertEquals(json_decode($setting->contact_info, true)['support_email'], 'support@example.com');
    }

    /** @test */
    public function support_email_field_is_required()
    {
        $payload = $this->mergeContactFormData(['support_email' => '']);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('support_email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('support_email'),
            'The support email field is required.'
        );
    }

    /** @test */
    public function support_email_must_be_valid_email()
    {
        $payload = $this->mergeContactFormData([
            'support_email' => $this->getInvalidEmailAddress()
        ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('support_email');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('support_email'),
            'The support email must be a valid email address.'
        );
    }

    /** @test */
    public function fax_number_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeContactFormData([
            'fax_number' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('fax_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('fax_number'),
            'The fax number must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function contact_number_field_is_required()
    {
        $payload = $this->mergeContactFormData(['contact_number' => '']);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('contact_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('contact_number'),
            'The contact number field is required.'
        );
    }

    /** @test */
    public function contact_number_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeContactFormData([
            'contact_number' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->contactPatchUrl, $payload)
            ->assertSessionHasErrors('contact_number');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('contact_number'),
            'The contact number must not be greater than 255 characters.'
        );
    }

    /**
     * Merge the contact payload with the given payload.
     *
     * @param  array  $payload
     * @return array
     */
    protected function mergeContactFormData($payload = [])
    {
        return array_merge([
            'support_email' => $this->faker->unique()->safeEmail,
            'contact_number' => $this->faker->phoneNumber,
            'fax_number' => $this->faker->phoneNumber,
        ], $payload);
    }
}
