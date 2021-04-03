<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\TimestampFormat;
use App\Traits\IsAlready;
use DB;

class Category extends Model
{
    use HasFactory, SoftDeletes, TimestampFormat, IsAlready;

    protected $fillable = [
    	'title',
    	'slug',
    	'description',
    	'parent_id',
    ];

    protected $appends = [
        'encrypted_id',
        'dmy_created_at', 
        'dmy_updated_at', 
        'is_deleted'
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id')->withTrashed();
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->withTrashed();
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getEncryptedIdAttribute($value)
    {
        return base64_encode($this->attributes['id']);
    }

    public function getDmyCreatedAtAttribute()
    {
        return $this->dmY_HsiCreated();
    }

    public function getDmyUpdatedAtAttribute()
    {
        return $this->dmY_HsiUpdated();
    }

    public function getIsDeletedAttribute()
    {
        return $this->isDeleted();
    }

    public function scopeGetCategoryById($query, $id)
    {
        return $query->where('id', $id)->withTrashed();
    }

    public function scopeGetCateParentWith($query, $withFields)
    {
        return $query->select($withFields)->where('parent_id', null);
    }

    public function getById($id)
    {
        return $this->getCategoryById($id);
    }

    public function destroyCategory($id)
    {
        try {
            DB::transaction(function() use ($id) {
                return $this->getById($id)->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function restoreCategory($id)
    {
        try {
            DB::transaction(function() use ($id) {
                return $this->getById($id)->restore();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function forceDeleteCategory($id)
    {
        try {
            DB::transaction(function() use ($id) {
                return $this->getById($id)->forceDelete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function getParentWith($withFields)
    {
        return $this->getCateParentWith($withFields);
    }

    public function updateCategory($data)
    {
        try {
            $this->update($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
