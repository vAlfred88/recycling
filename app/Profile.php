<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Profile
 * @property mixed position
 * @property mixed phone
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Profile extends Model
{
    protected $fillable = [
        'phone',
        'position'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
