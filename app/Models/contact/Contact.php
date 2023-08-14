<?php

namespace App\Models\contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primarykey = 'id';
    protected  $fillable = [
        'name',
        'email',
        'asunto',
        'message',
    ];
}
