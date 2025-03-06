<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'phone_verified_at',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function buildings(): User|HasMany
    {
        return $this->hasMany('App\Models\Building');
    }

    public function hasBuilding(): bool
    {
        return $this->buildings()->count() > 0;
    }

    public function isTechnician()
    {
        return $this->roles()->where('name', '=','technician')->exists();
    }
    public function isNotTechnician()
    {
        return $this->roles()->where('name', '=','technician')->doesntExist();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */





    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }





    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
    public function hasAnyRole(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }





}
