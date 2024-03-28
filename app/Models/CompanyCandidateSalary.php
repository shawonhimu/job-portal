<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCandidateSalary extends Model
{
    use HasFactory;
    protected $table = 'candidate_company_job';
    public $primaryKey = 'id';
    public $foreignId = 'candidate_id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'candidate_id',
        'company_job_id',
        'current_salary',
        'expected_salary',
     ];

    public function company_job()
    {
        return $this->hasMany(CompanyJob::class, 'id', 'company_job_id');
    }

    public function candidate()
    {
        return $this->hasMany(Candidate::class, 'id', 'candidate_id');
    }
}
