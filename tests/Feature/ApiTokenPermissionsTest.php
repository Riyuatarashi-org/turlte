<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Http\Livewire\ApiTokenManager;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_token_permissions_can_be_updated(): void
    {
        $user = UserFactory::new()->createOne();

        $this->actingAs($user);

        $token = $user->tokens()->create([
            'name' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => ['message:create', 'message:read'],
        ]);

        Livewire::test(ApiTokenManager::class)
            ->set(['managingPermissionsFor' => $token])
            ->set([
                'updateApiTokenForm' => [
                    'permissions' => [
                        'message:delete',
                        'missing-permission',
                    ],
                ],
            ])
            ->call('updateApiToken');

        /** @var \Laravel\Sanctum\PersonalAccessToken $refreshedUserFirstToken */
        $refreshedUserFirstToken = $user->refresh()->tokens->firstOrFail();

        $this->assertTrue($refreshedUserFirstToken->can('message:delete'));
        $this->assertFalse($refreshedUserFirstToken->can('message:read'));
        $this->assertFalse($refreshedUserFirstToken->can('missing-permission'));
    }
}
