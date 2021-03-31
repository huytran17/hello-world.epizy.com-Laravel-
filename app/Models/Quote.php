<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TimestampFormat;
use App\Traits\IsAlready;

class Quote extends Model
{
    use HasFactory, SoftDeletes, TimestampFormat, IsAlready;

    protected $fillable = [
    	'content',
    	'author',
    ];

    protected $appends = [
        'encrypted_id', 
        'dmy_created_at', 
        'dmy_updated_at', 
        'is_deleted'
    ];

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

    public function scopeGetQuoteById($query, $id)
    {
        return $query->where('id', $id)->withTrashed();
    }

    public function getById($id)
    {
        return $this->getQuoteById($id);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }
}
