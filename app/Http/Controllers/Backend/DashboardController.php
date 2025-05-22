<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use App\Models\User;
use App\Models\VagaModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['meta_title'] = "Dashboard";
        $data['candidato'] = User::where('is_admin', 3)->count();
        $data['empresa'] = User::where('is_admin', 2)->count();
        $data['vaga'] = VagaModel::where('is_delete', 0)->count();
        $data['candidatura'] = Candidatura::where('is_delete', 0)->count();
        return view('backend.dashboard', $data);
    }
}
