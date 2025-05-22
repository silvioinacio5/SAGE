<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\VagaModel;

class AuthController extends Controller
{
    public function register_empresa(){
        /*echo Hash::make(5555);
        die;
        */
        return view('auth.company_register');
    }

    public function register_candidato(){
        /*echo Hash::make(5555);
        die;
        */
        $data['getUser'] = User::all();
        return view('auth.candidato_register', $data);
    }

    public function login(){
        /*echo Hash::make(5555);
        die;
        */
        return view('auth.login');
    }

    public function index(){
        $data['getRecord'] = VagaModel::all()->where('tipo', '=', 0);
        $data['meta_title'] = "Cadastrar";
        return view('index', $data);
    }

    public function insert_empresa(Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->address = trim($request->address);
        $user->descricao = trim($request->descricao);
        $user->website = trim($request->website);
        $user->nif = trim($request->nif);
        $user->industria = trim($request->industria);
        $user->phone = trim($request->phone);
        $user->status = 1;
        $user->is_admin = 2;
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
        return redirect('/')->with('success', "Empresa criada com sucesso!");

    }

    public function insert_candidato(Request $request){
        //dd($request->all());
        request()->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->gender = trim($request->gender);
        $user->phone = trim($request->phone);
        $user->password = Hash::make($request->password);
        $user->education_level = trim($request->education_level);
        $user->address = trim($request->address);
        $user->status = 1;
        $user->is_admin = 3;
        $user->save();
        
        if(!empty($request->file('cv'))){

            $ext = $request->file('cv')->getClientOriginalExtension();
            $file = $request->file('cv');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->cv = $filename;
            $user->save();
        }

        if(!empty($request->file('profile_pic'))){

            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }
        return redirect('/')->with('success', "Candidato criado com sucesso!");

    }


    public function auth_login(Request $request){
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' =>$request->password, 'is_delete' => 0], true)){
            return redirect('panel/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', "Inserir credenciais válidas");
        }
    }

    public function forgot(){
        return view('auth.forgot');
    }
    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
}
