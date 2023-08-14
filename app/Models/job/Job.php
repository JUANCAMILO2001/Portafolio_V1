<?php

namespace App\Models\job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $primarykey = 'id';
    protected  $fillable = [
        'tag',
        'title',
        'client',
        'lenguajes',
        'url',
        'color',
        'imagen',
        'description',
    ];
}
