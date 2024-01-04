<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\modules;
use App\Models\Project;
use App\Models\User;
use App\Models\task;
use Symfony\Component\HttpFoundation\Session\Session;


class ModuleController extends Controller
{
    public function index()
    {
      $module = modules::all();
      $projects=Project::all();
      $user=User::all();
      return view ('modules.indexmodule',["Module"=>$module,"User"=>$user,"Project"=>$projects]);
    }

    public function create()
    {
        $project=Project::all();
        $user=User::all();
        return view ('modules.createmodule',["projects"=>$project,"users"=>$user]);
    }


    public function get_user(Request $request){

        $users=User::where("dept",$request->dept)->get();
        return response(["users"=>$users],200);
    }


    function create_module(Request $request){
      $request->validate([
          'title' => 'required',
          'description' => 'required',
          'project_id'=>'required',
          'dept'=>'required',
          'user_id' => 'required',
          'status' => 'required',
          'assigned' => 'required',
          'submission' => 'required',
      ]);
      $data = [
          'Module_name' => $request->input('title'),
          'Description'=> $request->input('description'),
          'Project_id'=> $request->input('project_id'),
          'dept'=>$request->input('dept'),
          'user_id'=> $request->input('user_id'),
          'Module_status'=> $request->input('status'),
          'Assigned' => $request->input('assigned'),
          'Submission' => $request->input('submission')
      ];

      $modules=modules::create($data);

      if (!$modules) {
         return redirect()->route('modulecreate')->with("error","Module creation Failed, try again");
      }
       return redirect()->route('moduleindex')->with("success", "Module Creation successful");
  }
// edit user on admin
  public function edit_user(Request $request){
        $user=User::where('email',$request->inp2)->update([
            "name"=>$request->inp1,
            "email"=>$request->inp2,
            "phone"=>$request->inp3,
            "dept"=>$request->inp4,
            "usertype"=>$request->inp5
        ]);
  }
// index module page input edit
  public function edit_module(Request $request){


    $res=modules::where("id",$request->id)->update(
    [
        "Module_name"=> $request->inp1,
        "user_id"=> $request->inp2,
        "dept"=>$request->inp3,
        "Module_status"=> $request->inp4,
        "Submission"=> $request->inp5,
    ]
    );
        return response()->json(["data"=>'Successfully Updated'],200);

}

public function destroy($id){

    modules::destroy($id);
    return redirect()->intended(route('moduleindex'));
}
//model description
public function showdesc($id)
{
    $modules=modules::find($id);
    return response()->json( $modules);
}

function create_empmodule(Request $request){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'project_id'=>'required',
        'dept'=>'required',
        'user_id' => 'required',
        'status' => 'required',
        'assigned' => 'required',
        'submission' => 'required',
    ]);
    $data = [
        'Module_name' => $request->input('title'),
        'Description'=> $request->input('description'),
        'Project_id'=> $request->input('project_id'),
        'dept'=>$request->input('dept'),
        'user_id'=> $request->input('user_id'),
        'Module_status'=> $request->input('status'),
        'Assigned' => $request->input('assigned'),
        'Submission' => $request->input('submission')
    ];

    $modules=modules::create($data);

    if (!$modules) {
       return redirect()->route('moduleempcreate')->with("error","Module creation Failed, try again");
    }
     return redirect()->route('empmodule')->with("success", "Module Creation successful");
}

}

