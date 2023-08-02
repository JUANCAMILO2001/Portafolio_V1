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
        'imagen',
        'title',
        'tag',
        'url',
        'color',
    ];
}
