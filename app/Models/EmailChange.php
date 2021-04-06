<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailChange extends Model
{
    use HasFactory;

    protected $table = 'email_changes';

    protected $fillable = [
    	'email',
    	'email_new',
    	'token'
    ];

    public function scopeGetRecordByEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeGetRecordByToken($query, $token)
    {
        return $query->where('token', $token);
    }

    public function getByEmail($email)
    {
        return $this->getRecordByEmail($email);
    }

    public function getByToken($token)
    {
        return $this->getRecordByToken($token);
    }

    public function store($data)
    {
        try {
            $this->updateOrCreate([
                'email' => $data['email']
            ], [
                'token' => $data['token'],
                'email_new' => $data['email_new']
            ]);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            dd($ex->getMessage());
        }
    }
}
