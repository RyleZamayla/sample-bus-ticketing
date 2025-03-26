<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'terminals';

    protected $fillable = [
        'name',
        'capacity',
        'location',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dispatchers()
    {
        return $this->belongsTo(Dispatcher::class, 'terminal_id');
    }
}
