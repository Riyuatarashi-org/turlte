<?php

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
 * @property \Illuminate\Support\Carbon|null $received_at
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * ----
 * Relations:
 * @property-read \App\Models\User           $author
 * @property-read null|\App\Models\User      $recipient
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
        'sent_at'     => 'datetime',
        'received_at' => 'datetime',
        'read_at'     => 'datetime',
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
