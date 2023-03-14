<?php

declare(strict_types = 1);

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Laravel\Sanctum\PersonalAccessToken;

final class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();

        foreach ($user->tokens as $token) {
            /* @var PersonalAccessToken $token */
            $token->delete();
        }

        $user->delete();
    }
}
