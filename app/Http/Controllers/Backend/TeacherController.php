<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function teacher_list(){
        $data['getTeacher'] = User::getTeacher(Auth::user()->id, Auth::user()->is_admin) ;
        $data['meta_title'] = "Professor";
        //$user = User::all();
        return view('backend.teacher.list', $data);
    }
    public function create_teacher(){
        $data['meta_title'] = "Cadastrar Professor";
        return view('backend.teacher.create', $data);
    }
    
    public function insert_teacher(Request $request)
{
    
    request()->validate([
        'email' => 'required|email|unique:users',
    ]);

    $teacher = new User;
    $teacher->name = trim($request->name);
    $teacher->last_name = trim($request->last_name);
    $teacher->email = trim($request->email);
    $teacher->password = Hash::make($request->password);
    $teacher->current_address = trim($request->current_address);
    $teacher->address = trim($request->address);
    $teacher->qualification = trim($request->qualification);
    $teacher->work_experience = trim($request->work_experience);
    $teacher->status = trim($request->status);
    $teacher->note = trim($request->note);
    $teacher->gender = trim($request->gender);
    $teacher->birth = trim($request->birth);
    $teacher->date_joining = trim($request->date_joining);
    $teacher->phone = trim($request->phone);
    $teacher->marital_status = trim($request->marital_status);
    $teacher->created_by_id = Auth::user()->id;
    $teacher->is_admin = 5;
    $teacher->save();

    if (!empty($request->file('profile_pic'))) {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis') . Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/profile/', $filename);

        $teacher->profile_pic = $filename;
        $teacher->save();
    }

    return redirect('panel/teacher')->with('success', "Professor cadastrado com sucesso!");
}

public function update_teacher($id, Request $request)
    {
    
    $request->validate([
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

    $teacher = User::getSingle($id);
    $teacher->name = trim($request->name);
    $teacher->last_name = trim($request->last_name);
    $teacher->email = trim($request->email);
    if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
    $teacher->current_address = trim($request->current_address);
    $teacher->address = trim($request->address);
    $teacher->qualification = trim($request->qualification);
    $teacher->work_experience = trim($request->work_experience);
    $teacher->status = trim($request->status);
    $teacher->note = trim($request->note);
    $teacher->gender = trim($request->gender);
    $teacher->birth = trim($request->birth);
    $teacher->date_joining = trim($request->date_joining);
    $teacher->phone = trim($request->phone);
    $teacher->marital_status = trim($request->marital_status);

    if(!empty($request->file('profile_pic'))){

        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);
        $teacher->profile_pic = $filename;
    }

    $teacher->save();

    return redirect('panel/teacher')->with('success', "Professor Editado com sucesso!");
}

public function edit_teacher($id){
    $data['getTeacher'] = User::getSingle($id);
    $data['meta_title'] = "Editar Professor(a)";
    return view('backend.teacher.edit', $data);
}

public function delete_teacher($id){
    $user = User::getSingle($id);
    $user->is_delete = 1;
    $user->save();
    return redirect('panel/teacher')->with('success', "Professor(a) Apagado com sucesso!");
}
    
}