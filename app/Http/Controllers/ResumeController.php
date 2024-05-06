<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //
    public function homeView(){
        $resumes = Resume::latest()->get();
        return view('home', ['resumes' => $resumes]);
    }

    public function createResumeView(){
        return view('create');
    }

    // Resume Input Handler
    public function resumeSave(Request $req){
        // dd($req->all());

        $req->validate([
            'title' => 'required',
            'profession' => 'required',
            'email' => 'required|unique:resumes,email',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
        ]);

        $newResume = new Resume();

        $newResume->title = $req->title;
        $newResume->profession = $req->profession;
        $newResume->email = $req->email;
        $newResume->phone = $req->phone;
        $newResume->address = $req->address;
        $newResume->objective = $req->objective;
        $newResume->skills = json_encode($req->skills);

        $education = [];

        foreach($req->institute as $key => $val){
            $education[$key]['institute'] = $val;
            $education[$key]['degree'] = $_POST['degree'][$key];
            $education[$key]['yop'] = $_POST['yop'][$key];
            $education[$key]['marks'] = $_POST['marks'][$key];
        }
        
        $newResume->education = json_encode($education);
        
        $experience = [];
        
        foreach($req->position as $key => $val){
            $experience[$key]['position'] = $val;
            $experience[$key]['company'] = $_POST['company'][$key];
            $experience[$key]['description'] = $_POST['description'][$key];
            $experience[$key]['start_date'] = $_POST['start_date'][$key];
            $experience[$key]['end_date'] = $_POST['end_date'][$key];
        }

        $newResume->experience = json_encode($experience);

        $newResume->save();
        return back()->withSuccess("Resume saved...");
    }

    public function resumeView($id){
        $resume = Resume::where('id', $id)->first();
        return view('resume', ['resume' => $resume]);
    }
}
