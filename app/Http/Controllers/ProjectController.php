<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\User;
class ProjectController extends Controller
{
    // app/Http/Controllers/ProjectController.php
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $projects = Project::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }


    public function show($id)
    {
        $projects=Project::find($id);
        return view('projects.show', compact('projects'));
    }

    public function delete_project($id){
        Project::destroy($id);
        return redirect()->intended(route('projects.index'));
   }

   public function edit(Request $request){

            $res=Project::where("name",$request->project)->update(
            [
                "status"=>$request->inp1,
            ]
            );

        return response()->json(["data"=>'Successfully Updated'],200);

   }
   //employe side
   public function empproshow()
   {
       $projects = Project::all();
       return view('employe.empmodule.empproshow', compact('projects'));
   }

}
