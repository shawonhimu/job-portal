<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'designation', 'address', 'password', 'img', 'company_id',
     ];

    protected $attributes = [
        'img' => 'img/user.png',
     ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
