@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Turma</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/class')}}" class="fa fa-arrow-circle-o-left"></a>Editar Turma</h2>
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
                            <h3 class="panel-title"><strong>Editar</strong> Turma</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name" value="{{old('name', $getRecord->name)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('name')}}</div>
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
                                            <option {{($getRecord->status == 1) ? 'selected' : ''}} value="1">Ativo</option>    
                                            <option {{($getRecord->status == 0) ? 'selected' : ''}} value="0">Inativo</option>    
                                        </select>     
                                    </div>       
                                </div>
                            </div> 
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/class/edit/'.$getRecord->id)}}" class="btn btn-default">Limpar infs</a>                                    
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