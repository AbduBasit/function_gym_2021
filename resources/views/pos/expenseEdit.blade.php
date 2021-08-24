{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>
    .new-input {
        height: 40px !important;
    }
</style>
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Expenses</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Expenses</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md-responsive">
                            <thead>
                                <tr>
                                    <th><strong>Particular</strong></th>
                                    <th><strong>Description</strong></th>
                                    <th><strong>Amount</strong></th>
                                    <th><strong>Quantity</strong></th>
                                    <th><strong>Discount</strong></th>
                                    <th><strong>Tax %</strong></th>
                                    <th><strong>Net Amount</strong></th>
                                </tr>
                            </thead>
                            <form action="/expense-edit" method="POST">
                                <tbody class="report">
                                    <tr id="row-sec">
                                        <input type="text" name="id" value="{{$datas->id}}" hidden>
                                        @csrf
                                        <td> <input type="text" value="{{$datas->title}}" name="exp_title" required class="form-control border-primary new-input"> </td>
                                        <td> <input type="text" value="{{$datas->desc}}" name="exp_desc" class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="{{$datas->amount}}" name="exp_amount" value="0" min="0" required class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="{{$datas->quan}}" name="exp_quan" value="1" min="0" max="1000" required class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="{{$datas->disc}}" name="exp_disc" value="0" min="0" max="100000" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="{{$datas->tax}}" name="exp_tax" value="0" min="0" max="100" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="text" value="{{$datas->net}}" name="exp_net" value="0" disabled class="disable form-control new-input border-primary"> </td>
                                    </tr>
                                </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="btn-group ml-auto">

                            <button type="submit" class="btn btn-outline-info shadow btn-md mr-1"> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection