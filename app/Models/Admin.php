<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'admins';

    protected $fillable = [
        'fname', 
        'mname', 
        'lname',
        'suffix',
        'phone',
        'address',
        'email',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


}
