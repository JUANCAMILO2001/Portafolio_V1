<?php

namespace App\Models\knowledge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;
    protected $table = 'knowledge';
    protected $primarykey = 'id';
    protected  $fillable = [
        'name',
    ];
}
