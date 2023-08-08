<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\aboutme\Aboutme;
use App\Models\socialnetwok\Socialnetwork;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $users = User::all();
        $socialnetworks = Socialnetwork::all();
        $aboutmes = Aboutme::all();
        return view('user.index',compact('users', 'socialnetworks','aboutmes'));
    }
}
