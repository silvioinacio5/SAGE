@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Turma</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Turma</h2>
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
                        <h3 class="panel-title">Pesquisar Turma</h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="get">
                        <div class="col-md-2">
                            <label>ID</label>
                            <input type="text" class="form-control" value="{{Request::get('id')}}" placeholder="ID" name="id">
                        </div>
                        <div class="col-md-2">
                            <label>Nome</label>
                            <input type="text" class="form-control" value="{{Request::get('name')}}" placeholder="Nome" name="name">
                        </div>
                        <div style="clear: both;"></div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                            <a href="{{url('panel/class')}}" class="btn btn-success">Formatar</a>
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
                        <h3 class="panel-title">Lista Admin</h3>
                        <a href="{{url('panel/class/create')}}" class="btn btn-success pull-right">Cadastrar Turma</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nome</th>
                                        <th>Estado</th>
                                        <th>Criado</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{ $value->status == 1 ? 'Ativa' : 'Inativa' }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{url('panel/class/edit/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"><span><a>
                                                <a onclick="return confirm('Deletar?');" href="{{url('panel/class/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>
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