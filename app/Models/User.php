<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Traits\TimestampFormat;
use App\Traits\IsAlready;
use App\Services\UserRoleService;
use Avatar;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, TimestampFormat, IsAlready;

    const SUPER_ADMIN_TYPE = 0, LOWER_ADMIN_TYPE = 1, CLIENT_TYPE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'encrypted_id', 
        'dmy_created_at', 
        'dmy_updated_at', 
        'is_subscribed', 
        'is_verified', 
        'is_deleted',
        'role_type'
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->withTrashed();
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category')->withTrashed();
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->withTrashed();
    }

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote')->withTrashed();
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback')->withTrashed();
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function isSuperAdmin()
    {
        return $this->role === self::SUPER_ADMIN_TYPE;
    }

    public function isLowerAdmin()
    {
        return $this->role === self::LOWER_ADMIN_TYPE;
    }

    public function isClient()
    {
        return $this->role === self::CLIENT_TYPE;
    }

    public function isAdministrator()
    {
        return $this->isSuperAdmin() or $this->isLowerAdmin();
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getProfilePhotoPathAttribute($value)
    {
        if (empty($this->profile_photo_path)) {
            return Avatar::create($this->name)
            ->setDimension(80, 80)
            ->setFontSize(40)
            ->setShape('circle')
            ->toBase64();
        }
        return $this->profile_photo_path;
    }

    public function getDmyCreatedAtAttribute()
    {
        return $this->dmY_HsiCreated();
    }

    public function getDmyUpdatedAtAttribute()
    {
        return $this->dmY_HsiUpdated();
    }

    public function getEncryptedIdAttribute()
    {
        return base64_encode($this->id);
    }

    public function getIsSubscribedAttribute()
    {
        return $this->isSubscribed();
    }

    public function getIsVerifiedAttribute()
    {
        return $this->isVerified();
    }

    public function getIsDeletedAttribute()
    {
        return $this->isDeleted();
    }

    public function getRoleTypeAttribute()
    {
        return $this->role === 0 ? 'Super Admin' : ($this->role === 1 ? 'Vice Admin' : 'Client');
    }

    public function makeHash($value)
    {
        return Hash::make($value);
    }

    public function scopeGetNewInMonth($query, $month, $year)
    {
        return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
    }

    public function scopeGetUserByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeGetUserById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function getByRole($role)
    {
        return $this->getUserByRole($role);
    }

    public function getInMonth($month, $year)
    {
        return $this->getNewInMonth($month, $year)->withTrashed();
    }

    public function getById($uid)
    {
        return $this->getUserById($uid);
    }

    public static function destroyUser($user)
    {
        return $user->delete();
    }

    public function restoreUser($user)
    {
        return $user->restore();
    }

    public function forceDeleteUser($user)
    {
        return $user->forceDelete();
    }

    //user role
    public function upgrade($uid)
    {
        $this->updateRole($uid, 1);
    }

    public function downgrade($uid)
    {
        $this->updateRole($uid, 0);
    }

    public function updateRole($uid, $action)
    {
        $user = $this->getById($uid)->firstOrFail();
        
        $role = UserRoleService::getRole($user, $action);

        $user->updateUser([
            'role' => $role
        ]);
    }

    public function updateUser($data)
    {
        try {
            $this->update($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function store($data)
    {
        return $this->createUser($data);
    }
    
    public function createUser($data)
    {
        $user = $this;
        try {
            $user = $this->create($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return $user;
    }

}
