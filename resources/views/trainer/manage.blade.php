{{-- Extends layout --}}
@extends('layout.default')
<style>
    .anchor_link{
        color: rgb(25, 68, 255) !important;
    }
    .anchor_link:hover{
        color: rgb(5, 42, 209) !important;
    }
</style>


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
                                <h4 class="card-title">Manage Customers</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="width80"><strong>#</strong></th>
                                                <th><strong>Name</strong></th>
                                                <th><strong>Phone Number</strong></th>
                                                <th><strong>Address</strong></th>
                                                <th><strong>Timing In</strong></th>
                                                <th><strong>Timing Out</strong></th>
                                                <th><strong>Schedules</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($datas as $member)
                                           <tr>
                                               <td>{{$member->id}}</td>
                                               <td>{{$member->first_name. " " . $member->last_name}}</td>
                                               <td>{{$member->phone_number}}</td>
                                               <td>{{$member->address}}</td>
                                               <td>{{$member->timing_in}}</td>
                                               <td>{{$member->timing_out}}</td>
                                               <td><a class="anchor_link" href="trainer-schedule/{{$member->id}}">View Details</a></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="trainer-view/{{$member->id}}">View</a>
                                                        <a class="dropdown-item" href="trainer-edit/{{$member->id}}">Edit</a>
                                                        <a class="dropdown-item" href="trainer-delete/{{$member->id}}">Delete</a>
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
			
@endsection