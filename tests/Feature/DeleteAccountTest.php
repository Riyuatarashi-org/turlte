<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_accounts_can_be_deleted(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        Livewire::test(DeleteUserForm::class)
            ->set('password', 'password')
            ->call('deleteUser');

        $this->assertNotNull($user->refresh()->deleted_at);
    }

    public function test_correct_password_must_be_provided_before_account_can_be_deleted(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        Livewire::test(DeleteUserForm::class)
            ->set('password', 'wrong-password')
            ->call('deleteUser')
            ->assertHasErrors(['password']);

        $this->assertNull($user->refresh()->deleted_at);
    }
}
