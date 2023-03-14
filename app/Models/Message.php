<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int                             $id
 * @property string                          $message
 * @property int                             $author_id
 * @property null|int                        $recipient_id
 * @property \Illuminate\Support\Carbon      $sent_at
 * @property null|\Illuminate\Support\Carbon $received_at
 * @property null|\Illuminate\Support\Carbon $read_at
 * @property null|\Illuminate\Support\Carbon $created_at
 * @property null|\Illuminate\Support\Carbon $updated_at
 * @property null|\Illuminate\Support\Carbon $deleted_at
 *                                                         ----
 *                                                         Relations:
 * @property \App\Models\User                $author
 * @property null|\App\Models\User           $recipient
 */
class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    /** @var string[] */
    protected $casts = [
        'sent_at' => 'datetime',
        'received_at' => 'datetime',
        'read_at' => 'datetime',
    ];

    // --------------------------------------------------
    // ---- Relationships

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
