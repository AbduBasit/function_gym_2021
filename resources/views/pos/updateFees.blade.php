{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>
    .new-input {
        height: 40px !important;
    }
    .display{
        display: none;
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


                    <form id="new" action="{{url('insertInvFees/'.$value->id)}}" method="POST">
                        @csrf
                        
                        <div class="row">
                                    
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Due Fees*</label>
                                    <select name="fees_status" class="form-control form-control-lg" required>
                                        <option value="{{$value->fees_payable}}" hidden>{{$value->fees_payable}}</option>
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="All Clear">All Clear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Payment Type*</label>
                                    <select name="payment_type" class="form-control form-control-lg" required>
                                        <option value="{{$value->payment_method}}" hidden>{{$value->payment_method}}</option>
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
                                    <input type="date" name="pay_date" id="pay_date" placeholder="10" value="{{$value->pay_date}}" required class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Amount</label>
                                    <input type="text" name="amount"  required value="{{round($value->net_total-$value->discount)}}" class=" form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Discount</label>
                                    <input type="text" name="discount" class="form-control" value="{{$value->discount}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="material-switch data-input mt-3">
                                    <p>Are you want to change the Invoice Date?</p>
                                        <input id="renew" value="yes" name="renew" hidden type="checkbox" />
                                        <label for="renew" class="label-default"></label> 
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6 display mb-2">
                                <div class="form-group">
                                    <label class="text-label">Date of Invoice*</label>
                                    <input type="date" name="doj_new" class="form-control"
                                        onchange="dateCalc1(this.value)"
                                        placeholder="Cellophane Square" >
                                </div>
                            </div>
                            <div class="col-lg-6 display mb-2">
                                <div class="form-group">
                                    <label class="text-label">Month End Date</label>
                                    <input type="text" class="form-control disable" id="renew_month-end" name="mde_new"
                                        value="undefine" disabled>
                                </div>
                            </div>
                        </div>
                     
                            
                     
                        
                        <div class="row mt-4">
                            <div class="btn-group ml-auto">
                                <button type="submit" id="save" class="btn btn-outline-info shadow btn-md mr-1"> Submit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
      $('#renew').on('click', ()=>{
        if ($('#renew').prop('checked')==true){ 
            $('.display').fadeIn()
        }
        else{
            $('.display').fadeOut()
        }
    })
       dateCalc1 = (value) => {
        var chooseDate = new Date(value);
        chooseDate.setDate(chooseDate.getUTCDate());
        var futureDate = chooseDate.getFullYear() + '-' + ('0' + (chooseDate.getMonth() + 2)).slice(-2) + '-' + ('0' + (chooseDate.getDate())).slice(-2);
        $("#renew_month-end").val(function() {
            $('#renew_month-end').val(futureDate)
            return futureDate;
        });
        
    }
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
    document.getElementById('pay_date').value = new Date().toDateInputValue();
</script>
@endsection