<?php

declare( strict_types=1 );

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int                                                                            $id
 * @property string                                                                         $name
 * @property string                                                                         $email
 * @property null|\Illuminate\Support\Carbon                                                $email_verified_at
 * @property string                                                                         $password
 * @property null|string                                                                    $profile_photo_path
 * @property null|string                                                                    $current_team_id
 * @property null|string                                                                    $profile_photo_url
 * @property null|string                                                                    $remember_token
 * @property null|string                                                                    $two_factor_secret
 * @property null|string                                                                    $two_factor_recovery_codes
 * @property null|\Illuminate\Support\Carbon                                                $created_at
 * @property null|\Illuminate\Support\Carbon                                                $updated_at
 * @property null|\Illuminate\Support\Carbon                                                $deleted_at
 *
 * @property \Illuminate\Database\Eloquent\Collection<\Laravel\Sanctum\PersonalAccessToken> $tokens
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<\App\Models\Message> $messagesSend
 * @property-read \Illuminate\Database\Eloquent\Collection<\App\Models\Message> $messagesReceived
 */
final class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // --------------------------------------------------
    // ---- Relationships

    public function messagesSend(): HasMany
    {
        return $this->hasMany(Message::class, 'author_id');
    }

    public function messagesReceived(): HasMany
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }
}
