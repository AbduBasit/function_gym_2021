
{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')


<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Trainers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Trainers</a></li>
        </ol>
    </div>
    <!-- row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><strong class="text-primary">Trainer:</strong> {{$trainer_name}}</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-fill mb-3 dark">
                                        <li class=" nav-item">
                                            <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Monday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Tuesday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Wednesday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Thursday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="true">Friday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-6" class="nav-link" data-toggle="tab" aria-expanded="true">Saturday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#navpills-7" class="nav-link" data-toggle="tab" aria-expanded="true">Sunday</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        {{-- Monday --}}
                                        <div id="navpills-1" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
    
    
    
                                        {{-- Tuesday --}}
                                        <div id="navpills-2" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
    
    
    
                                        {{-- Wednesday --}}
                                        <div id="navpills-3" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
    
    
                                        {{-- Thursday --}}
                                        <div id="navpills-4" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
    
    
    
                                        {{-- Friday --}}
                                        <div id="navpills-5" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
    
    
    
                                        {{-- Saturday --}}
                                        <div id="navpills-6" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
    
    
                                        {{-- Sunday --}}
                                        <div id="navpills-7" class="tab-pane ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th class="width80"><strong>#</strong></th>
                                                                <th><strong>Customers Name</strong></th>
                                                                <th><strong>Phone Number</strong></th>
                                                                <th><strong>Email Address</strong></th>
                                                                <th><strong>Timing In</strong></th>
                                                                <th><strong>Timing Out</strong></th>
                                                                <th><strong>Action</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                           <tr>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                               <td></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="trainer-view">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
    
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection