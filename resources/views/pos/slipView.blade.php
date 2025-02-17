{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Trainers</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Trainers PaySlip</a></li>
            </ol>
        </div>
        <!-- row -->
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Trainer Details</h4>
                        <div class="row">
                            <div class="">
                                <button type="button" class="btn btn-outline-info btn-sm" id="printbtn" style="border-radius: 0px !important;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body print-invoice">
                        <div id="full_details">
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Trainer Information</h4>
                                    <hr />
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Pay</label>
                                            <h6>{{ $datas[0]->date_of_pay }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Full Name</label>
                                            <h6>{{ $datas[0]->tname }}</h6>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Salary</label>
                                            <h6>{{ $datas[0]->fixed_salary }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Commision Percentage</label>
                                            <h6>{{ $datas[0]->commision }}%</h6>
                                        </div>
                                    </div>


                                    @if ($datas)
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Commision Amount</label>
                                                <h6>
                                                    {{ ($datas[0]->total_session * $datas[0]->trainer_fees_per_session) * $datas[0]->commision /100}}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Total Session / Month</label>
                                                <h6>
                                                    @if ($datas[0]->total_session)
                                                    {{ $datas[0]->total_session }}
                                                    @else
                                                    Not Avaialable
                                                    @endif
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Total Clients</label>
                                                <h6>
                                                    {{ $datas[0]->count_trainer }}
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Registration Fees</label>
                                                <h6>
                                                    @if ($datas[0]->registration_fees)
                                                    {{ $datas[0]->registration_fees }}
                                                    @else
                                                        Not Avaialable
                                                    @endif
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Trainer Session Fees</label>
                                                <h6>
                                                    @if ($datas[0]->trainer_fees_per_session)
                                                    {{ $datas[0]->trainer_fees_per_session }}    
                                                    @else
                                                        Not Avaialable
                                                    @endif
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Retian Commision</label>
                                                <h6 id="retain">
                                                    Not Available
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Reference Commision</label>
                                                <h6>
                                                    @if ($inv)
                                                        {{ $inv }}

                                                    @else
                                                        Not Available
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="form-group">
                                                <label class="text-label text-primary"><strong>Net Salary</strong></label>
                                                <h6 id="net">
                                                    {{-- //Changes Made ($datas[0]->total_session * $datas[0]->trainer_fees_per_session)+  --}}
                                                    {{ round((($datas[0]->total_session * $datas[0]->trainer_fees_per_session) * $datas[0]->commision /100) + $datas[0]->fixed_salary + $inv)}}
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


        <script src="{{ asset('./js/jquery.js') }}"></script>
        <script>
            function printContent(el){
                var restorepage = $('body').html();
                var printcontent = $('.print-invoice').clone()  ;
                var printcontent = $('.print-invoice').css({
                    'transform':'scale(1)',
                    'margin-top':'200px',
            });
                $('body').empty().html(printcontent);
                window.print();
                $('body').html(restorepage);
                }
            document.getElementById('printbtn').addEventListener('click', ()=>{
                printContent()
            })

            $(document).ready(function () {
                var resCount = "{{$resultCount}}";
                var res = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($result)}}")).replace(/&quot;/g,'"'))
                let result=null;
                for(i=0; i<resCount; i++){
                    if(res[i]['count']==3){
                        var rule1="{{$rule}}";
                        var rule = JSON.parse(JSON.parse(JSON.stringify(rule1)).replace(/&quot;/g,'"'));
                        result += parseInt(res[i]['gym_fees']*rule['values']/100);
                        $('#retain').html(result)

                        

                        if(!result){
                            let net = parseInt("{{ round((($datas[0]->total_session * $datas[0]->trainer_fees_per_session) * $datas[0]->commision /100) +($datas[0]->total_session * $datas[0]->trainer_fees_per_session)+ $datas[0]->fixed_salary + $inv)}}");
                            $('#net').html(net)
                            $('#retain').html("Not Available")
                        }else{
                            let net = parseInt("{{ round((($datas[0]->total_session * $datas[0]->trainer_fees_per_session) * $datas[0]->commision /100) +($datas[0]->total_session * $datas[0]->trainer_fees_per_session)+ $datas[0]->fixed_salary + $inv)}}");
                            $('#net').html(net+result)
                        }
                        
                    }
                    else{
                        
                    }
                }
                
            });
        </script>
    @endsection
