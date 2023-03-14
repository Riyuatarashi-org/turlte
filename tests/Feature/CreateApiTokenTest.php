<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CreateApiTokenTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_tokens_can_be_created(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        Livewire::test(ApiTokenManager::class)
            ->set([
                'createApiTokenForm' => [
                    'name' => 'Test Token',
                    'permissions' => [
                        'read',
                        'update',
                    ],
                ],
            ])
            ->call('createApiToken');

        $refreshedUser = $user->refresh();

        /** @var \App\Support\Sanctum\PersonalAccessToken $refreshedUserFirstToken */
        $refreshedUserFirstToken = $refreshedUser->tokens->firstOrFail();

        $this->assertCount(1, $refreshedUser->tokens);
        $this->assertTrue($refreshedUserFirstToken->can('read'));
        $this->assertFalse($refreshedUserFirstToken->can('delete'));

        $this->assertEquals('Test Token', $refreshedUserFirstToken->name);
    }
}
