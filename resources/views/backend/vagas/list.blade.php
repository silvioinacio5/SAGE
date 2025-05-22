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
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Vaga</h2>
    </div>
    <!-- END PAGE TITLE -->                
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <!-- START RESPONSIVE TABLES -->
        <div class="row">
            <div class="col-md-12">
                @include('message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pesquisar Vaga</h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="get">
                        <div class="col-md-2">
                            <label>ID</label>
                            <input type="text" class="form-control" value="{{Request::get('id')}}" placeholder="ID" name="id">
                        </div>
                        <div class="col-md-2">
                            <label>Nome</label>
                            <input type="text" class="form-control" value="{{Request::get('titulo')}}" placeholder="Nome" name="titulo">
                        </div>
                        <div style="clear: both;"></div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                            <a href="{{url('panel/vaga')}}" class="btn btn-success">Formatar</a>
                        </div>
                    </form>
                    </div>
                </div>                                                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if (Auth::user()->is_admin == 2)
                        <h3 class="panel-title">Minhas Vagas</h3>
                        <a href="{{url('panel/vaga/create')}}" class="btn btn-success pull-right">Publicar Vaga</a>   
                        @else                 
                        <h3 class="panel-title">Lista Vagas</h3>
                        @endif
        
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Título</th>
                                        <th>Salário KZ</th>
                                        <th>Requisitos</th>
                                        <th>Nível</th>
                                        <th>Modalidade</th>
                                        <th>Válido até</th>
                                        <th>Local</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    
                                    @forelse($getRecord as $value)
                                       
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->titulo}}</td>
                                                    <td>{{$value->salario}}</td>
                                                    <td>{{$value->requisito}}</td>
                                                    <td>{{$value->nivel}}</td>
                                                    <td>{{$value->modalidade}}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->data_expire))}}</td>
                                                    <td>{{$value->local}}</td>
                                                    <td>
                                                        @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                                            <a href="{{ url('panel/vaga/edit/' . $value->id) }}" 
                                                               class="btn btn-default btn-rounded btn-sm" 
                                                               title="Editar">
                                                                <span class="fa fa-pencil"></span>
                                                            </a>
                                                    
                                                            <a href="{{ url('panel/vaga/delete/' . $value->id) }}" 
                                                               class="btn btn-danger btn-rounded btn-sm" 
                                                               title="Deletar" 
                                                               onclick="return confirm('Tem certeza que deseja deletar?');">
                                                                <span class="fa fa-times"></span>
                                                            </a>
                                                        
                                                        @elseif (Auth::user()->is_admin == 3)
                                                            <a href="{{ url('panel/vaga/edit/' . $value->id)}}" 
                                                               class="btn btn-primary btn-rounded btn-sm" 
                                                               title="Candidatar-se">
                                                                <span class="fa fa-pencil"></span> Candidatar-se
                                                            </a>
                                                        @endif
                                                    </td>
                                                    
                                                </tr>  
                                                @empty
                                                    <tr>
                                                        <td colspan="100%">Dados não encontrados!</td>
                                                    </tr> 
                                        
                                    @endforelse                                        
                                </tbody>
                            </table>
                        </div>                                
                    </div>
                </div>                                                
                <div class="pull-right">
                    {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                </div>
            </div>
        </div>
        <!-- END RESPONSIVE TABLES -->
        
    <!-- END PAGE CONTENT WRAPPER -->                                    
    </div> 
    <!-- END PAGE CONTENT WRAPPER -->                                    
    </div>         
</div>   
@endsection
@section('script')

@endsection        