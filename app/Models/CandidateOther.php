<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateOther extends Model
{
    use HasFactory;
    protected $fillable = [ 'skills', 'candidate_id' ];
}
