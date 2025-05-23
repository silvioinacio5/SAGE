@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Admin</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Admin</h2>
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
                        <h3 class="panel-title">Pesquisar Escola</h3>
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
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Request::get('email')}}" placeholder="Email" name="email">
                        </div>
                        <div class="col-md-2">
                            <label>Endereço</label>
                            <input type="text" class="form-control" value="{{Request::get('address')}}" placeholder="Endereço" name="address">
                        </div>
                        <div class="col-md-2">
                            <label>Papel</label>
                            <select name="is_admin" id="status"  class="form-control">
                                <option value="">Selecionar</option>
                                <option {{(Request::get('id_admin') == '1') ? 'selected' : ''}} value="1">Super Admin</option>
                                <option {{(Request::get('is_admin') == '2') ? 'selected' : ''}} value="2">Admin</option>
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
                            <a href="{{url('panel/admin')}}" class="btn btn-success">Formatar</a>
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
                        <a href="{{url('panel/admin/create')}}" class="btn btn-success pull-right">Cadastrar Admin</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Img</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                        <th>Estado</th>
                                        <th>Papel</th>
                                        <td>Criado em</td>
                                        <th>Criado por</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse($getAdmin as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>
                                                @if(!empty($value->getProfile()))
                                                    <img src="{{$value->getProfile()}}" style="width: 50px; height:50px; border-radius:50px;" alt="">
                                                @endif
                                            </td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{ $value->status == 1 ? 'Ativa' : 'Inativa' }}</td>
                                            <td>{{ $value->is_admin == 1 ? 'Super Admin' : 'Admin' }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                            <td>{{ $value->creator->name ?? 'Desconhecido' }}</td>
                                            <td>
                                                <a href="{{url('panel/admin/edit/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"><span><a>
                                                <a onclick="return confirm('Deletar?');" href="{{url('panel/admin/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>
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
                    {{ $getAdmin->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
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