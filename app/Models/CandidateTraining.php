<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'training_name',
        'institute_name',
        'start_date',
        'end_date',
        'candidate_id',
     ];
}
