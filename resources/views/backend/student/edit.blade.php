@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Admin</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/admin')}}" class="fa fa-arrow-circle-o-left"></a>Editar Admin</h2>
    </div>
    <!-- END PAGE TITLE -->                
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">


        <div class="page-content-wrap">
                
            <div class="row">
                <div class="col-md-12">
                    
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Editar</strong> Admin</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome Admin<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name" value="{{old('name', $getAdmin->name)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('name')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Foto Perfil</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="file" name="profile_pic" class="form-control"/>
                                                @if(!empty($getAdmin->getProfile()))
                                                    <img src="{{$getAdmin->getProfile()}}" style="width: 50px; height:50px; border-radius:50px;" alt="">
                                                @endif
                                    </div>                                            
                                 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" name="email" value="{{old('email', $getAdmin->email)}}" class="form-control"/>
                                    </div>                                            
                                    <div class="required">{{$errors->first('email')}}</div>
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Password</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" name="password" class="form-control"/>
                                        (Digite se quer trocar, caso contrário deixa em branco!)
                                    </div>            
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Endereço</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="address" required value="{{old('address', $getAdmin->address)}}" class="form-control"/>
                                    </div>            
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Estado</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span id="statusIcon" class="fa fa-circle text-success"></span>
                                        </span>
                                        <select class="form-control" name="status" id="statusSelect">
                                            <option {{($getAdmin->status == 1) ? 'selected' : ''}} value="1">Ativo</option>    
                                            <option {{($getAdmin->status == 0) ? 'selected' : ''}} value="0">Inativo</option>    
                                        </select>     
                                    </div>       
                                </div>
                            </div> 
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Papel</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span id="statusIcon" class="fa fa-circle text-success"></span>
                                        </span>
                                        <select class="form-control" name="is_admin" id="">
                                            <option {{($getAdmin->is_admin == 1) ? 'selected' : ''}} value="1">Super Admin</option>    
                                            <option {{($getAdmin->status == 2) ? 'selected' : ''}} value="2">Admin</option>    
                                        </select>     
                                    </div>       
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/admin/edit'.$getAdmin->id)}}" class="btn btn-default">Limpar infs</a>                                    
                            <button class="btn btn-primary pull-right">Atualizar</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>                    
            
        </div>
        
    <!-- END PAGE CONTENT WRAPPER -->                                    
    </div> 
    <!-- END PAGE CONTENT WRAPPER -->                                    
    </div>         
</div>   
@endsection
@section('script')

@endsection        