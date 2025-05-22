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
        <h2><a href="{{url('http://localhost/SAGE/panel/candidato')}}" class="fa fa-arrow-circle-o-left"></a>Editar Candidato</h2>
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
                            <h3 class="panel-title"><strong>Editar</strong> Candidato</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name"  value="{{old('name', $getCandidato->name)}}" class="form-control"/>
                                        </div>                                            
                                  <div class="">{{$errors->first('name')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Telefone</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phoneNumber" value="{{old('name', $getCandidato->phone)}}" name="phone" placeholder="Digite seu número" maxlength="9">
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
                                <label class="col-md-3 col-xs-12 control-label">Gênero</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="gender"  value="{{old('gender', $getCandidato->gender)}}" class="form-control"/>
                                    </div>            
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Endereço</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="address"  value="{{old('address', $getCandidato->address)}}" class="form-control"/>
                                    </div>            
                                </div>
                            </div>
    

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Foto Perfil</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="file" name="profile_pic" class="form-control"/>
                                                @if(!empty($getCandidato->getProfile()))
                                                    <img src="{{$getCandidato->getProfile()}}" style="width: 50px; height:50px; border-radius:50px;" alt="">
                                                @endif
                                    </div>                                            
                                 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" name="email"  value="{{old('email', $getCandidato->email)}}" class="form-control"/>
                                    </div>                                            
                                    <div class="">{{$errors->first('email')}}</div>
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
                            

                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/candidato/edit')}}" class="btn btn-default">Limpar infs</a>                                    
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