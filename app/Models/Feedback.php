<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $feed->delete();
    }

    public function forceDeleteFeedback($feed)
    {
        return $feed->forceDelete();
    }

    public function restoreFeedback($feed)
    {
        return $feed->restore();
    }
}
