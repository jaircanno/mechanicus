<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /* * * * RELATIONSHIPS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    /**
     * Get the User Info record associated with the user.
     *
     * @return HasOne
     */
    public function userInfo(): HasOne
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    /**
     * Get the Role record associated with the user.
     *
     * @return HasOne
     */
    public function role(): hasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * Get the Owner record associated with the user.
     *
     * @return BelongsToMany
     */
    public function owner(): BelongsToMany
    {
        return $this->belongsToMany(
            __CLASS__,
            'assigned_owners',
            'user_id',
            'owner_id',
            'id',
            'id',
            'owner'
        );
    }

    /**
     * Get the Sub Users associated with the user.
     *
     * @return BelongsToMany
     */
    public function subUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            __CLASS__,
            'assigned_owners',
            'owner_id',
            'user_id',
            'id',
            'id',
            'subUser'
        );
    }

    /**
     * Get the Address record associated with the user.
     *
     * @return MorphOne
     */
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the Customer records associated with the user.
     *
     * @return HasMany
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'user_id', 'id');
    }


    /* * * * AUXILIARY FUNCTIONS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    /* ----- UserInfo functions ---------------------------------------------------------------- */


    /* ----- Roles functions ------------------------------------------------------------------- */
    /**
     * Check if the User has a certain Role.
     *
     * @param array $roles
     * @return bool
     */
    public function hasRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->role->name === $role) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the user is an owner role type.
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->hasRole(['owner']);
    }

    /**
     * Auxiliary function to get the owner id.
     *
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->isOwner() ? $this->id : $this->owner[0]->id;
    }


    /* ----- Customers functions --------------------------------------------------------------- */
    /**
     * Get the Customers records associated with the owner user.
     *
     * @return mixed
     */
    public function getUserCustomers()
    {
        return $this->isOwner() ? $this->customers : $this->owner[0]->customers;
    }


    /* ----- Companies functions --------------------------------------------------------------- */


    /* ----- Vehicles functions ---------------------------------------------------------------- */

}
