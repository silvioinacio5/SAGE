<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CandidatoController extends Controller
{
    public function candidato_list(){
        $data['getCandidato'] = User::getCandidato(Auth::user()->id, Auth::user()->is_admin) ;
        $data['meta_title'] = "Candidato";
        //$user = User::all();
        return view('backend.candidatos.list', $data);
    }
    public function create_candidato(){
        $data['getSchool'] = User::getSchoolAll();
        $data['meta_title'] = "Cadastrar Candidato";
        return view('backend.candidatos.create', $data);
    }
    
    public function insert_candidato(Request $request)
{
    
    request()->validate([
        'email' => 'required|email|unique:users',
    ]);

    $candidato = new User;
    $candidato->name = trim($request->name);

    $candidato->email = trim($request->email);
    $candidato->password = Hash::make($request->password);

    $candidato->address = trim($request->address);


    $candidato->status = trim($request->status);

    $candidato->gender = trim($request->gender);


    $candidato->phone = trim($request->phone);

    $candidato->created_by_id = Auth::user()->id;
    $candidato->save();

    if(!empty($request->file('cv'))){

        $ext = $request->file('cv')->getClientOriginalExtension();
        $file = $request->file('cv');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);

        $candidato->cv = $filename;
        $candidato->save();
    }

    if (!empty($request->file('profile_pic'))) {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis') . Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/profile/', $filename);

        $candidato->profile_pic = $filename;
        $candidato->save();
    }

    return redirect('panel/candidato')->with('success', "Candidato cadastrado com sucesso!");
}

public function update_candidato($id, Request $request)
    {
    
    $request->validate([
        'email' => 'required|email|unique:users,email,'.$id,
    ]);

    $candidato = User::getSingle($id);
    $candidato->name = trim($request->name);

    $candidato->email = trim($request->email);
    if(!empty($request->password))
        {
            $candidato->password = Hash::make($request->password);
        }

    $candidato->address = trim($request->address);


    $candidato->gender = trim($request->gender);

    $candidato->phone = trim($request->phone);


    if(!empty($request->file('cv'))){

        $ext = $request->file('cv')->getClientOriginalExtension();
        $file = $request->file('cv');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);

        $candidato->cv = $filename;
        $candidato->save();
    }

    if(!empty($request->file('profile_pic'))){

        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);
        $candidato->profile_pic = $filename;
    }

    $candidato->save();

    return redirect('panel/candidato')->with('success', "Candidato Editado com sucesso!");
}

public function edit_candidato($id){
    $data['getAdmin'] = User::getAdmin();
    $data['getCandidato'] = User::getSingle($id);
    $data['meta_title'] = "Editar Candidato(a)";
    return view('backend.candidatos.edit', $data);
}

public function delete_candidato($id){
    $user = User::getSingle($id);
    $user->is_delete = 1;
    $user->save();
    return redirect('panel/candidato')->with('success', "Candidato(a) Apagado com sucesso!");
}
    
}