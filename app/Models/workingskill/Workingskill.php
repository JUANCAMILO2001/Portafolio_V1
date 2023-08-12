<?php

namespace App\Models\workingskill;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workingskill extends Model
{
    use HasFactory;
    protected $table = 'workingskills';
    protected $primarykey = 'id';
    protected  $fillable = [
        'title',
        'porcentage',
        'color',
    ];
}
