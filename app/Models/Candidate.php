<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'email', 'first_name', 'last_name', 'mobile', 'password', 'img', 'otp',
     ];

    protected $attributes = [
        // 'otp' => 0,
        'img' => 'img/user.png',
     ];

    public function profile()
    {
        return $this->hasOne(CandidateProfile::class);
    }
}
