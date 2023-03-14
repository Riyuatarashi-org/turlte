<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class BrowserSessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_other_browser_sessions_can_be_logged_out(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        Livewire::test(LogoutOtherBrowserSessionsForm::class)
            ->set('password', 'password')
            ->call('logoutOtherBrowserSessions')
            ->assertSuccessful();
    }
}
