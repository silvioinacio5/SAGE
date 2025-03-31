<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;


class ClassController extends Controller
{
    public function class_list(){
        $data['getRecord'] = ClassModel::getRecord(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Turma";
        //$user = User::all();
        return view('backend.class.list', $data);
    }
    public function create_class(){
        $data['meta_title'] = "Cadastrar Turma";
        return view('backend.class.create', $data);
    }
    public function insert_class(Request $request){
        //dd($request->all());
        

        $save = new ClassModel();
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->created_by_id = Auth::user()->id;
        $save->save();
        return redirect('panel/class')->with('success', "Turma criada com sucesso!");

    }
    public function edit_class($id){
        $data['getRecord'] = ClassModel::getSingle($id);
        $data['meta_title'] = "Editar Turma";
        return view('backend.class.edit', $data);
    }

    public function update_class($id, Request $request){
        //dd($request->all());
       
        $save = ClassModel::getSingle($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->save();
        return redirect('panel/class')->with('success', "Turma Editada com sucesso!");

    }

    public function delete_class($id){
        $user = ClassModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/class')->with('success', "Turma Apagada com sucesso!");
    }
}
