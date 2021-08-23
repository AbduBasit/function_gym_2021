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
                            <form action="expense-add" method="POST">
                                <tbody class="report">
                                    <tr id="row-sec">
                                        @csrf
                                        <td> <input type="text" name="exp_title[]" required class="form-control border-primary new-input"> </td>
                                        <td> <input type="text" name="exp_desc[]" class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" name="exp_amount[]" value="0" min="0" required class="form-control new-input  border-primary"> </td>
                                        <td> <input type="number" name="exp_quan[]" value="1" min="0" max="1000" required class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" name="exp_disc[]" value="0" min="0" max="100000" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="number" name="exp_tax[]" value="0" min="0" max="100" class="width80 form-control new-input  border-primary"> </td>
                                        <td> <input type="text" name="exp_net[]" value="0" disabled class="disable form-control new-input border-primary"> </td>
                                    </tr>
                                </tbody>

                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-auto shadow btn-sm mr-1"><i class="fa fa-plus"></i> Submit</button>
                        <button type="button" id="addRow" class="btn btn-primary ml-auto shadow btn-sm mr-1"><i class="fa fa-plus"></i> Add Row</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection