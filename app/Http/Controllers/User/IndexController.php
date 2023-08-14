<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\aboutme\Aboutme;
use App\Models\contact\Contact;
use App\Models\education\Education;
use App\Models\experience\Experience;
use App\Models\job\Job;
use App\Models\knowledge\Knowledge;
use App\Models\socialnetwok\Socialnetwork;
use App\Models\User;
use App\Models\workingskill\Workingskill;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $users = User::all();
        $socialnetworks = Socialnetwork::all();
        $aboutmes = Aboutme::all();
        $educations = Education::all();
        $experiences = Experience::all();
        $workingskills = Workingskill::all();
        $knowledges = Knowledge::all();
        $jobs = Job::all();
        return view('user.index',compact(
            'users',
            'socialnetworks',
            'aboutmes',
            'educations',
            'experiences',
            'workingskills',
            'knowledges',
            'jobs',
        ));
    }

    public function sendContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'asunto' => 'required',
            'message' => 'required',
        ]);
        $contacts = $request->all();
        Contact::create($contacts);
        return redirect()->back()->with('success', '¡El mensaje se a enviado exitosamente!');
    }
}
