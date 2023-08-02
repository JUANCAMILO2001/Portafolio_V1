<?php

namespace App\Models\socialnetwok;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialnetwork extends Model
{
    use HasFactory;
    protected $table = 'socialnetworks';
    protected $primarykey = 'id';
    protected  $fillable = [
        'name',
        'logo',
    ];
}
