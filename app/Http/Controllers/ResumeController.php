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

    public function updateResumeView($id){
        $resume = Resume::where('id', $id)->first();
        return view('update', ['resume' => $resume]);
    }

    // Create Resume Handler
    public function resumeSave(Request $req){
        // dd($req->all());

        $req->validate([
            'title' => 'required',
            'profession' => 'required',
            'email' => 'required|unique:resumes,email',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'objective' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'ins_location' => 'required',
            'yop' => 'required',
            'marks' => 'required',
            'skills' => 'required',
            'company' => 'required',
            'description' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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

    // Update Resume Handler
    public function resumeUpdate(Request $req ,$id){
        $resume = Resume::where('id', $id)->first();
        
        $resume->title = $req->title;
        $resume->profession = $req->profession;
        $resume->email = $req->email;
        $resume->phone = $req->phone;
        $resume->address = $req->address;
        $resume->objective = $req->objective;
        $resume->skills = json_encode($req->skills);

        $education = [];

        foreach($req->institute as $key => $val){
            $education[$key]['institute'] = $val;
            $education[$key]['degree'] = $_POST['degree'][$key];
            $education[$key]['yop'] = $_POST['yop'][$key];
            $education[$key]['marks'] = $_POST['marks'][$key];
        }
        
        $resume->education = json_encode($education);
        
        $experience = [];
        
        foreach($req->position as $key => $val){
            $experience[$key]['position'] = $val;
            $experience[$key]['company'] = $_POST['company'][$key];
            $experience[$key]['description'] = $_POST['description'][$key];
            $experience[$key]['start_date'] = $_POST['start_date'][$key];
            $experience[$key]['end_date'] = $_POST['end_date'][$key];
        }

        $resume->experience = json_encode($experience);
        $resume->save();
    }
    
    public function resumeDelete($id){
        $resume = Resume::where('id', $id)->first();
        $resume->delete();
        return back()->withSuccess("Resume deleted...");
    }

    public function resumeView($tempId, $id){
        $resume = Resume::where('id', $id)->first();
        if($tempId == 1){
            return view('templates.resume', ['resume' => $resume]);
        }
        elseif($tempId == 2){
            return view('templates.resume2', ['resume' => $resume]);
        }
    }
    
    public function resumeSelectView($id){
        $resume = Resume::where('id', $id)->first();
        return view('select', ['resume' => $resume]);
    }
}
