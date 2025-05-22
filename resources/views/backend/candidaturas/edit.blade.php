@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Candidatura</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/candidatura')}}" class="fa fa-arrow-circle-o-left"></a>Editar Candidatura</h2>
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
                            <h3 class="panel-title"><strong>Editar</strong> Candidatura</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Vaga</label>
                                <div class="col-md-6 col-xs-12">
                                    
                                        <select class="form-control" name="vaga_id" id="">
                                            <option value="">Selecionar</option>
                                            @foreach ($vagas as $vaga)
                                                <option value="{{$vaga->id}}"><strong>Título:</strong>{{$vaga->titulo}} <br><strong>Empresa:</strong>{{ $vaga->creator->name ?? 'Desconhecido' }}</option>
                                            @endforeach 
                                        </select>     
                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mensagem<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <textarea id="" type="text" name="sms" required value="{{old('sms')}}" class="form-control"></textarea>
                                        </div>                                            
                                  <div class="required">{{$errors->first('sms')}}</div>
                                </div>
                            </div>
                            <p hidden> Quero q receba o cv armazenado na tabela users, e pergunte apenas se o usuário gostaria de trocar de cv</p>
    
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Currículum Vitae</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="file" name="profile_pic" class="form-control"/>
                                                @if(!empty($getCandidato->getCv()))
                                                    <img src="{{$getCandidato->getCv()}}" alt="meu cv">
                                                @endif
                                    </div>                                            
                                 
                                </div>
                            </div>         
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/candidatura/edit'.$getCandidatura->id)}}" class="btn btn-default">Limpar infs</a>                                    
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