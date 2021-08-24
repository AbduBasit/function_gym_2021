{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Trainer Commision Report</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Report</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Trainer Salary</strong></th>
                                    <th><strong>Trainer Commision</strong></th>
                                    <th><strong>Total Customer</strong></th>
                                    <th><strong>Calculated Commsion</strong></th>
                                    <th><strong>Total Session</strong></th>
                                    <th><strong>Total Salary</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @foreach ($customer as $cust)
                                    <tr>
                                        <td>{{$item->first_name ." ". $item->last_name }}</td>
                                        <td>{{$item->fixed_salary}}</td>
                                        <td>{{$item->commision . "%" }}</td>
                                        <td>{{count($customer)}}</td>
                                        <td>{{round($cust->gym_fees / $item->commision * 100)}}</td>
                                        <td>{{$item->first_name ." ". $item->last_name }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
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