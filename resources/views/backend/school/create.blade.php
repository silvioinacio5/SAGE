@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Escola</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{url('http://localhost/SAGE/panel/school')}}" class="fa fa-arrow-circle-o-left"></a>Criar Escola</h2>
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
                            <h3 class="panel-title"><strong>Criar</strong> Escola</h3>
                            
                        </div>
                        <span><strong style="color: red">*</strong>Indicação de Campos obrigatórios</span>
                        <div class="panel-body">                                                                        
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Nome Escola<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input id="" type="text" name="name" class="form-control"/>
                                        </div>                                            
                                  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Foto Perfil</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="file" name="profile_pic" class="form-control"/>
                                    </div>                                            
                                 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Email<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" name="email" class="form-control"/>
                                    </div>                                            
                                  
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Password<strong style="color: red">*</strong></label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                        <input type="password" name="password" class="form-control"/>
                                    </div>            
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">                                        
                                <label class="col-md-3 col-xs-12 control-label">Endereço</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <input type="text" name="address" class="form-control"/>
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
                            

                        </div>
                        <div class="panel-footer">
                            <a href="{{url('http://localhost/SAGE/panel/school/create')}}" class="btn btn-default">Limpar infs</a>                                    
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