<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'last_names',
        'birth_date',
        'phone_number',
        'city',
        'dni',
        'email',
        'course_id'
    ];

    public function course() {
        return $this->belongsTo('Course');
    }
}
