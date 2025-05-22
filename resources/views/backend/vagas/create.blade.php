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
        <h2><a href="{{url('http://localhost/SAGE/panel/vaga')}}" class="fa fa-arrow-circle-o-left"></a>Publicar Vaga</h2>
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
                            <h3 class="panel-title"><strong>Cadastrar</strong> Vaga</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">    
                                                                                                
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Título<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="titulo" required value="{{old('titulo')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('titulo')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nível<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="nivel" required value="{{old('nivel')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('nivel')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Requisitos<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="requisito" required value="{{old('requisito')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('requisito')}}</div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Local<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="local" required value="{{old('local')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('local')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Salário<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="salario" placeholder="Kz" required value="{{old('salario')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('salario')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Modalidade<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="modalidade" required value="{{old('modalidade')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('modalidade')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Válido até<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="date" name="data_expire" required value="{{old('data_expire')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('data_expire')}}</div>
                                </div>
                            </div>
                            
                            <script>
                                document.getElementById("statusSelect").addEventListener("change", function() {
                                    const icon = document.getElementById("statusIcon");
                                    if (this.value === "1") {
                                        icon.className = "fa fa-circle text-success"; // Ícone verde para Ativo
                                    } else {
                                        icon.className = "fa fa-circle text-danger"; // Ícone vermelho para Inativo
                                    }
                                });
                            </script>
                            
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/vaga/create')}}" class="btn btn-default">Limpar infs</a>                                    
                            <button class="btn btn-primary pull-right">Enviar</button>
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