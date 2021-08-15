{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Customers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Customers</a></li>
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
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="width80"><strong>#</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>D.O.B</strong></th>
                                    <th><strong>Joining Date</strong></th>
                                    <th><strong>Training Type</strong></th>
                                    <th><strong>Trainer Name</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Fees Payable</strong></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td>{{$member->first_name. " " . $member->last_name}}</td>
                                    <td>{{$member->address}}</td>
                                    <td>{{$member->date_of_birth}}</td>
                                    <td>{{$member->date_of_joining}}</td>
                                    <td>{{$member->training_type}}</td>
                                    <td>
                                        @if(!$member->trainer_name || $member->trainer_name == 'Select Trainer')
                                        No Trainer
                                        @else
                                        {{$member->trainer_name}}
                                        @endif
                                    </td>
                                    <td>{{$member->status}}</td>
                                    <td class="text-success">
                                        All Clear
                                    </td>
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
                                                <a class="dropdown-item" href="customer-view/{{$member->id}}">View</a>
                                                <a class="dropdown-item" href="customer-edit/{{$member->id}}">Edit</a>
                                                <a class="dropdown-item" href="customer-delete/{{$member->id}}">Delete</a>
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