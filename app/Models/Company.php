<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        "company_name",
        "company_type",
        "company_details",
        "establish_date",
        "company_logo",
        "company_phone",
        "company_email",
        "company_TIN_no",
        "company_fax_no",
        "company_password",
        "otp",
     ];

    protected $attributes = [
        'company_logo' => 'img/placeholder.jpg',
        'otp' => 0,
     ];

    public function employee()
    {
        return $this->hasMany(CompanyEmployee::class);
    }
    public function job()
    {
        return $this->hasMany(CompanyJob::class);
    }
}
