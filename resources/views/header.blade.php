<header style="background-color:#17a2b8; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; font-family: Arial, sans-serif;">

    <!-- Esquerda: Logo + Nome -->
    <div style="display: flex; align-items: center; flex: 1;">
        <img src="{{ asset('public/img/logo5.png') }}" alt="Opportune" style="height: 40px; margin-right: 10px;">
        <span style="font-size: 20px; font-weight: bold; color: black;">Opportune</span>
    </div>

    <!-- Centro: Navegação principal -->
    <nav style="flex: 1; display: flex; justify-content: center;">
        <ul style="list-style: none; display: flex; gap: 30px; margin: 0; padding: 0;">
            <li class="{{ (Request::segment(1) == '') ? 'active' : '' }}" 
                style="list-style: none; display: inline-block;">
                <a href="{{ url('/home') }}" 
                   style="text-decoration: none; color: #333; font-weight: 500; 
                          {{ (Request::segment(1) == '') ? 'color: white;' : '' }}">
                    Home
                </a>
            </li>
            <li class="{{ (Request::segment(1) == 'sobre') ? 'active' : '' }}" 
                style="list-style: none; display: inline-block;">
                <a href="{{ url('/sobre') }}" 
                   style="text-decoration: none; color: #333; font-weight: 500; 
                          {{ (Request::segment(1) == 'sobre') ? 'color: white;' : '' }}">
                    Sobre
                </a>
            </li>
            <li class="{{ (Request::segment(1) == 'vagas') ? 'active' : '' }}" 
                style="list-style: none; display: inline-block;">
                <a href="{{ url('/vagas') }}" 
                   style="text-decoration: none; color: #333; font-weight: 500; 
                          {{ (Request::segment(1) == 'vagas') ? 'color: white;' : '' }}">
                    Vagas
                </a>
            </li>
        </ul>
    </nav>
    

    <!-- Direita: Login / Registro -->
    <div style="flex: 1; display: flex; justify-content: flex-end; gap: 20px;">
        
        <a href="{{ url('/') }}" style="text-decoration: none; color: #333; font-weight: 500;">Login</a>
        <a href="{{ url('/register_candidato') }}" style="text-decoration: none; color: #333; font-weight: 500;">Candidato</a>
        <a href="{{ url('/register_empresa') }}" style="text-decoration: none; color: #333; font-weight: 500;">Empresa</a>
    </div>
</header>