<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property \App\Profile profile
 * @property mixed id
 * @property mixed company
 * @property mixed password
 * @property mixed name
 * @property mixed company_id
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
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
    public function receptions(): BelongsToMany
    {
        return $this->belongsToMany(Reception::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getImageAttribute()
    {
        if (!$this->avatar()->exists()) {
            return asset('images/default.png');
        }

        return asset("storage/" . $this->avatar->path);
    }

    public function avatar()
    {
        return $this->morphOne(Media::class, 'storable');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'storable');
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
        if ($this->profile) {
            return optional($this->profile)->phone;
        }

        return '';
    }

    /**
     * @return string
     */
    public function getPositionAttribute(): string
    {
        if ($this->profile) {
            return optional($this->profile)->position;
        }

        return '';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
