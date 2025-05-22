<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class Candidatura extends Model
{
    protected $table = 'candidaturas';
    protected $fillable = ['name', 'status', 'created_by_id'];

    static public function getSingle($id) {
        return Candidatura::find($id);
    }

    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }

    static public function getCandidatura($value=''){

        return self::select('*')
            ->where('is_delete', '=', 0)
            
            ->orderBy('id', 'desc')
            ->get();
            
    }

    static public function getRecord($user_id, $user_type)
    {

        $return = self::select('*');
        if(!empty(Request::get('id'))){
            $return = $return->where('id', '=', Request::get('id'));
        }
        if(!empty(Request::get('name'))){
            $return = $return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('status')))
        {
        $status = Request::get('status');
        if($status == 100)
        {
            $status = 0;
        }
        $return = $return->where('status', '=', $status);
        }
        $return = $return->where('created_by_id', '=', $user_id);

        $return = $return->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
            return $return;
    }

    public function creator()
    {
        //relação entre as table para mostrar o nome do user q criou na tabela do criado
        return $this->belongsTo(VagaModel::class, 'created_by_id');
        
    }
    public function user()
    {
        //relação entre as table para mostrar o nome do user q criou na tabela do criado
        return $this->belongsTo(User::class, 'user_id');
        
    }

}
