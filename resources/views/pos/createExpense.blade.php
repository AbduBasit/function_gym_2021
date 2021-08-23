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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Expenses</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Expenses</h4>
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
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                <tbody class="report">
                                    <tr>
                                        <td> <input type="text" required class="form-control border-primary new-input"> </td>
                                        <td> <input type="text" class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="0" min="0" required class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="1" min="0" max="1000" required class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="0" min="0" max="100000" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" value="0" min="0" max="100" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="text" value="0" disabled class="disable form-control new-input border-primary"> </td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-primary addRow shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                <button type="button" id="deleteRow" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                        </table>

                    </div>


                </div>
            </div>
        </div>

    </div>
</div>

@endsection