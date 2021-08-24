{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Expenses Report</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('create-expense')}}" class="btn btn-outline-primary btn-md">+ Create New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Net Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->desc}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->quan}}</td>
                                    <td>{{$data->disc}}</td>
                                    <td>{{$data->tax}}</td>
                                    <td>{{$data->net}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{url('editExpense/'.$data->id)}}" id="editExpense" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="deleteExpense/{{$data->id}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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