<?php

namespace App\Models\experience;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $primarykey = 'id';
    protected  $fillable = [
        'dates',
        'title',
        'description',
        'color',
    ];
}
