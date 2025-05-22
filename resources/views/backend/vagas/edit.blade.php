@extends('backend.layouts.app')
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Vaga</li>
    </ul>
    <!-- END BREADCRUMB -->
    <!-- PAGE TITLE -->
    <div class="page-title"> 
        @if(Auth::user()->is_admin == 3)
        <h2><a href="{{url('http://localhost/SAGE/panel/vaga')}}" class="fa fa-arrow-circle-o-left"></a>Candidatar-se à Vaga</h2>
        @else
        <h2><a href="{{url('http://localhost/SAGE/panel/vaga')}}" class="fa fa-arrow-circle-o-left"></a>Editar Vaga</h2>
        @endif                 
    </div>
    <!-- END PAGE TITLE -->                
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="page-content-wrap">      
            <div class="row">
                <div class="col-md-12">      
                    @if(Auth::user()->is_admin == 2 || Auth::user()->is_admin == 1)
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Editar</strong> Vaga</h3>   
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body"> 
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Título<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="titulo" value="{{old('titulo', $getRecord->titulo)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('titulo')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nível<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="nivel" value="{{old('nivel', $getRecord->nivel)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('nivel')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Salário<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="salario" value="{{old('salario', $getRecord->salario)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('salario')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Requisitos<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="requisito" value="{{old('requisito', $getRecord->requisito)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('requisito')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Modalidade<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="modalidade" value="{{old('modalidade', $getRecord->modalidade)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('modalidade')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Válido até<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="data_expire" value="{{old('data_expire', $getRecord->data_expire)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('data_expire')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Local<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="local" value="{{old('local', $getRecord->local)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('local')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/vaga/edit/'.$getRecord->id)}}" class="btn btn-default">Limpar infs</a>                                    
                            <button class="btn btn-primary pull-right">Atualizar</button>
                        </div>
                    </div>
                    </form>
                    @elseif(Auth::user()->is_admin == 3 || Auth::user()->is_admin == 1)
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Candidatar-se à</strong> Vaga</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Vaga para<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="vaga_id" value="{{old('vaga_id', $getRecord->id)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('vaga_id')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mensagem<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="sms" value="{{old('sms', $getRecord->sms)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('sms')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Currículum Vitae<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="file" name="cv" value="{{old('cv', $getRecord->cv)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('cv')}}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Disponível em<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="date" name="ready" value="{{old('ready', $getRecord->ready)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('ready')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/vaga/edit/'.$getRecord->id)}}" class="btn btn-default">Limpar infs</a>                                    
                            <button class="btn btn-primary pull-right">Enviar Candidatura</button>
                        </div>
                    </div>
                    </form>
                    @endif
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