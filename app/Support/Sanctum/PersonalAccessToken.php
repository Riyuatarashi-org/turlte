<?php

declare(strict_types = 1);

namespace App\Support\Sanctum;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

/**
 * @property int                             $id
 * @property int                             $user_id
 * @property string                          $name
 * @property string                          $token
 * @property array                           $abilities
 * @property null|\Illuminate\Support\Carbon $expires_at
 * @property \App\Models\User                $user
 */
final class PersonalAccessToken extends SanctumPersonalAccessToken
{
    //
}
