<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresaController extends Controller
{
    public function empresa_list(){
        $data['getSchool'] = User::getSchool();
        $data['meta_title'] = "Empresa";
        //$user = User::all();
        return view('backend.empresas.list', $data);
    }
    public function create_empresa(){
        $data['meta_title'] = "Cadastrar Empresa";
        return view('backend.empresas.create', $data);
    }
    public function insert_empresa(Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->descricao = trim($request->descricao);
        $user->website = trim($request->website);
        $user->nif = trim($request->nif);
        $user->industria = trim($request->industria);
        $user->phone = trim($request->phone);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->address = trim($request->address);
        $user->status = 1;
        $user->is_admin = 3;
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
        return redirect('panel/empresa')->with('success', "Empresa criada com sucesso!");

    }
    public function edit_empresa($id){
        $data['getSchool'] = User::getSingle($id);
        $data['meta_title'] = "Editar empresa";
        return view('backend.empresas.edit', $data);
    }

    public function update_empresa($id, Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->descricao = trim($request->descricao);
        $user->website = trim($request->website);
        $user->nif = trim($request->nif);
        $user->industria = trim($request->industria);
        $user->phone = trim($request->phone);
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->address = trim($request->address);
        $user->status = 1;
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
        return redirect('panel/empresa')->with('success', "Empresa Editada com sucesso!");

    }

    public function delete_empresa($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/empresa')->with('success', "Empresa Apagada com sucesso!");
    }
}
