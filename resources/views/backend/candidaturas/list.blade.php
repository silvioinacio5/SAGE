@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Candidaturas</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><a href="{{ url('/panel/dashboard') }}" class="fa fa-arrow-circle-o-left"></a>Candidaturas</h2>
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
                        <h3 class="panel-title">Pesquisar Candidatura</h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="get">
                        <div class="col-md-2">
                            <label>ID</label>
                            <input type="text" class="form-control" value="{{Request::get('id')}}" placeholder="ID" name="id">
                        </div>
                        <div class="col-md-2">
                            <label>Vaga</label>
                            <input type="text" class="form-control" value="{{Request::get('Vaga')}}" placeholder="Nome" name="name">
                        </div>
                        
                        <div class="col-md-2">
                            <label>Estado</label>
                            <select name="status" id="status"  class="form-control">
                                <option value="">Selecionar</option>
                                <option {{(Request::get('status') == '1') ? 'selected' : ''}} value="1">Enviado</option>
                                <option {{(Request::get('status') == '100') ? 'selected' : ''}} value="100">Aceite</option>
                                <option {{(Request::get('status') == '100') ? 'selected' : ''}} value="100">Em análise</option>
                                <option {{(Request::get('status') == '100') ? 'selected' : ''}} value="100">Negada</option>
                            </select>
                        </div>
                        <div style="clear: both;"></div><br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                            <a href="{{url('panel/candidatura')}}" class="btn btn-success">Formatar</a>
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
                        <h3 class="panel-title">Lista Candidaturas</h3>
                        <a href="{{ url('/panel/candidatura/create') }}" class="btn btn-success pull-right" class="btn btn-success">Candidatar</a>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vaga</th>
                                        <th>Candidato</th>
                                        <th>Estado</th>
                                        <th>Mensagem</th>
                                        <th>Criado em</th>
                                        @if (Auth::user()->id != 1)
                                            <th>actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody> 
                                    @if (Auth::user()->id == 1)

                                    @forelse($getCandidatura as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->creator->name ?? 'Desconhecido'}}</td>
                                            <td>{{$value->user->name ?? 'Desconhecido'}}</td>
                                            <td>{{$value->status}}</td>
                                            <td>{{$value->sms}}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                            
                                        </tr>  
                                        @empty
                                            <tr>
                                                <td colspan="100%">Dados não encontrados!</td>
                                            </tr>  
                                    @endforelse
                                        
                                    @endif
                                    @forelse($getCandidatura as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->titulo}}</td>
                                            <td>{{$value->user->name ?? 'Desconhecido'}}</td>
                                            <td>{{$value->status}}</td>
                                            <td>{{$value->sms}}</td>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                            <td>
                                                @if (Auth::user()->is_admin == 3)
                                                    @if ($value->status == "Aprovada")
                                                    <a href="{{ url('panel/exame/' . $value->id) }}" 
                                                        class="btn btn-primary btn-rounded btn-sm" 
                                                        title="Fazer exame">
                                                         <span class="fa fa-pencil"></span> Entrevista
                                                     </a>
                                                    @endif
                                                    <a onclick="return confirm('Deletar?');" href="{{url('panel/candidatura/delete/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_1');"><span class="fa fa-times"></span></a>    
                                                @elseif (Auth::user()->is_admin == 2)
                                                <a href="{{url('/aceite/'.$value->id)}}" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-thumbs-up" title="Aceitar"><span><a>
                                                    <a href="{{url('/negada/'.$value->id)}}" class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-thumbs-down" title="Recusar"><span><a>
                                                        <a href="{{url('/analisar/'.$value->id)}}" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-warning" title="Em análise"><span><a>    
                                                @endif
                                                
                                            </td>
                                        </tr>  
                                        @empty
                                        @if (Auth::user()->id != 1)
                                        <tr>
                                            <td colspan="100%">Dados não encontrados!</td>
                                        </tr>
                                        @endif  
                                    @endforelse                                           
                                </tbody>
                            </table>
                        </div>                                
                    </div>
                </div>                                                
                <div class="pull-right">
                    
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