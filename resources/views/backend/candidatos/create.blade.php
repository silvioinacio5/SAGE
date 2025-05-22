@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Candidato</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/candidato')}}" class="fa fa-arrow-circle-o-left"></a>Cadastrar Candidato</h2>
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
                            <h3 class="panel-title"><strong>Cadastrar</strong> Candidato</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">             
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome Completo<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name" required value="{{old('name')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('name')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" name="email" required value="{{old('email')}}" class="form-control"/>
                                    </div>                                            
                                    <div class="required">{{$errors->first('email')}}</div>
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Password<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" name="password" required class="form-control"/>
                                    </div>            
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Telefone</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Digite seu número" maxlength="9">
                                    </div>
                                    <small class="text-danger" id="error-message" style="display: none;">Número inválido!</small>
                                </div>
                            </div>
                            
                            <script>
                                document.getElementById("phoneNumber").addEventListener("input", function() {
                                    const phoneInput = this;
                                    const errorMessage = document.getElementById("error-message");
                            
                                    // Remove caracteres não numéricos
                                    phoneInput.value = phoneInput.value.replace(/\D/g, '');
                            
                                    // Verifica se começa com "9" e tem no máximo 9 dígitos
                                    if (!/^9\d{0,8}$/.test(phoneInput.value)) {
                                        errorMessage.style.display = "block"; // Mostra a mensagem de erro
                                    } else {
                                        errorMessage.style.display = "none"; // Esconde a mensagem de erro
                                    }
                                });
                            </script>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Endereço Atual</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="address" required value="{{old('address')}}" class="form-control"/>
                                    </div>            
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Qualificações</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" name="qualification" required value="{{old('qualification')}}" class="form-control"/>
                                    </div>            
                                </div>
                            </div>                            

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Foto Perfil</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="file" name="profile_pic" required class="form-control"/>
                                    </div>                                            
                                 
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/candidato/create')}}" class="btn btn-default">Limpar infs</a>                                    
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