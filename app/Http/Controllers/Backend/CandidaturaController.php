<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidatura;
use App\Models\VagaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CandidaturaController extends Controller
{
    public function candidatura_list(){
        $data['getCandidatura'] = Candidatura::all()
        ->where('user_id', '=', Auth::user()->id);
        //->where($vaga_id->created_by_id, '=', Auth::user()->id);
        $data['meta_title'] = "Candidatura";
        return view('backend.candidaturas.list', $data);
    }
    public function create_candidatura($id)
    {
        $data['getCandidatura'] = Candidatura::getCandidatura($id);
        $data['vagas'] = VagaModel::all();
        $data['meta_title'] = "Candidatar-se";
        return view('backend.candidaturas.create', $data);
    }
    public function insert_candidatura(Request $request)
{
    if (Auth::user()->is_admin == 3) {
        $request->validate([
            'vaga_id' => 'required|integer|exists:vagas,id',
            'sms' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'status' => 'required|string',
            'ready' => 'required|boolean',
        ]);

        // Verificar se já existe candidatura
        $existe = Candidatura::where('vaga_id', $request->vaga_id)
                             ->where('user_id', Auth::id())
                             ->exists();

        if ($existe) {
            return redirect()->back()->with('error', 'Você já se candidatou a esta vaga.');
        }

        $candidatura = new Candidatura();
        $candidatura->vaga_id = $request->vaga_id;
        $candidatura->user_id = Auth::id();
        $candidatura->sms = $request->sms ?? '';

        if ($request->hasFile('cv')) {
            $ext = $request->file('cv')->getClientOriginalExtension();
            $filename = strtolower(date('YmdHis') . Str::random(20)) . '.' . $ext;
            $request->file('cv')->move(public_path('upload/profile'), $filename);
            $candidatura->cv = $filename;
        }

        $candidatura->status = $request->status;
        $candidatura->ready = $request->ready;
        $candidatura->is_delete = 0;

        $candidatura->save();

        return redirect('panel/candidatura')->with('success', 'Candidatura efetuada com sucesso!');
    }

    return redirect()->back()->with('error', 'Ação não permitida.');
}


    public function edit_candidatura($id){
        $data['getCandidato'] = User::getCv();
        $data['getCandidatura'] = Candidatura::getSingle($id);
        $data['vagas'] = VagaModel::all();
        $data['meta_title'] = "Editar candidatura";
        return view('backend.candidaturas.edit', $data);
    }

    public function update_candidatura($id, Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $candidatura = Candidatura::getSingle($id);
        $candidatura->vaga_id = trim($request->vaga_id);
        $candidatura->user_id = Auth::user()->id;
        $candidatura->status = trim($request->status);
        $candidatura->cv = trim($request->cv);
        $candidatura->save();
        
        return redirect('panel/candidatura')->with('success', "Candidatura Editada com sucesso!");

    }

    public function delete_candidatura($id){
        $candidatura = Candidatura::getSingle($id);
        $candidatura->is_delete = 1;
        $candidatura->save();
        return redirect('panel/candidatura')->with('success', "Candidatura Apagada com sucesso!");
    }

    //estados das candidaturas
    public function negada($id)
    {
        $candidatura = Candidatura::find($id);
        $candidatura->status = 'Negada';
        $candidatura->save();
        return redirect()->back()->with('success', 'Candidatura Negada');
    }

    public function aceite($id)
    {
        $candidatura = Candidatura::find($id);
        $candidatura->status = 'Aprovada';
        $candidatura->save();
        return redirect()->back()->with('success', 'Candidatura Aprovada');
    }
    public function pendente($id)
    {
        $candidatura = Candidatura::find($id);
        $candidatura->status = 'Em análise';
        $candidatura->save();
        return redirect()->back()->with('success', 'Candidatura Em análise');
    }

}