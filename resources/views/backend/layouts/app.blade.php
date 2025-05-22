<!DOCTYPE html>
<html lang="PT-PT">
    <head>        
        <!-- META SECTION -->
        <title>{{!empty($meta_title)? $meta_title:'' }} - {{config('app.name')}}</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{url('public/favicon.ico')}}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{url('public/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE --> 
        <!-- Adicione no <head> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                      
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            @include('backend.layouts.sidebar')
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                @include('backend.layouts.header')
                
                @yield('content')
                
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{url('logout')}}" class="btn btn-success btn-lg mb-control-yes">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->        
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Sair <strong></strong> ?</div>
                    <div class="mb-content">
                        <p>Tem certeza que quer sair?</p>                    
                        <p>Clique Não se quer continuar no SAGE. Clique Sim para sair do SAGE.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{url('logout')}}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{url('public/audio/alert.opus')}}" preload="auto"></audio>
        <audio id="audio-fail" src="{{url('public/audio/fail.mp3')}}" preload="auto"></audio>
        <!-- END PRELOADS -->                      

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{url('public/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->
        <script type="text/javascript" src="{{url('public/js/settings.js')}}"></script>

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{url('public/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        {{--<!--script type="text/javascript" src="{{url('public/js/settings.js')}}"></script>--}}
        
        <script type="text/javascript" src="{{url('public/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{url('public/js/actions.js')}}"></script>        
        <!-- END TEMPLATE -->
        @yield('script')                 
    </body>
</html>






