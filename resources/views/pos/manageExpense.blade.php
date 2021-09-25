{{-- Extends layout --}}
@extends('layout.default')
<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
          
        $('#fees_payable').on('change',()=>{
            let filter_fees = document.getElementById('fees_payable').value;
            var value = {
                filter_fees:filter_fees
            }
            // console.log(value);
            $.ajax({
                type: "get",
                url: "{{route('manage_expense_data')}}",
                data: value,
                success: function (response) {
                    if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["pay_date"]+'</td>';
                        output += '<td>'+response[i]["title"]+'</td>';
                        output += '<td>'+response[i]["desc"]+'</td>';
                        output += '<td>'+response[i]["amount"]+'</td>';
                        output += '<td>'+response[i]["quan"]+'</td>';
                        if(response[i]["disc"]==null){
                            output += '<td class=""> No Discount </td>';
                        }
                        else{
                            output += '<td>'+response[i]["disc"]+'</td>';
                        }
                        if(response[i]["tax"]==null){
                            output += '<td class=""> No Tax </td>';
                        }
                        else{
                            output += '<td>'+response[i]["tax"]+'</td>';
                        }
                        output += '<td><b>'+response[i]["net"]+'.00</b></td>';
                        
                        
                            output+= '<td>\
                                        <div class="d-flex">\
                                            <a href="editExpense/'+response[i]["id"]+'" id="editExpense" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>\
                                            <a data-toggle="modal" data-target="#deleteExpense'+response[i]["id"]+'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>\
                                        </div>\
                                        <div class="modal mt-5 fade" id="deleteExpense'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
                                            <div class="modal-dialog" role="document">\
                                                <div class="modal-content">\
                                                    <div class="modal-header">\
                                                        <h5 class="modal-title">Confirmation</h5>\
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                                                                <span aria-hidden="true">&times;</span>\
                                                            </button>\
                                                    </div>\
                                                    <div class="modal-body text-center pt-5">\
                                                        <h2 class="mt-3">Are you sure to delete ?</h2>\
                                                    </div>\
                                                    <div class="modal-footer">\
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>\
                                                        <a href="deleteExpense/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </td>'
                        
                        output += '</tr>';
                    }
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
            url: "{{route('manage_expense_data')}}",
            dataType: 'json',
            success: function (response) {
                if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["pay_date"]+'</td>';
                        output += '<td>'+response[i]["title"]+'</td>';
                        output += '<td>'+response[i]["desc"]+'</td>';
                        output += '<td>'+response[i]["amount"]+'</td>';
                        output += '<td>'+response[i]["quan"]+'</td>';
                        if(response[i]["disc"]==null){
                            output += '<td class=""> No Discount </td>';
                        }
                        else{
                            output += '<td>'+response[i]["disc"]+'</td>';
                        }
                        if(response[i]["tax"]==null){
                            output += '<td class=""> No Discount </td>';
                        }
                        else{
                            output += '<td>'+response[i]["tax"]+'</td>';
                        }
                        output += '<td><b>'+response[i]["net"]+'.00</b></td>';
                        
                            output+= '<td>\
                                        <div class="d-flex">\
                                            <a href="editExpense/'+response[i]["id"]+'" id="editExpense" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>\
                                            <a data-toggle="modal" data-target="#deleteExpense'+response[i]["id"]+'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>\
                                        </div>\
                                        <div class="modal mt-5 fade" id="deleteExpense'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
                                            <div class="modal-dialog" role="document">\
                                                <div class="modal-content">\
                                                    <div class="modal-header">\
                                                        <h5 class="modal-title">Confirmation</h5>\
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                                                                <span aria-hidden="true">&times;</span>\
                                                            </button>\
                                                    </div>\
                                                    <div class="modal-body text-center pt-5">\
                                                        <h2 class="mt-3">Are you sure to delete ?</h2>\
                                                    </div>\
                                                    <div class="modal-footer">\
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>\
                                                        <a href="deleteExpense/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </td>'
                        
                        output += '</tr>';
                    }
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
            url: "{{route('manage_expense_data')}}",
            data: value,
            success: function (response) {
                if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["pay_date"]+'</td>';
                        output += '<td>'+response[i]["title"]+'</td>';
                        output += '<td>'+response[i]["desc"]+'</td>';
                        output += '<td>'+response[i]["amount"]+'</td>';
                        output += '<td>'+response[i]["quan"]+'</td>';
                        if(response[i]["disc"]==null){
                            output += '<td class=""> No Discount </td>';
                        }
                        else{
                            output += '<td>'+response[i]["disc"]+'</td>';
                        }
                        if(response[i]["tax"]==null){
                            output += '<td class=""> No Discount </td>';
                        }
                        else{
                            output += '<td>'+response[i]["tax"]+'</td>';
                        }
                        output += '<td><b>'+response[i]["net"]+'.00</b></td>';
                        
                            output+= '<td>\
                                        <div class="d-flex">\
                                            <a href="editExpense/'+response[i]["id"]+'" id="editExpense" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>\
                                            <a data-toggle="modal" data-target="#deleteExpense'+response[i]["id"]+'" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>\
                                        </div>\
                                        <div class="modal mt-5 fade" id="deleteExpense'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
                                            <div class="modal-dialog" role="document">\
                                                <div class="modal-content">\
                                                    <div class="modal-header">\
                                                        <h5 class="modal-title">Confirmation</h5>\
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                                                                <span aria-hidden="true">&times;</span>\
                                                            </button>\
                                                    </div>\
                                                    <div class="modal-body text-center pt-5">\
                                                        <h2 class="mt-3">Are you sure to delete ?</h2>\
                                                    </div>\
                                                    <div class="modal-footer">\
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>\
                                                        <a href="deleteExpense/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </td>'
                        
                        output += '</tr>';
                    }
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
                <div class="card-header">
                    <a href="{{url('create-expense')}}" class="btn btn-outline-primary btn-md">+ Create New</a>
                </div>
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
                           <div class="mr-md-3 text-right">
                            <button class="btn btn-outline-light btn-sm" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                Export <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{url('expense-export/expense_xlsx')}}">Export to Excel (.xlsx) </a>
                                <a class="dropdown-item" href="{{url('expense-export/expense_csv')}}">Export to CSV (.csv)</a>
                            </div>
                                <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#trainer_import">
                                    Import <i class="fa fa-sign-in" aria-hidden="true"></i>
                                </button>    
                               
                           </div>
                        </div>  
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="trainer_import" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import CSV</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('expense-imp')}}" enctype="multipart/form-data" method="POST" class="dropzone">
                                        @csrf
                                        <div class="fallback">
                                            <input name="file_expense" type="file"/>
                                        </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr><th>#</th>
                                    <th>Date</th>
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
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection