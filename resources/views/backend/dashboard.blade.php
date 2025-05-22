@extends('backend.layouts.app')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB -->
    
    <!-- PAGE TITLE -->
    <div class="page-title">                    
        <h2><span class="fa fa-arrow-circle"></span>Dashboard</h2>
    </div>
    <!-- END PAGE TITLE -->                
    
    <!-- PAGE CONTENT WRAPPER --> 
    
    @if (Auth::user()->is_admin == 1)
    <div class="page-content-wrap">
    <div class="col-md-3">
                            
        <!-- START WIDGET CLOCK -->
        <div class="widget widget-success widget-padding-sm">
            <div class="" style="text-align: center;"><h2>{{$candidato}}</h2></div>                            
            <div class="" style="text-align:center;"><h2>Candidatos</h2></div>                                                       
        </div>                        
        <!-- END WIDGET CLOCK -->
        
    </div>
    <div class="col-md-3">
                            
        <!-- START WIDGET CLOCK -->
        <div class="widget widget-success widget-padding-sm">
            <div class="" style="text-align: center;"><h2>{{$empresa}}</h2></div>                            
            <div class="" style="text-align:center;"><h2>Empresas</h2></div>                                                       
        </div>                        
        <!-- END WIDGET CLOCK -->
        
    </div>    
    <div class="col-md-3">
                            
        <!-- START WIDGET CLOCK -->
        <div class="widget widget-success widget-padding-sm">
            <div class="" style="text-align: center;"><h2>{{$vaga}}</h2></div>                            
            <div class="" style="text-align:center;"><h2>Vagas</h2></div>                                                       
        </div>                        
        <!-- END WIDGET CLOCK -->
    </div> 
        <div class="col-md-3">
        <!-- START WIDGET CLOCK -->
        <div class="widget widget-success widget-padding-sm">
            <div class="" style="text-align: center;"><h2>{{$candidatura}}</h2></div>                            
            <div class="" style="text-align:center;"><h2>Candidaturas</h2></div>                                                       
        </div>                        
        <!-- END WIDGET CLOCK -->
        
    </div> 
    
    <div class="row">
        <div class="col-md-4">
            
            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Sales & Event</h3>
                        <span>Event "Purchase Button"</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->
            
        </div>
        <div class="col-md-4">
            
            <!-- START USERS ACTIVITY BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Users Activity</h3>
                        <span>Users vs returning</span>
                    </div>                                    
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                </div>                                    
            </div>
            <!-- END USERS ACTIVITY BLOCK -->
            
        </div>
        <div class="col-md-4">
            
            <!-- START VISITORS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Visitors</h3>
                        <span>Visitors (last month)</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END VISITORS BLOCK -->
            
        </div>
    </div>
    
    <!-- START DASHBOARD CHART -->
    <div class="block-full-width">
        <div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
        <div class="chart-legend">
            <div id="dashboard-legend"></div>
        </div>                                                
    </div>                    
    <!-- END DASHBOARD CHART -->
    </div>
    @endif    
    
    <!-- END PAGE CONTENT WRAPPER -->                                    
    </div>         
</div>   
@endsection
@section('script')
<script type="text/javascript" src="{{url('public/js/demo_tables.js')}}"></script>     
@endsection        