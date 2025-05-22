<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VagaModel extends Model
{
    protected $table = 'vagaas';
    protected $fillable = ['titulo', 'id', 'created_by_id', 'user_id'];

    static public function getSingle($id) {
        return VagaModel::find($id);
    }

    static public function getRecord($user_id, $is_admin)
{
    $return = self::select('*');

    if (!empty(Request::get('id'))) {
        $return = $return->where('id', '=', Request::get('id'));
    }

    if (!empty(Request::get('titulo'))) {
        $return = $return->where('titulo', 'like', '%' . Request::get('titulo') . '%');
    }

    if (!empty(Request::get('status'))) {
        $status = Request::get('status');
        if ($status == 100) {
            $status = 0;
        }
        $return = $return->where('status', '=', $status);
    }

    // Filtro: se não for admin nível 3, mostra apenas as vagas criadas por ele
    if ($is_admin != 3 && $is_admin != 1) {
        $return = $return->where('created_by_id', '=', $user_id);
    }

    $return = $return->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(4);

    return $return;
}


    public function creator()
    {
        //relação entre as table para mostrar o nome do user q criou na tabela do criado
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    


}
