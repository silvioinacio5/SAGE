<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{url('public/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <a href="{{url('/home')}}"><h2 style="color: white; text-align:center;">OPPORTUNE</h2></a>
                <div class="login-body">
                    <div class="login-title"><strong>Entrar</strong> na Conta</div>
                    @php
                    #    $senha = '5555';
                    #    $hash = password_hash($senha, PASSWORD_BCRYPT);
                    #    echo $hash;
                    @endphp
                    

                    <form action="" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        @include('message')
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email" required placeholder="E-mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" required placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="{{url('forgot')}}" class="btn btn-link btn-block">Recuperar senha?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Entrar</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; {{date('Y')}} SAGE
                    </div>
                    </div>
            </div>
            
        </div>
        
    </body>
</html>






