<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\TimestampFormat;

class Message extends Model
{
    use HasFactory, TimestampFormat;

    protected $fillable = [
    	'content', 'user_id', 'role'
    ];

    protected $appends = [
    	'time_created'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function isMine()
    {
        return $this->attributes['id'] === auth()->id();
    }

    public function scopeGetByUserRole($query, $role)
    {
        return $this->where('role', $role);
    }

    public function scopeGetMessageById($query, $id)
    {
        return $query->where('id', $id);
    }

    public function getTimeCreatedAttribute()
    {
        return $this->Hs_Created();
    }

    public function lowerMessages()
    {
        return $this->getByUserRole(1)->get();
    }

    public function superMessages()
    {
        return $this->getByUserRole(0)->get();
    }

    public function getById($id)
    {
        return $this->getMessageById($id);
    }

    public function destroyMessage($message)
    {
        try {
            DB::transaction(function() use ($message) {
                return $message->delete($data);
            });
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }

    public function createMessage($data)
    {
        $message = $this;
        try {
            $message = $this->create($data);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }

        return $message;
    }
}