<?php

namespace App\Models\education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'education';
    protected $primarykey = 'id';
    protected  $fillable = [
        'dates',
        'title',
        'description',
        'color',
    ];
}
