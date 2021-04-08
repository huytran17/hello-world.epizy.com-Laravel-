<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\TimestampFormat;
use App\Traits\IsAlready;
use DB;
class Post extends Model
{
    use HasFactory, SoftDeletes, TimestampFormat, IsAlready;

    protected $fillable = [
    	'title',
    	'slug',
    	'content',
    	'meta_data',
        'user_id',
        'category_id',
        'description'
    ];

    protected $appends = [
        'encrypted_id', 
        'dmy_created_at', 
        'dmy_updated_at', 
        'is_deleted'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withTrashed();
    }

    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = json_encode($value);
    }

    public function getMetaDataAttribute($value)
    {
        return json_decode($value);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
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

    public function getIsDeletedAttribute()
    {
        return $this->isDeleted();
    }

    public function scopeGetNewInMonth($query, $month, $year)
    {
        return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
    }

    public function scopeGetPostById($query, $id)
    {
        return $query->where('id', $id)->withTrashed();
    }

    public function getInMonth($month, $year)
    {
        return $this->getNewInMonth($month, $year)->withTrashed();
    }

    public function getById($id)
    {
        return $this->getPostById($id);
    }

    public function destroyPost($id_arr)
    {
        try {
            DB::transaction(function() use ($id_arr) {
                $this->whereIn('id', $id_arr)->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
        // dd($id_arr);
    }

    public function restorePost($id_arr)
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

    public function forceDeletePost($id_arr)
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

    public function updatePost($pid,$data)
    {
        try {
            $this->getPostById($pid)->update($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function store($data)
    {
        return $this->createPost($data);
    }
    
    public function createPost($data)
    {
        $post = $this;
        try {
            $post = $this->create($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return $post;
    }
}
