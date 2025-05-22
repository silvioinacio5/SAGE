<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    @if (!empty(Auth::user()))
        
    <ul class="x-navigation">
        <li class="">
            <a href="{{url('panel/dashboard')}}" style="font-size: 20px; text-align:center;">
                {{config('app.name')}}
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{ Auth::user()->profile_pic ? url('upload/profile/' . Auth::user()->profile_pic) : url('public/assets/images/users/perfil.jpg') }}" alt="{{Auth::user()->name}}"/>

            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{ Auth::user()->profile_pic ? url('upload/profile/' . Auth::user()->profile_pic) : url('public/assets/images/users/perfil.jpg') }}" alt="{{Auth::user()->name}}"/>

                </div>
                
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->name}}</div>
                    <div class="profile-data-title">
                    @if (Auth::user()->is_admin == 3)
                        Candidato
                    @elseif (Auth::user()->is_admin == 1)
                        Administrador
                        @elseif (Auth::user()->is_admin == 2)
                        Empresa        
                    @endif
                </div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
        </li>
                            
        <li class="{{(Request::segment(2)== 'dashboard')? 'active':''}}">
            <a href="{{url('panel/dashboard')}}"><span class="fa fa-desktop"></span><span class="xn-text">Dashboard</span></a>
        </li>

        @if (Auth::user()->is_admin == 1)
        
            <div class="title">
            </div>
            <li class="{{(Request::segment(2)== 'admin')? 'active':''}}">
                <a href="{{url('panel/admin/edit/1')}}"><span class="fa fa-user"></span><span class="xn-text">Perfil Admin</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'empresa')? 'active':''}}">
                <a href="{{url('panel/empresa')}}"><span class="fa fa-user"></span><span class="xn-text">Empresas</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'candidatura')? 'active':''}}">
                <a href="{{url('panel/candidatura')}}"><span class="fa fa-user"></span><span class="xn-text">Candidaturas</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'candidato')? 'active':''}}">
                <a href="{{url('panel/candidato')}}"><span class="fa fa-user"></span><span class="xn-text">Candidatos</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'vaga')? 'active':''}}">
                <a href="{{url('panel/vaga')}}"><span class="fa fa-user"></span><span class="xn-text">Vagas</span></a>
            </li>

        @endif
        
        @if (Auth::user()->is_admin == 2)

            <li class="{{(Request::segment(2)== 'empresa')? 'active':''}}">
                <a href="{{url('panel/empresa/edit/3')}}"><span class="fa fa-user"></span><span class="xn-text">Perfil </span></a>
            </li>

            <li class="{{(Request::segment(2)== 'vaga')? 'active':''}}">
                <a href="{{url('panel/vaga')}}"><span class="fa fa-user"></span><span class="xn-text">Vagas</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'class')? 'active':''}}">
                <a href="{{url('panel/vaga')}}"><span class="fa fa-user"></span><span class="xn-text">Exames</span></a>
            </li>

            <li class="{{(Request::segment(2)== 'candidatura')? 'active':''}}">
                <a href="{{url('panel/candidatura')}}"><span class="fa fa-user"></span><span class="xn-text">Candidaturas</span></a>
            </li>
            
        @endif
        @if (Auth::user()->is_admin == 3)

        <li class="{{(Request::segment(2)== 'candidato')? 'active':''}}">
            <a href="{{url('panel/candidato/edit/2')}}"><span class="fa fa-user"></span><span class="xn-text">Perfil </span></a>
        </li>
             
        <li class="{{(Request::segment(2)== 'vaga')? 'active':''}}">
            <a href="{{url('panel/vaga')}}"><span class="fa fa-user"></span><span class="xn-text">Vagas</span></a>
        </li>

        <li class="{{(Request::segment(2)== 'candidatura')? 'active':''}}">
            <a href="{{url('panel/candidatura')}}"><span class="fa fa-user"></span><span class="xn-text">Candidaturas</span></a>
        </li>

        @endif

    </ul>

    @endif
    <!-- END X-NAVIGATION -->
</div>