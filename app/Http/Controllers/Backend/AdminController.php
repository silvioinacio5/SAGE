<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin_list(){
        $data['getAdmin'] = User::getAdmin();
        $data['meta_title'] = "Admin";
        //$user = User::all();
        return view('backend.admin.list', $data);
    }
    public function create_admin(){
        $data['meta_title'] = "Cadastrar Admin";
        return view('backend.admin.create', $data);
    }
    public function insert_admin(Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->address = trim($request->address);
        $user->status = trim($request->status);
        $user->is_admin = 1;
        $user->created_by_id = Auth::user()->id;
        $user->save();
        

        if(!empty($request->file('profile_pic'))){

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }
        return redirect('panel/admin')->with('success', "Admin criada com sucesso!");

    }
    public function edit_admin($id){
        $data['getAdmin'] = User::getSingle($id);
        $data['meta_title'] = "Editar Admin";
        return view('backend.admin.edit', $data);
    }

    public function update_admin($id, Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->is_admin = trim($request->is_admin);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->address = trim($request->address);
        $user->status = trim($request->status);
        $user->save();
        

        if(!empty($request->file('profile_pic'))){

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }
        return redirect('panel/admin')->with('success', "Admin Editada com sucesso!");

    }

    public function delete_admin($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/admin')->with('success', "Admin Apagada com sucesso!");
    }
}
