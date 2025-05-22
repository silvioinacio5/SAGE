<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClasseModel;
use Illuminate\Support\Facades\Auth;


class ClasseController extends Controller
{
    public function class_list(){
        $data['getRecord'] = ClasseModel::getRecord(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Turma";
        //$user = User::all();
        return view('backend.classe.list', $data);
    }
    public function create_class(){
        $data['meta_title'] = "Cadastrar Turma";
        return view('backend.classe.create', $data);
    }
    public function insert_class(Request $request){
        //dd($request->all());
        

        $save = new ClasseModel();
        $save->name = trim($request->name);
        $save->created_by_id = Auth::user()->id;
        $save->save();
        return redirect('panel/vagaes')->with('success', "Classe criada com sucesso!");

    }
    public function edit_class($id){
        $data['getRecord'] = ClasseModel::getSingle($id);
        $data['meta_title'] = "Editar Classe";
        return view('backend.classe.edit', $data);
    }

    public function update_class($id, Request $request){
        //dd($request->all());
       
        $save = ClasseModel::getSingle($id);
        $save->name = trim($request->name);
        $save->save();
        return redirect('panel/vagaes')->with('success', "Classe Editada com sucesso!");

    }

    public function delete_class($id){
        $user = ClasseModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/vagaes')->with('success', "Classe Apagada com sucesso!");
    }
}
