<?php
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\taskcontrol;
use App\Models\modules;
use App\Models\Project;
use App\Models\task;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::post('/task/content',[taskcontrol::class,"update_content"])->name('update_task_content');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () { return view('login' ); })->name('home');
Route::get('/admin/index',function(){
    $projects=Project::all();
    $tasks=task::all();
    $modules=modules::all();
    return view('admin.adminhome',['tasks' => $tasks,"modules"=>$modules,"Projects"=>$projects]);
})->name('admin_index');
Route::get('profile/empprofile',[ProfileController::class,'empprofile'])->name('empprofile');

//manage users
Route::post('/edit_user',[ModuleController::class,'edit_user'])->name('edit_user');

// task create index(admin,emp)

Route::post('task/create',[taskcontrol::class,'create_task'])->name('createtasks');
Route::get('/index',[function () {
    $tasks=task::all();
    $modules=modules::all();
    $users=User::all();
    $projects = Project::all();
    return view('task.index',['tasks' => $tasks,"modules"=>$modules,"users"=>$users,"Projects"=>$projects]); }])->name('index');

Route::get('/create',[function () {
   $users=User::all();
   $projects=Project::all();
   $Modules=modules::all();
   return view('task.create',["users" => $users,"projects"=>$projects ]); }])->name('create');

Route::post('/getmodule',[taskcontrol::class,'getmodules'])->name('get_modules');
Route::post('/tasks/{id}', [taskcontrol::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{id}/edit', [taskcontrol::class, 'edit'])->name('tasks.edit');

Route::get('tasks/{id}', [taskcontrol::class, 'showdes'])->name('taskdes');

// user add and view

Route::get('/adduser',function(){ return view ('users.adduser'); })->name('adduser');
Route::get('/viewuser',function(){ $users=User::all();
    return view ('users.viewuser',["users" => $users]); })->name('viewuser');
Route::post('/delete_user/{id}',[taskcontrol::class, 'delete_user'])->name('delete_user');

// project
Route::resource('projects', ProjectController::class);
Route::get('/project/create',[ProjectController::class,'create'])->name('taskcreate');
Route::get('/project/index',[ProjectController::class,'index'])->name('taskindex');
Route::get('/project/show',[ProjectController::class,'show'])->name('taskshow');
Route::get('/project/completed',[ProjectController::class,'finished'])->name('taskfinished');
Route::post('/delete_project/{id}',[ProjectController::class, 'delete_project'])->name('delete_project');
Route::post('/editproject',[ProjectController::class, 'edit'])->name('edit_project');
Route::resource('task', taskcontrol::class);
Route::get('/showmodule/{id}',function($id){
    $proname=Project::where('id',$id)->get('name')->first();
    $Module=modules::where('Project_id',$id)->get();
    $user=User::where('usertype','user')->get();
    return view("projects.showmodule",["Module"=>$Module,"Project"=>$proname->name,"User"=>$user]);
})->name('showmodule');


//modules

Route::get('/module/index',[ModuleController::class,'index'])->name('moduleindex');

Route::get('/modulecreate',[function () {
        $users=User::all();
        $projects=Project::all();
        return view('modules.createmodule',["users" => $users,"projects"=>$projects ]); }])->name('create');

Route::post('/module/create',[ModuleController::class,'create_module'])->name('modulecreate');
Route::post('/editmodule', [ModuleController::class, 'edit_module'])->name('module.edit');
Route::post('/update',[ModuleController::class, 'update'])->name('update');
Route::post('/delete_module{id}',[ModuleController::class, 'destroy'])->name('delete_module');
require __DIR__.'/auth.php';
Route::get('module/{id}', [ModuleController::class, 'showdesc'])->name('moduledes');
Route::get('/showtask/{id}',function($id){
    $modname=modules::where('id',$id)->get()->first();
    $tasks=task::where('module_id',$id)->get();
    return view("modules.showtask",["tasks"=>$tasks,"Tasks"=>$modname->Module_name]);
})->name('showtask');
Route::post('/getusers',[ModuleController::class, 'get_user'])->name('getusers');

////////////////////////////////////////// employee sidee /////////////////////////////////////////////////
Route::post('/emptasks/{id}/edit',[taskcontrol::class,"emptask_update"])->name('emptask_update');
Route::post('/module/addmodule',[ModuleController::class,'create_empmodule'])->name('moduleempcreate');
Route::post('task/addtask',[taskcontrol::class,'create_emptask'])->name('createemptasks');
Route::get('/empnav',[function () {
    $tasks=task::where('id',Auth::user()->id)->get();
    return view('employe.empnav',['tasks' => $tasks]); }])->name('empnav');

Route::get('/empproject',[function () {
    $projects=Project::all();
    return view('employe/project/empproject');}])->name('empproject');

Route::get('/modules',[function () {
        $Modules=modules::where('user_id',Auth::user()->id)->get();
        $user=User::where('usertype','user')->get();
        $Project=Project::all();
        return view('employe/empmodule/empmindex',['Project'=>$Project,'Modules' => $Modules,"User"=>$user]); }])->name('empmodule');

Route::get('/indexemp',[function () {
    $tasks=task::where('user_id',Auth::user()->id)->get();
    $modules=modules::where('user_id',Auth::user()->id)->get();

    return view('employe.indexemp',['tasks'=> $tasks,'modules'=>$modules,]); }])->name('indexemp');

Route::get('/empproshow',[ProjectController::class,'empproshow'])->name('empproshow');
//show task
Route::get('/emptask',function(){
    $id=Auth::user()->id;
    $modules=modules::all();
    $tasks=task::where('user_id',$id)->get();
    $projects=Project::all();
    $users=User::all();
    return view("employe.empmodule.emptask",["tasks"=>$tasks,"modules"=>$modules,"Projects"=>$projects,"users"=>$users]);})->name('emptask');

//add module in emp side
Route::get('/addmod',[function () {
    $users=User::all();
    $projects=Project::all();
    return view('employe.empmodule.addmod',["users" => $users,"projects"=>$projects ]); }])->name('addmod');
//add task in emp side
Route::get('/addtask',[function () {
    $users=User::all();
    $projects=Project::all();
    $Modules=modules::where('user_id',Auth::user()->id)->get();
    return view('employe.empmodule.addtask',["users" => $users,"projects"=>$projects,'modules' => $Modules ]); }])->name('addtask');

// image view on task description
// web.php

Route::get('/view-media/{imageName}', 'taskcontrol@showImage')->name('view-media');



