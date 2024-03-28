<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateCompanyJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'company_job_id',
        'current_salary',
        'expected_salary',
     ];

    public function company_job()
    {
        return $this->hasMany(CompanyJob::class);
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }
}
