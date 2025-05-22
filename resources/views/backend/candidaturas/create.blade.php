@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Candidaturas</li>
        <li class="active">Candidatar-se</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/candidatura')}}" class="fa fa-arrow-circle-o-left"></a>Candidatar-se</h2>
    </div>
    <!-- END PAGE TITLE -->                
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                        @csrf
                    <form class="form-horizontal" action="{{ route('candidatar') }}" method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Candidatar-se à</strong> Vaga</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Título<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <p id="" type="" name="titulo" value="" class="form-control">{{old('titulo')}}</p>
                                        </div>                                            
                                  <div class="required">{{$errors->first('titulo')}}</div>
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
                                        <input type="date" name="ready" class="form-control"/>
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