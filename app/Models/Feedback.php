<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'feedback';

    protected $fillable = [
    	'content',
    	'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function scopeGetFeedbackById($query, $id)
    {
        return $query->where('id', $id)->withTrashed();
    }

    public function getById($id)
    {
        return $this->getFeedbackById($id);
    }

    public function destroyFeedback($feed)
    {
        try {
            DB::transaction(function() use ($uid) {
                return $feed->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function forceDeleteFeedback($feed)
    {
        try {
            DB::transaction(function() use ($feed) {
                return $feed->forceDelete();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function restoreFeedback($feed)
    {
        try {
            DB::transaction(function() use ($feed) {
                return $feed->restore();
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
