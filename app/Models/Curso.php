<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = ['name', 'status', 'created_by_id'];

    static public function getSingle($id) {
        return Curso::find($id);
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

    static public function getCursoAll($value=''){

        return self::select('*')
            ->where('is_delete', '=', 0)
            ->where('status', '=', 1)
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
            ->paginate(4);
            return $return;
    }



}
