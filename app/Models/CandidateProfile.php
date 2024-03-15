<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        "fullname",
        "father_name",
        "mother_name",
        "date_of_birth",
        "NID",
        "birth_registration_id",
        "passport_no",
        "phone",
        "email",
        "linked_in",
        "github",
        "social_media1",
        "website",
        "present_address",
        "permanent_address",
        "candidate_id",
     ];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
