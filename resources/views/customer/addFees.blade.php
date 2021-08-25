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


                    <form id="new" action="{{url('insertFees/'.$value->id)}}" method="POST">
                        @csrf
                        
                        <div class="row">
                                    
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Due Fees*</label>
                                    <select name="fees_status" class="form-control form-control-lg" required>
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="All Clear">All Clear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Payment Type*</label>
                                    <select name="payment_type" class="form-control form-control-lg" required>
                                        <option value="No Select" hidden>Select Type</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Deposit">Bank Deposit</option>
                                        <option value="Online Transaction">Online Transaction</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Date of Pay</label>
                                    <input type="date" name="pay_date" id="" placeholder="10" required class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Amount</label>
                                    <input type="text" name="amount" placeholder="0" required class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Discount</label>
                                    <input type="text" name="discount" placeholder="0" class="form-control">
                                </div>
                            </div>
                            
                        </div>

                        </table>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="btn-group ml-auto">
                        <button type="submit" id="save" class="btn btn-outline-info shadow btn-md mr-1"> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>


@endsection