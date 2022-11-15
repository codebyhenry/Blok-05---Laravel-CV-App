<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['_token', 'first_name', 'last_name', 'photo', 'address', 'email', 'phone', 'date_of_birth', 'nationality', 'linkedin_profile'];

    public function skills() {
        return $this->hasMany(Skill::class);
    }
}
