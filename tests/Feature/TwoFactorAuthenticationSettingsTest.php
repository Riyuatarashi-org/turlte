<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class TwoFactorAuthenticationSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_two_factor_authentication_can_be_enabled(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        $this->withSession(['auth.password_confirmed_at' => time()]);

        Livewire::test(TwoFactorAuthenticationForm::class)
            ->call('enableTwoFactorAuthentication');

        $user = $user->refresh();

        $this->assertNotNull($user->two_factor_secret);
        $this->assertCount(8, $user->recoveryCodes());
    }

    public function test_recovery_codes_can_be_regenerated(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        $this->withSession(['auth.password_confirmed_at' => time()]);

        $component = Livewire::test(TwoFactorAuthenticationForm::class)
            ->call('enableTwoFactorAuthentication')
            ->call('regenerateRecoveryCodes');

        $user = $user->refresh();

        $component->call('regenerateRecoveryCodes');

        $this->assertCount(8, $user->recoveryCodes());
        $this->assertCount(8, array_diff($user->recoveryCodes(), $user->refresh()->recoveryCodes()));
    }

    public function test_two_factor_authentication_can_be_disabled(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        $this->withSession(['auth.password_confirmed_at' => time()]);

        $component = Livewire::test(TwoFactorAuthenticationForm::class)
            ->call('enableTwoFactorAuthentication');

        $this->assertNotNull($user->refresh()->two_factor_secret);

        $component->call('disableTwoFactorAuthentication');

        $this->assertNull($user->refresh()->two_factor_secret);
    }
}
