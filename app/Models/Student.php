<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function college() {
        return $this->belongsTo(College::class);
    }
}
