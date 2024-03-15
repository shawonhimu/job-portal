<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'company_name',
        'joining_date',
        'departure_date',
        'candidate_id',
     ];
}
