@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Professor</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/teacher')}}" class="fa fa-arrow-circle-o-left"></a>Cadastrar Professor</h2>
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
                            <h3 class="panel-title"><strong>Cadastrar</strong> Professor</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Nome Escola</label>
                                <div class="col-md-6 col-xs-12">
                                    
                                        <span class="input-group-addon">
                                            <span id="statusIconUser" class="fa fa-male"></span>
                                        </span>
                                        <select class="form-control" name="school_id" id="statusSelectUser">
                                            <option value="">Selecionar</option>
                                            @foreach ($getSchool as $school)
                                                <option value="{{$school->id}}">{{$school->name}}</option>
                                            @endforeach 
                                        </select>     
                                        
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name" required value="{{old('name')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('name')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Apelido<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="last_name" required value="{{old('last_name')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('name')}}</div>
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Gênero</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span id="statusIconUser" class="fa fa-male"></span>
                                        </span>
                                        <select class="form-control" name="gender" id="statusSelectUser">
                                            <option value="Masculino">Masculino</option>    
                                            <option value="Feminino">Feminino</option>    
                                        </select>     
                                    </div>       
                                </div>
                            </div>
                            
                            <script>
                                document.getElementById("statusSelectUser").addEventListener("change", function() {
                                    const icon = document.getElementById("statusIconUser");
                                    if (this.value === "1") {
                                        icon.className = "fa fa-male"; // Ícone de homem
                                    } else {
                                        icon.className = "fa fa-female"; // Ícone de mulher
                                    }
                                });
                            </script>
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Data Nasc<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="">🥳</span></span>
                                        <input id="" type="date" name="birth" required value="{{old('birth')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('birth')}}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Data adesão<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="date" name="date_joining" required value="{{old('date_joining')}}" class="form-control"/>
                                        </div>                                            
                                  <div class="required">{{$errors->first('date_joining')}}</div>
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
                                <label class="col-md-3 col-xs-12 control-label">Estado Civil</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span id="statusIconM" class="fa fa-user"></span>
                                        </span>
                                        <select class="form-control" name="marital_status" id="statusSelectM">
                                            <option value="Solteiro(a)">Solteiro(a)</option>    
                                            <option value="Casado(a)">Casado(a)</option>    
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viúvo(a)">Viúvo(a)</option>
                                        </select>     
                                    </div>       
                                </div>
                            </div>
                            
                            <script>
                                document.getElementById("statusSelectM").addEventListener("change", function() {
                                    const icon = document.getElementById("statusIconM");
                            
                                    switch (this.value) {
                                        case "Solteiro(a)":
                                            icon.className = "fa fa-user"; // Ícone padrão para solteiro
                                            break;
                                        case "Casado(a)":
                                            icon.className = "fa fa-users"; // Ícone de casal para casado
                                            break;
                                        case "Divorciado(a)":
                                            icon.className = "fa fa-user-times"; // Ícone de separação para divorciado
                                            break;
                                        case "Viúvo(a)":
                                            icon.className = "fa fa-user-minus"; // Ícone de perda para viúvo
                                            break;
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
                                <label class="col-md-3 col-xs-12 control-label">Endereço Permanente</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="current_address" required value="{{old('current_address')}}" class="form-control"/>
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
                                <label class="col-md-3 col-xs-12 control-label">Exp. Trabalho</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="work_experience" required value="{{old('work_experience')}}" class="form-control"/>
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
                                <label class="col-md-3 col-xs-12 control-label">Estado</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span id="statusIcon" class="fa fa-circle text-success"></span>
                                        </span>
                                        <select class="form-control" name="status" id="statusSelect">
                                            <option value="1">Ativo</option>    
                                            <option value="0">Inativo</option>    
                                        </select>     
                                    </div>       
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

                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Nota<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <textarea class="form-control" name="note" id="" cols="30" rows="10" placeholder="Informações adicionais"></textarea>
                                    </div>            
                                    
                                </div>
                            </div>
                            

                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/teacher/create')}}" class="btn btn-default">Limpar infs</a>                                    
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