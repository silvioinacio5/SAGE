<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use Illuminate\Http\Request;
use App\Models\VagaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class VagaController extends Controller
{
    public function vaga_list(){
        $data['getRecord'] = VagaModel::getRecord(Auth::user()->id, Auth::user()->is_admin);
        $data['meta_title'] = "Vaga";
        //$user = User::all();
        return view('backend.vagas.list', $data);
    }
    public function create_vaga(){
        $data['meta_title'] = "Publicar vaga";
        return view('backend.vagas.create', $data);
    }
    public function insert_vaga(Request $request){
        //dd($request->all());
        $data['getRecord'] = VagaModel::getRecord(Auth::user()->id, Auth::user()->is_admin);

        $save = new VagaModel();
        $save->titulo = trim($request->titulo);
        $save->salario = trim($request->salario);
        $save->local = trim($request->local);
        $save->nivel = trim($request->nivel);
        $save->modalidade = trim($request->modalidade);
        $save->data_expire = trim($request->data_expire);
        $save->requisito = trim($request->requisito);
        $save->created_by_id = Auth::user()->id;
        $save->user_id = Auth::user()->id;
        $save->save();
        return redirect('panel/vaga')->with('success', "Vaga publicada com sucesso!");

    }
    public function edit_vaga($id){
        $data['getRecord'] = VagaModel::getSingle($id);
        $data['meta_title'] = "Editar Vaga";
        return view('backend.vagas.edit', $data);
    }

    public function update_vaga($id, Request $request){
       
        $save = VagaModel::getSingle($id);
        $save->titulo = trim($request->titulo);
        $save->salario = trim($request->salario);
        $save->local = trim($request->local);
        $save->nivel = trim($request->nivel);
        $save->modalidade = trim($request->modalidade);
        $save->data_expire = trim($request->data_expire);
        $save->requisito = trim($request->requisito);
        $save->save();

        return redirect('panel/vaga')->with('success', "Vaga Editada com sucesso!"); 

    }

    public function delete_vaga($id){
        $user = VagaModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('panel/vaga')->with('success', "Vaga Apagada com sucesso!");
    }

    public function enviar_candidatura(Request $request){
    $vaga = VagaModel::findOrFail($request->vaga_id);
    $empresaEmail =$vaga->empresa->email ?? 'empresa@exemplo.com'; // Ajuste conforme seu relacionamento

    $cv = Auth::user()->cv;

    if ($request->hasFile('cv_novo')) {
        $file =$request->file('cv_novo');
        $cv = time() . '_' .$file->getClientOriginalName();
        $file->move(public_path('upload/cv'),$cv);
    }

    return redirect()->back()->with('success', 'Candidatura enviada com sucesso!');
    }

}