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
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Professor</h2>
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
                        <h3 class="panel-title">Pesquisar Professor</h3>
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
                            <a href="{{url('panel/teacher')}}" class="btn btn-success">Formatar</a>
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
                        <h3 class="panel-title">Lista Professor</h3>
                        <a href="{{url('panel/teacher/create')}}" class="btn btn-success pull-right">Cadastrar Professor</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                            <th>Nome Escola</th>    
                                        @endif
                                        <th>Img</th>
                                        <th>Nome</th>
                                        <th>Apelido</th>
                                        <th>Data Nasc</th>
                                        <th>Gênero</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                        <th>Estado civil</th>
                                        <th>Estado</th>
                                        <th>Criado em</th>
                                        <th>Criado por</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse($getTeacher as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                                                <td>
                                                    @if (!empty($value->getCreatedBy))
                                                        {{$value->getCreatedBy->name}}
                                                    @endif
                                                </td>    
                                            @endif
                                            <td>
                                                @if(!empty($value->getProfile()))
                                                    <img src="{{$value->getProfile()}}" style="width: 50px; height:50px; border-radius:50px;" alt="">
                                                @endif
                                            </td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->last_name}}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->birth))}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->marital_status}}</td>
                                            <td>{{ $value->status == 1 ? 'Ativa' : 'Inativa' }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                            <td>{{ $value->creator->name ?? 'Desconhecido' }}</td>
                                            <td>
                                                <a href="{{url('panel/teacher/edit/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"><span><a>
                                                <a onclick="return confirm('Deletar?');" href="{{url('panel/teacher/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>
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
                    {{ $getTeacher->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
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