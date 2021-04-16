<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use App\Traits\TimestampFormat;

class Comment extends Model
{
    use HasFactory, SoftDeletes, TimestampFormat;

    protected $fillable = [
    	'content',
    	'parent_id',
        'time_created',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent_id')->withTrashed();
    }

    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id')->with(['user'])->latest()->withTrashed();
    }

    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = json_encode($value);
    }

    public function getMetaDataAttribute($value)
    {
        return json_decode($value);
    }

    public function getTimeCreatedAttribute()
    {
        return $this->Hs_Created();
    }

    public function isParent()
    {
        return $this->attributes['parent_id'] === null;
    }

    public function isChild()
    {
        return $this->attributes['parent_id'] !== null;
    }

    public function destroyComment($comment)
    {
        try {
            DB::transaction(function() use ($comment) {
                return $comment->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function forceDeleteComment($comment)
    {
        try {
            DB::transaction(function() use ($comment) {
                return $comment->forceDelete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function restoreComment($comment)
    {
        try {
            DB::transaction(function() use ($comment) {
                return $comment->restore();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function createComment($data)
    {
        $cmt = $this;
        try {
            $cmt = $this->create($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return $cmt;
    }
}
