<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'benefits',
        'required_skills',
        'application_deadline',
        'salary',
        'company_id',
        'employee_id',
        'job_category_id',
     ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    // public function company_job()
    // {
    //     return $this->belongsTo(CandidateApplicationCompanyJob::class);
    // }

    public function candidate()
    {
        return $this->belongsToMany(Candidate::class);
    }

}
