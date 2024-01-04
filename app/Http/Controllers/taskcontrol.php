<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\task;
use App\Models\modules;
use App\Models\Project;
use Symfony\Component\HttpFoundation\Session\Session;
// Assuming your User model is in the App\Models namespace
class taskcontrol extends Controller
{
    function login()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }

    function getmodules(Request $request){
        $modules=modules::where('Project_id',$request->data)->get();
        $data="";
        foreach($modules as $module){
            $data.="<option value='".$module->id."'>".$module->Module_name."</option>";
        }
        return response(["data"=>$data],200);
    }

    function delete_user($id){
         User::destroy($id);
         return redirect()->intended(route('viewuser'));
    }

    function update_content(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'dept'=>'required',
            'user_id' => 'required',
            'submission' => 'required',
            'remarks' => 'nullable', // You can adjust this based on your requirements
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,pdf,xlsx,docx,ppt|max:10048', // Adjust the file types and size limit
        ]);
        $taskId = $request->id;
        $task = Task::find($taskId);
        if (!$task) {
            return redirect()->route('index')->with("error", "Task not found");
        }

        $task->update([
            'Task_name' => $request->title,
            'Description' => $request->description,
            'Task_status' => $request->status,
            'dept' => $request->dept,
            'user_id'=> $request->user_id,
            'Submission' => $request->submission,
            'remarks' => $request->remark,
        ]);

        // Handle file upload for photo or video
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->extension();
            Storage::disk("task")->put($request->title.".".$extension,file_get_contents($request->file('media')));
            $task->update(['media' => 'storage/task/'.$request->title.".".$extension]);
        }

        return redirect()->route('index')->with("success", "Task updated successfully");
    }
    public function destroy($id)
    {
        task::destroy($id);
        return redirect()->route('index')->with('success', 'Task deleted successfully!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
// login post reg post and logout are above
// task controller create index validate update edit delete are  bellow

    function create_task(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id'=>'required',
            'module_id'=>'required',
            'dept'=>'required',
            'user_id'=>'required',
            'status' => 'required',
            'assigned' => 'required',
            'submission' => 'required',
        ]);
        $data = [
            'Task_name' => $request->input('title'),
            'Description'=> $request->input('description'),
            'Projects'=> $request->input('project_id'),
            'module_id'=> $request->input('module_id'),
            'dept'=>$request->input('dept'),
            'user_id'=>$request->input('user_id'),
            'Task_status'=> $request->input('status'),
            'Assigned' => $request->input('assigned'),
            'Submission' => $request->input('submission')
        ];
        $task=task::create($data);

        if (!$task) {
           return redirect()->route('create')->with("error","Task creation Failed, try again");
        }
         return redirect()->route('index')->with("success", "Task Creation successful");
    }
// edit
    public function edit($id)
    {
        $task = Task::find($id);
        $users = User::all(); // Assuming you have a User model

        return view('task.tedit', compact('task', 'users'));
    }
    public function index()
    {
    $tasks = Task::all();
    $project = Project::all();
    return view('task.index', compact('tasks','project'));
    }
    public function create()
    {
    $project = Project::all();
    $module = modules::all();
    $users = User::all();
    return view('task.create', ["Projects"=>$project,"modules"=>$module,"users"=>$users]);
    }
    public function store(Request $request)
    {
    $task = Task::create($request->all());
    return redirect()->route('task.index')->with('success', 'Task created successfully');
    }
    //model description
    public function showdes($id)
    {
        $tasks = Task::find($id);
        return response()->json( $tasks);
    }
    public function taskemp()
    {
    $tasks = Task::all();
    return view('employe.taskemp', compact('taskemp'));
    }
    public function indexemp()
    {
       return view('employe.indexemp', compact('indexemp'));
    }
// for task description model imagee

public function showImage($imageName)
{
    $path = 'task/' . $imageName;
    $imagePath = storage_path('app/public/' . $path);

    if (file_exists($imagePath)) {
        $file = Storage::get('public/' . $path);
        $type = Storage::mimeType('public/' . $path);

        return (new Response($file, 200))
            ->header('Content-Type', $type);
    }

    abort(404);
}
// for emp side task create
function create_emptask(Request $request){

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'project_id'=>'required',
        'module_id'=>'required',
        'dept'=>'required',
        'user_id'=>'required',
        'status' => 'required',
        'assigned' => 'required',
        'submission' => 'required',
    ]);
    $data = [
        'Task_name' => $request->input('title'),
        'Description'=> $request->input('description'),
        'Projects'=> $request->input('project_id'),
        'dept'=>$request->input('dept'),
        'module_id'=> $request->input('module_id'),
        'user_id'=>$request->input('user_id'),
        'Task_status'=> $request->input('status'),
        'Assigned' => $request->input('assigned'),
        'Submission' => $request->input('submission')
    ];
    $task=task::create($data);

    if (!$task) {
       return redirect()->route('addtask')->with("error","Task creation Failed, try again");
    }
     return redirect()->route('emptask')->with("success", "Task Creation successful");
}
// for emp side task edit
function emptask_update(Request $request){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'status' => 'required',
        'dept'=>'required',
        'user_id' => 'required',
        'submission' => 'required',
        'remarks' => 'nullable', // You can adjust this based on your requirements
        'media' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,pdf,xlsx,docx,ppt|max:10048', // Adjust the file types and size limit
    ]);
    $taskId = $request->id;
    $task = Task::find($taskId);
    if (!$task) {
        return redirect()->route('indexemp')->with("error", "Task not found");
    }

    $task->update([
        'Task_name' => $request->title,
        'Description' => $request->description,
        'Task_status' => $request->status,
        'dept' => $request->dept,
        'user_id'=> $request->user_id,
        'Submission' => $request->submission,
        'remarks' => $request->remark,
    ]);
    // Handle file upload for photo or video
    if ($request->hasFile('media')) {
        $file = $request->file('media');
        $extension = $file->extension();
        Storage::disk("task")->put($request->title.".".$extension,file_get_contents($request->file('media')));
        $task->update(['media' => 'storage/task/'.$request->title.".".$extension]);
    }
    return redirect()->route('indexemp')->with("success", "Task updated successfully");
    }

}



