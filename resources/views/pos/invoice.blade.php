@extends('layout.default')
{{-- Content --}}
@section('content')

<div class="container">
    <button type="button" class="btn btn-outline-info btn-sm" id="printbtn" style="border-radius: 0px !important;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
</div>

<div class="container print-invoice">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-6">
                            <img src="{{asset('images/logo.png')}}">
                            <img src="{{asset('images/logo-text.png')}}" width="150px" class="ml-2 mt-2">
                        </div>

                        <div class="col-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #{{$data->id}}</p>
                            <p class="text-muted">Due to: {{$date}}</p>
                        </div>
                    </div>

                    <hr class="">

                    <div class="row p-5">
                        <div class="col-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1"><strong class="text-dark">Customer Name: </strong>{{$data->customer_name}}</p>
                            <p class="mb-1"><strong class="text-dark">Trainer Name:</strong> {{$data->trainer_name}}</p>
                            <p class="mb-1">{{$data->customer_phone}}</p>
                            <p class="mb-1 text-primary">{{$data->customer_email}}</p>
                            
                        </div>

                        <div class="col-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1 text-success"><span class="text-muted">Fees Status: </span> {{$data->fees_payable}}</p>
                            <p class="mb-1"><span class="text-muted">Payment Method: </span> {{$data->payment_method}}</p>
                            <p class="mb-1"><span class="text-muted">Reference Name: </span> 
                            @if ($data->reference)
                            {{$data->reference}}
                            @else 
                            No Reference
                            @endif
                            </p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase width80 small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        @if ($data->registration_fees || $data->trainer_fees)
                                         @if ($data->registration_fees) 
                                         <tr><td>Registration Fees</td><td>{{$data->registration_fees}}</td></tr>
                                                @endif
                                                @if ($data->trainer_fees)
                                                <tr><td>Trainer Fees </td> <td>{{$data->trainer_fees}}</td> </tr>
                                                @endif
                                                <tr><td>Month Fees </td> <td>{{$data->gym_fees}}</td></tr>
                                            @else
                                                <tr><td>Monthly Gym Fees</td><td>{{$data->gym_fees}}</td></tr>
                                            @endif
            
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 text-light">{{$data->net_total}}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Discount</div>
                            <div class="h2 text-light">
                                @if ($data->discount)
                                {{$data->discount}}
                                @else
                                    No Discount
                                @endif
                            </div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 text-light">{{$data->registration_fees + $data->trainer_fees + $data->gym_fees}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>


<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
    function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('.print-invoice').clone()  ;
        var printcontent = $('.print-invoice').css({
            'transform':'scale(1.1)',
            'margin-top':'200px',
    });
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
    document.getElementById('printbtn').addEventListener('click', ()=>{
        printContent()
    })
</script>


@endsection