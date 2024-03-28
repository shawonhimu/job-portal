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

    public function education()
    {
        return $this->hasMany(CandidateEducation::class);
    }

    public function experience()
    {
        return $this->hasMany(CandidateExperience::class);
    }

    public function training()
    {
        return $this->hasMany(CandidateTraining::class);
    }

    public function skill()
    {
        return $this->hasOne(CandidateOther::class);
    }

    // public function job()
    // {
    //     return $this->hasMany(CompanyJob::class);
    // }

    public function company_job()
    {
        return $this->belongsToMany(CompanyJob::class);
    }

    public function salary()
    {
        return $this->belongsToMany(CompanyCandidateSalary::class, 'candidate_id', 'id');
    }

}
