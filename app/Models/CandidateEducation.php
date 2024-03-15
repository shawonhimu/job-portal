<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'degree_name',
        'institute_name',
        'subject_group',
        'board',
        'passing_year',
        'result',
        'candidate_id',
     ];
}
