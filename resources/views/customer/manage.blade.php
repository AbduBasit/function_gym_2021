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

                    <div class="row mb-3 ie-section">
                        <div class="col-md-9"></div>
                        <div class="col-md-3 ">
                           <div class="mr-md-3 text-right">
                            <button class="btn btn-outline-light btn-sm" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                Export <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{url('customer-export/customer_xlsx')}}">Export to Excel (.xlsx) </a>
                                <a class="dropdown-item" href="{{url('customer-export/customer_csv')}}">Export to CSV (.csv)</a>
                            </div>
                                <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#trainer_import">
                                    Import <i class="fa fa-sign-in" aria-hidden="true"></i>
                                </button>    
                               
                           </div>
                        </div>  
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="trainer_import" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import CSV</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('customer-imp')}}" enctype="multipart/form-data" method="POST" class="dropzone">
                                        @csrf
                                        <div class="fallback">
                                            <input name="file_customer" type="file"/>
                                        </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                   


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
                                        @if($member->fees_clear == 'All Clear')
                                        All Clear
                                        @elseif ($member->fees_clear == 'Unpaid')
                                        <a href="add_fees/{{$member->id}}" id="add_fees" class="text-danger">Unpaid</a>
                                        @endif
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
                                                @if(!$member->trainer_name || $member->trainer_name == 'Select Trainer')

                                                @else
                                                <a class="dropdown-item" href="customer-edit-pt/{{$member->id}}">Edit PT Information</a>
                                                @endif
                                                <a class="dropdown-item" href="customer-edit/{{$member->id}}">Edit Basic Information</a>
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