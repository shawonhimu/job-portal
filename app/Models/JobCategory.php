<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_cat_name',
        'job_cat_details',
     ];

    public function job()
    {
        return $this->hasMany(CompanyJob::class);
    }

}
