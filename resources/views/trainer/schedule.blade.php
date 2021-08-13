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
                                    <table class="table table-md-responsive">
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

                                            @foreach($mondaysch as $item_mon)
                                            <tr>
                                                <td>{{$item_mon->id}}</td>
                                                <td>{{$item_mon->first_name . ' ' . $item_mon->last_name}}</td>
                                                <td>{{$item_mon->phone_number}}</td>
                                                <td>{{$item_mon->email}}</td>
                                                <td>{{$item_mon->mon_start_time}}</td>
                                                <td>{{$item_mon->mon_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_mon->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Tuesday --}}
                        <div id="navpills-2" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($tuesdaysch as $item_tue)
                                            <tr>
                                                <td>{{$item_tue->id}}</td>
                                                <td>{{$item_tue->first_name . ' ' . $item_tue->last_name}}</td>
                                                <td>{{$item_tue->phone_number}}</td>
                                                <td>{{$item_tue->email}}</td>
                                                <td>{{$item_tue->tue_start_time}}</td>
                                                <td>{{$item_tue->tue_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_tue->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Wednesday --}}
                        <div id="navpills-3" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($wednesdaysch as $item_wed)
                                            <tr>
                                                <td>{{$item_wed->id}}</td>
                                                <td>{{$item_wed->first_name . ' ' . $item_wed->last_name}}</td>
                                                <td>{{$item_wed->phone_number}}</td>
                                                <td>{{$item_wed->email}}</td>
                                                <td>{{$item_wed->wed_start_time}}</td>
                                                <td>{{$item_wed->wed_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_wed->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Thursday --}}
                        <div id="navpills-4" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($thursdaysch as $item_thu)
                                            <tr>
                                                <td>{{$item_thu->id}}</td>
                                                <td>{{$item_thu->first_name . ' ' . $item_thu->last_name}}</td>
                                                <td>{{$item_thu->phone_number}}</td>
                                                <td>{{$item_thu->email}}</td>
                                                <td>{{$item_thu->thu_start_time}}</td>
                                                <td>{{$item_thu->thu_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_thu->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Friday --}}
                        <div id="navpills-5" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($fridaysch as $item_fri)
                                            <tr>
                                                <td>{{$item_fri->id}}</td>
                                                <td>{{$item_fri->first_name . ' ' . $item_fri->last_name}}</td>
                                                <td>{{$item_fri->phone_number}}</td>
                                                <td>{{$item_fri->email}}</td>
                                                <td>{{$item_fri->fri_start_time}}</td>
                                                <td>{{$item_fri->fri_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_fri->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Saturday --}}
                        <div id="navpills-6" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($saturdaysch as $item_sat)
                                            <tr>
                                                <td>{{$item_sat->id}}</td>
                                                <td>{{$item_sat->first_name . ' ' . $item_sat->last_name}}</td>
                                                <td>{{$item_sat->phone_number}}</td>
                                                <td>{{$item_sat->email}}</td>
                                                <td>{{$item_sat->sat_start_time}}</td>
                                                <td>{{$item_sat->sat_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_sat->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        {{-- Sunday --}}
                        <div id="navpills-7" class="tab-pane ">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-md-responsive">
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

                                            @foreach($sundaysch as $item_sun)
                                            <tr>
                                                <td>{{$item_sun->id}}</td>
                                                <td>{{$item_sun->first_name . ' ' . $item_sun->last_name}}</td>
                                                <td>{{$item_sun->phone_number}}</td>
                                                <td>{{$item_sun->email}}</td>
                                                <td>{{$item_sun->sun_start_time}}</td>
                                                <td>{{$item_sun->sun_end_time}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{url('customer-view/'.$item_sun->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

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