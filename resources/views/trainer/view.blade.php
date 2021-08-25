
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="manage-customer">Trainers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Trainers View</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Trainer Details</h4>
                </div>
                <div class="card-body">
                        <div id="full_details">
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Trainer Information</h4>
                                    <hr />
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="text-label">Image</label>
                                        @if($datas->image){
                                            <img src="" alt="" width="100px"/>
                                        }
                                        @else <h6>No Image</h6>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Full Name</label>
                                            <h6>{{$datas->first_name ." ". $datas->last_name}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number</label>
                                            <h6>{{$datas->phone_number}}</h6>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <h6>{{$datas->address}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <h6>{{$datas->date_of_birth}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <h6>{{$datas->cnic}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Salary</label>
                                            <h6>{{$datas->fixed_salary}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Commision Percentage</label>
                                            <h6>{{$datas->commision}}%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing In</label>
                                            <h6>{{$datas->timing_in}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Timing Out</label>
                                            <h6>{{$datas->timing_out}}</h6>
                                        </div>
                                    </div>

                                    @if($customer)
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Commision Amount</label>
                                            <h6>
                                               {{($fees[0]->gym_fees* $datas->commision/100)}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Session / sMonth</label>
                                            <h6>
                                               {{($tsession[0]->tsession)}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Clients</label>
                                            <h6>
                                               {{count($customer)}}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Salary</label>
                                            <h6>
                                               {{(($fees[0]->gym_fees* $datas->commision/100)*$tsession[0]->tsession) + $datas->fixed_salary}}
                                            </h6>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                               
                            
                </div>
            </div>
        </div>
    </div>
</div>



@endsection