<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    	'content',
    	'parent_id',
    	'meta_data',
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Post')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent_id')->withTrashed();
    }

    public function setMetaDataAttribute($value)
    {
        $this->attributes['meta_data'] = json_encode($value);
    }

    public function getMetaDataAttribute($value)
    {
        return json_decode($value);
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
}
