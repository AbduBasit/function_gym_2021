{{-- Extends layout --}}
@extends('layout.default')
<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#daterange').daterangepicker({
            "showDropdowns": true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "startDate": "09/23/2021",
            "endDate": "09/29/2021"
        }, function(start, end, label) {
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
        $('#fees_payable').on('change',()=>{
            let filter_fees = document.getElementById('fees_payable').value;
            var value = {
                filter_fees:filter_fees
            }
            // console.log(value);
            $.ajax({
                type: "get",
                url: "{{route('manage_pnl_data')}}",
                data: value,
                success: function (response) {
                    
                    if(response){
                        
                    if(response){
                    var output="";
                    for(var i = 0; i < response[1].length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[1][i]["pay_date"]+'</td>';
                        output += '<td>'+response[1][i]["title"]+'</td>';
                        output += '<td>'+response[1][i]["desc"]+'</td>';
                        output += '<td>'+response[1][i]["amount"]+'</td>';
                        output += '</tr>';
                    }
                     output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Expenses: '+response[2][0]["total"]+'</h4></th>\
                                </tr>'
                    output +='\
                                <tr>\
                                    <th style="padding: 22px 15px !important" colspan="5" class="bg-light">Sales</th>\
                                </tr>\
                                <tr><th style="padding: 22px 15px !important">#</th>\
                                    <th style="padding: 22px 15px !important">Date</th>\
                                    <th style="padding: 22px 15px !important">Sales Particulars</th>\
                                    <th style="padding: 22px 15px !important"s>Amount</th>\
                                </tr>\
                            '
                    for(var i = 0; i < response[0].length; i++){
                        output += '<tr>';
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[0][i]["pay_date"]+'</td>';
                        output += '<td>'+response[0][i]["customer_name"]+' Invoice</td>';
                        output += '<td colspan="2">'+response[0][i]["net_total"]+'</td>';
                        output += '</tr>';
                    }
                    
                    output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Sales: '+response[3][0]["total"]+'</h4></th>\
                                </tr>'
                     output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Profit/Loss: '
                                    if(parseInt(response[3][0]["total"] - response[2][0]["total"]) <= 0){
                                        output+='<span class="text-danger">'+parseInt(response[3][0]["total"] - response[2][0]["total"])+' <i class="fa fa-long-arrow-down text-danger" aria-hidden="true"></i></span>'
                                    }
                                    else{
                                        output+='<span class="text-success">'+parseInt(response[3][0]["total"] - response[2][0]["total"])+'</span>'
                                    }
                                    output+='</h4></th>\
                                </tr>'
                    $('#example3 tbody').html(output)

                    
                }
                }  
                }
            });
        })
    });

$(document).on('click', '#reset-btn', ()=>{
        location.reload()
        });
      $.ajax({
            type: "get",
            url: "{{route('manage_pnl_data')}}",
            dataType: 'json',
            success: function (response) {
                if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response[1].length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[1][i]["pay_date"]+'</td>';
                        output += '<td>'+response[1][i]["title"]+'</td>';
                        output += '<td>'+response[1][i]["desc"]+'</td>';
                        output += '<td>'+response[1][i]["amount"]+'</td>';
                        output += '</tr>';
                    }
                     output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Expenses: '+response[2][0]["total"]+'</h4></th>\
                                </tr>'
                    output +='\
                                <tr>\
                                    <th style="padding: 22px 15px !important" colspan="5" class="bg-light">Sales</th>\
                                </tr>\
                                <tr><th style="padding: 22px 15px !important">#</th>\
                                    <th style="padding: 22px 15px !important">Date</th>\
                                    <th style="padding: 22px 15px !important">Sales Particulars</th>\
                                    <th style="padding: 22px 15px !important"s>Amount</th>\
                                </tr>\
                            '
                    for(var i = 0; i < response[0].length; i++){
                        output += '<tr>';
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[0][i]["pay_date"]+'</td>';
                        output += '<td>'+response[0][i]["customer_name"]+' Invoice</td>';
                        output += '<td colspan="2">'+response[0][i]["net_total"]+'</td>';
                        output += '</tr>';
                    }
                    
                    output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Sales: '+response[3][0]["total"]+'</h4></th>\
                                </tr>'
                     output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Profit/Loss: '
                                    if(parseInt(response[3][0]["total"] - response[2][0]["total"]) <= 0){
                                        output+= '<span class="text-danger">'+parseInt(response[3][0]["total"] - response[2][0]["total"])+' <i class="fa fa-long-arrow-down text-danger" aria-hidden="true"></i></span>'
                                    }
                                    else{
                                        output+=   '<span class="text-success"> +'+parseInt(response[3][0]["total"] - response[2][0]["total"])+' <i class="fa fa-long-arrow-up text-success" aria-hidden="true"></i></span>'
                                    }
                                    output+=  '</h4></th>\
                                </tr>'
                    $('#example3 tbody').html(output)
 
                    
                }
                }
            }
        });
      
    $(document).on('submit', '#customer-form', (e)=>{
        e.preventDefault();
       let val = document.getElementById('daterange').value;
       var n = val.split(' - ');
       tin_0 = n[0].split('/')
       var tin = tin_0[2]+'-'+tin_0[0]+'-'+tin_0[1];
       tout_0 = n[1].split('/')
       var tout = tout_0[2]+'-'+tout_0[0]+'-'+tout_0[1];
       var value = {
           t_in : tin,
           t_out : tout,
       }
    //    console.log(tout);

       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
        $.ajax({
            type: "get",
            url: "{{route('manage_pnl_data')}}",
            data: value,
            success: function (response) {
                if(response){
                    var output="";
                    for(var i = 0; i < response[1].length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[1][i]["pay_date"]+'</td>';
                        output += '<td>'+response[1][i]["title"]+'</td>';
                        output += '<td>'+response[1][i]["desc"]+'</td>';
                        output += '<td>'+response[1][i]["amount"]+'</td>';
                        output += '</tr>';
                    }
                    output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Expenses: '+response[2][0]["total"]+'</h4></th>\
                                </tr>'
                    output +='\
                                <tr>\
                                    <th style="padding: 22px 15px !important" colspan="5" class="bg-light">Sales</th>\
                                </tr>\
                                <tr><th style="padding: 22px 15px !important">#</th>\
                                    <th style="padding: 22px 15px !important">Date</th>\
                                    <th style="padding: 22px 15px !important">Sales Particulars</th>\
                                    <th style="padding: 22px 15px !important"s>Amount</th>\
                                </tr>\
                            '
                    for(var i = 0; i < response[0].length; i++){
                        output += '<tr>';
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[0][i]["pay_date"]+'</td>';
                        output += '<td>'+response[0][i]["customer_name"]+' Invoice</td>';
                        output += '<td colspan="2">'+response[0][i]["net_total"]+'</td>';
                        output += '</tr>';
                    }
                    
                    output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Sales: '+response[3][0]["total"]+'</h4></th>\
                                </tr>'
                                output+='<tr>\
                                    <th colspan="3"></th>\
                                    <th colspan="2" class="bg-light" style="padding: 22px 15px !important"><h4>Total Profit/Loss: '
                                    if(parseInt(response[3][0]["total"] - response[2][0]["total"]) <= 0){
                                        output+=  '<span class="text-danger">'+parseInt(response[3][0]["total"] - response[2][0]["total"])+' <i class="fa fa-long-arrow-down text-danger" aria-hidden="true"></i></span>'
                                    }
                                    else{
                                        output+=   '<span class="text-success"> +'+parseInt(response[3][0]["total"] - response[2][0]["total"])+' <i class="fa fa-long-arrow-up text-success" aria-hidden="true"></i></span>'
                                    }
                                    output+= '</h4></th>\
                                </tr>'
                    
                    $('#example3 tbody').html(output)

                    
                }
            }
        });
    })
</script>



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
                <div class="card-body">
                    <div class="row mb-3 ie-section">
                        <div class="col-md-3">
                            <form action="" method="get" id="customer-form">
                             <div class="input-group example mb-3">
                                 @csrf
                                 <input type="text" class="form-control input-daterange-datepicker border-light" required id="daterange" >
                                 <div class="input-group-append">
                                     <button class="btn btn-outline-light btn-sm" id="reset-btn">Reset</button>
                                   <button class="btn btn-outline-light btn-sm" id="submit-btn" type="submit">Submit</button>
                                 </div>
                               </div>
                            </form>
                         </div>
                         <div class="col-md-3">
                             
                         </div>
                         <div class="col-md-3"></div>
                        <div class="col-md-3 ">
                           
                        </div>  
                    </div>
                    <div class="table-responsive table-bordered">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
                                    <th colspan="5" class="bg-light">Expenses</th>
                                </tr>
                                <tr><th>#</th>
                                    <th>Date</th>
                                    <th>Expenses Particulars</th>
                                    <th>Expense type</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection