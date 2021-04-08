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
        'user_id'
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

    public function scopeGetCateChildWith($query, $withFields, $parent_id)
    {
        return $query->select($withFields)->where('parent_id', $parent_id);
    }

    public function getById($id)
    {
        return $this->getCategoryById($id);
    }

    public function isParent()
    {
        return $this->attributes['parent_id'] === null;
    }

    public function isChild()
    {
        return $this->attributes['parent_id'] !== null;
    }

    public function getParentWith($withFields)
    {
        return $this->getCateParentWith($withFields);
    }

    public function getParentHasChildWith($withFields)
    {
        return $this->has('children')->getCateParentWith($withFields);
    }

    public function getChildWith($withFields, $parent_id)
    {
        return $this->getCateChildWith($withFields, $parent_id);
    }

    public function updateCategory($id, $data)
    {
        try {
            $this->getById($id)->update($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function destroyCategory($id_arr)
    {
        try {
            DB::transaction(function() use ($id_arr) {
                $this->whereIn('id', $id_arr)->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function restoreCategory($id_arr)
    {
        try {
            DB::transaction(function() use ($id_arr) {
                $this->whereIn('id', $id_arr)->restore();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function forceDeleteCategory($id_arr)
    {
        try {
            DB::transaction(function() use ($id_arr) {
                $this->whereIn('id', $id_arr)->forceDelete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function store($data)
    {
        return $this->createCate($data);
    }
    
    public function createCate($data)
    {
        $data['user_id'] = auth()->id();
        
        $cate = $this;
        try {
            $cate = $this->create($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return $cate;
    }
}
