<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property \App\Profile profile
 * @property mixed id
 * @property mixed company
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function receptions(): BelongsToMany
    {
        return $this->belongsToMany(Reception::class);
    }

    public function avatar()
    {
        return $this->morphOne(Media::class, 'storable');
    }

    public function getImageAttribute()
    {
        return asset("storage/" . $this->avatar->path);
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * @return string
     */
    public function getPhoneAttribute(): string
    {
        return optional($this->profile)->phone;
    }

    /**
     * @return string
     */
    public function getPositionAttribute(): string
    {
        return optional($this->profile)->position;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
