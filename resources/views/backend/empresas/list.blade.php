@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Empresa</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Empresa</h2>
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
                        <h3 class="panel-title">Pesquisar Empresas</h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="get">
                        
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
                            <label>Indústria</label>
                            <input type="text" class="form-control" value="{{Request::get('industria')}}" placeholder="Indústria" name="industria">
                        </div>
        
                        <div style="clear: both;"></div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                            <a href="{{url('panel/empresa')}}" class="btn btn-success">Formatar</a>
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
                        <h3 class="panel-title">Lista Empresas</h3>
                        <a href="{{url('panel/empresa/create')}}" class="btn btn-success pull-right">Cadastrar Empresa</a>
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
                                        <th>Web-site</th>
                                        <th>Indústria</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse($getSchool as $value)
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
                                            <td>{{ $value->website}}</td>
                                            <td>{{ $value->industria}}</td>
                                            <td>
                                                <a href="{{url('panel/empresa/edit/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"><span><a>
                                                <a onclick="return confirm('Deletar?');" href="{{url('panel/empresa/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>
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
                    {{ $getSchool->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
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