<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'dispatchers';

    protected $fillable = [
        'terminal_id',
        'fname', 
        'mname', 
        'lname', 
        'gender',
        'suffix',
        'phone',
        'address',
        'email',
        'password',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function terminal()
    // {
    //     return $this->belongsTo(Terminal::class, 'terminal_id');
    // }

}
