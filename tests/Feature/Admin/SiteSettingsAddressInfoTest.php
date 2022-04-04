<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiteSettingsAddressInfoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->getUrl = route('admin.siteSettingsGeneral');
        $this->addressPatchUrl = route('admin.siteSettingsGeneral.updateAddressInfo');

        $this->be($this->dummySuperAdministrator());
    }

    /** @test */
    public function user_sees_the_site_settings_general_page()
    {
        $this->withoutExceptionHandling()
            ->get($this->getUrl)
            ->assertViewIs('admin.site-settings.general')
            ->assertSee('Edit Site Settings: General')
            ->assertSee('Address Information')
            ->assertSee('Contact Information')
            ->assertSee('E-Mail Information');
    }

    /** @test */
    public function admin_can_update_the_address_info()
    {
        SiteSetting::truncate();
        $this->assertNull(SiteSetting::first());

        $payload = $this->mergeAddressFormData(['address_line_1' => 'Flat No. 666']);

        $this->withoutExceptionHandling()
            ->patch($this->addressPatchUrl, $payload)
            ->assertJson([
                'status' => 'success',
                'title' => 'Success !',
                'message' => 'Address information updated successfully.',
            ]);

        $setting = SiteSetting::first();
        $this->assertNotNull($setting->address_info);
        $this->assertEquals(json_decode($setting->address_info, true)['address_line_1'], 'Flat No. 666');
    }

    /** @test */
    public function address_line_1_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['address_line_1' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('address_line_1');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('address_line_1'),
            'The address line 1 field is required.'
        );
    }

    /** @test */
    public function address_line_1_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'address_line_1' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('address_line_1');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('address_line_1'),
            'The address line 1 must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function address_line_2_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'address_line_2' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('address_line_2');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('address_line_2'),
            'The address line 2 must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function area_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['area' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('area');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('area'),
            'The area field is required.'
        );
    }

    /** @test */
    public function area_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'area' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('area');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('area'),
            'The area must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function landmark_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'landmark' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('landmark');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('landmark'),
            'The landmark must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function city_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['city' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('city');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('city'),
            'The city field is required.'
        );
    }

    /** @test */
    public function city_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'city' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('city');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('city'),
            'The city must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function pin_code_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['pin_code' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('pin_code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('pin_code'),
            'The pin code field is required.'
        );
    }

    /** @test */
    public function pin_code_cannot_be_more_than_20_characters()
    {
        $payload = $this->mergeAddressFormData([
            'pin_code' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('pin_code');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('pin_code'),
            'The pin code must not be greater than 20 characters.'
        );
    }

    /** @test */
    public function state_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['state' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('state');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('state'),
            'The state field is required.'
        );
    }

    /** @test */
    public function state_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'state' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('state');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('state'),
            'The state must not be greater than 255 characters.'
        );
    }

    /** @test */
    public function country_field_is_required()
    {
        $payload = $this->mergeAddressFormData(['country' => '']);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('country');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('country'),
            'The country field is required.'
        );
    }

    /** @test */
    public function country_cannot_be_more_than_255_characters()
    {
        $payload = $this->mergeAddressFormData([
            'country' => $this->faker->paragraphs(10, true)
        ]);

        $this->patch($this->addressPatchUrl, $payload)
            ->assertSessionHasErrors('country');

        $errors = session('errors');
        $this->assertEquals(
            $errors->first('country'),
            'The country must not be greater than 255 characters.'
        );
    }

    /**
     * Merge the address payload with the given payload.
     *
     * @param  array  $payload
     * @return array
     */
    protected function mergeAddressFormData($payload = [])
    {
        return array_merge([
            'address_line_1' => $this->faker->buildingNumber,
            'address_line_2' => $this->faker->streetName,
            'area' => $this->faker->streetSuffix,
            'landmark' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'pin_code' => $this->faker->postcode,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
        ], $payload);
    }
}
