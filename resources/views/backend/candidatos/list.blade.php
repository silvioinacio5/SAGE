@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Candidatos</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Candidato</h2>
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
                        <h3 class="panel-title">Pesquisar Candidato</h3>
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
                        <div class="col-md-2">
                            <label>Apelido</label>
                            <input type="text" class="form-control" value="{{Request::get('last_name')}}" placeholder="Nome" name="last_name">
                        </div>
                        <div class="col-md-2">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Request::get('email')}}" placeholder="Email" name="email">
                        </div>
                        <div class="col-md-2">
                            <label>Endereço</label>
                            <input type="text" class="form-control" value="{{Request::get('address')}}" placeholder="Endereço" name="address">
                        </div>
                        <div class="col-md-2">
                            <label>Gênero</label>
                            <select name="gender" id="gender"  class="form-control">
                                <option value="">Selecionar</option>
                                <option {{(Request::get('gender') == 'Masculino') ? 'selected' : ''}} value="Masculino">Masculino</option>
                                <option {{(Request::get('gender') == 'Feminino') ? 'selected' : ''}} value="Feminino">Feminino</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Estado</label>
                            <select name="status" id="status"  class="form-control">
                                <option value="">Selecionar</option>
                                <option {{(Request::get('status') == '1') ? 'selected' : ''}} value="1">Ativa</option>
                                <option {{(Request::get('status') == '100') ? 'selected' : ''}} value="100">Inativa</option>
                            </select>
                        </div>
                        <div style="clear: both;"></div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                            <a href="{{url('panel/candidato')}}" class="btn btn-success">Formatar</a>
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
                        <h3 class="panel-title">Lista Candidatos</h3>
                        <a href="{{url('panel/candidato/create')}}" class="btn btn-success pull-right">Cadastrar Candidato</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Img</th>
                                        <th>Nome</th>
                                        <th>Gênero</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                        <th>Criado em</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse($getCandidato as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>
                                                @if(!empty($value->getProfile()))
                                                    <img src="{{$value->getProfile()}}" style="width: 50px; height:50px; border-radius:50px;" alt="">
                                                @endif
                                            </td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{url('panel/candidato/edit/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"><span><a>
                                                <a onclick="return confirm('Deletar?');" href="{{url('panel/candidato/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>
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
                    {{ $getCandidato->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
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