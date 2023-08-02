<?php

namespace App\Models\aboutme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutme extends Model
{
    use HasFactory;
    protected $table = 'aboutmes';
    protected $primarykey = 'id';
    protected  $fillable = [
        'description',
        'title_skill',
        'description_skill',
        'color_skill',
        'logo_skill',
    ];
}
