{{-- Extends layout --}}
@extends('layout.default')
<style>
    table button.btn.dropdown-toggle.btn-light{
    border: 1px solid #1B75BC !important;
    }
</style>
<script src="{{ asset('./js/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        $('tr').find('.dataPut select').each((i)=>{
            $(this).find('.dataAjax'+i+'').on('change', (e)=>{
                let val = $('.dataAjax'+i+' select').val()
                var value = {val:val}
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type: "post",
                    url: "{{route('status_change_customer')}}",
                    data: value,
                    success: function (response) {
                        if(response==1){
                            location.reload();
                        }
                        else{
                            console.log(response);
                        }
                    }
                });
            })
        })
        $('#fees_payable').on('change',()=>{
            let filter_fees = document.getElementById('fees_payable').value;
            var value = {
                filter_fees:filter_fees
            }
            // console.log(value);
            $.ajax({
                type: "get",
                url: "{{route('manage_data')}}",
                data: value,
                success: function (response) {
                    if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["first_name"] + ' ' +response[i]["last_name"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["date_of_birth"]+'</td>';
                        output += '<td>'+response[i]["date_of_joining"]+'</td>';
                        output += '<td>'+response[i]["training_type"]+'</td>';
                        output += '<td>'+response[i]["trainer_name"]+'</td>';
                        if(response[i]["status"]=="active"){
                            output += '<td>'+response[i]["status"]+'</td>';
                        }
                        else{
                            output += '<td class="dataPut">\
                                        <select class="form-control" onchange="dataPut('+response[i]['id']+')" id="dropdown">\
                                            <option value="inactive">inactive</option>\
                                            <option value="active">active</option>\
                                        </select>\
                                        </div>\
                            </td>'
                        }
                       
                        if(response[i]["fees_clear"]=="All Clear"){
                            output += '<td class="text-success"> All Clear </td>';
                        }
                        else if(response[i]["fees_clear"]=="Unpaid"){
                            if(response[i]["status"]=="active"){
                                   output += '<td class="text-success"> <a href="add_fees/'+response[i]["id"]+'" class="text-danger">Unpaid</a></td>'
                            }
                            else{
                                   output += '<td class="text-success"> <a class="text-mute mute">Unpaid</a></td>'
                            }
                        }

                        if(response[i]["trainer_name"]==null || response[i]["trainer_name"] == "Select Trainer"){
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-delete/'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                        </div>\
                                    </td>'
                        }
                        else{
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-edit-pt/'+response[i]["id"]+'">Edit PT Information</a>\
                                                <a data-toggle="modal" class="dropdown-item" data-target="#customer-delete'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="customer-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="customer-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        </div>\
                                    </td>'
                        }
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
            url: "{{route('manage_data')}}",
            dataType: 'json',
            success: function (response) {
                if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["first_name"] + ' ' +response[i]["last_name"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["date_of_birth"]+'</td>';
                        output += '<td>'+response[i]["date_of_joining"]+'</td>';
                        output += '<td>'+response[i]["training_type"]+'</td>';
                        output += '<td>'+response[i]["trainer_name"]+'</td>';
                        if(response[i]["status"]=="active"){
                            output += '<td>'+response[i]["status"]+'</td>';
                        }
                        else{
                            output += '<td class="dataPut">\
                                        <select class="form-control" onchange="dataPut('+response[i]['id']+')" id="dropdown">\
                                            <option value="inactive">inactive</option>\
                                            <option value="active">active</option>\
                                        </select>\
                                        </div>\
                            </td>'
                        }
                       
                        if(response[i]["fees_clear"]=="All Clear"){
                            output += '<td class="text-success"> All Clear </td>';
                        }
                        else if(response[i]["fees_clear"]=="Unpaid"){
                            if(response[i]["status"]=="active"){
                                   output += '<td class="text-success"> <a href="add_fees/'+response[i]["id"]+'" class="text-danger">Unpaid</a></td>'
                            }
                            else{
                                   output += '<td class="text-success"> <a class="text-mute mute">Unpaid</a></td>'
                            }
                        }

                        if(response[i]["trainer_name"]==null || response[i]["trainer_name"] == "Select Trainer"){
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-delete/'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                        </div>\
                                    </td>'
                        }
                        else{
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-edit-pt/'+response[i]["id"]+'">Edit PT Information</a>\
                                                <a data-toggle="modal" class="dropdown-item" data-target="#customer-delete'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="customer-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="customer-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        </div>\
                                    </td>'
                        }
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
            url: "{{route('manage_data')}}",
            data: value,
            success: function (response) {
                if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["first_name"] + ' ' +response[i]["last_name"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["date_of_birth"]+'</td>';
                        output += '<td>'+response[i]["date_of_joining"]+'</td>';
                        output += '<td>'+response[i]["training_type"]+'</td>';
                        output += '<td>'+response[i]["trainer_name"]+'</td>';
                        if(response[i]["status"]=="active"){
                            output += '<td>'+response[i]["status"]+'</td>';
                        }
                        else{
                            output += '<td class="dataPut">\
                                        <select class="form-control" onchange="dataPut('+response[i]['id']+')" id="dropdown">\
                                            <option value="inactive">inactive</option>\
                                            <option value="active">active</option>\
                                        </select>\
                                        </div>\
                            </td>'
                        }
                       
                        if(response[i]["fees_clear"]=="All Clear"){
                            output += '<td class="text-success"> All Clear </td>';
                        }
                        else if(response[i]["fees_clear"]=="Unpaid"){
                            if(response[i]["status"]=="active"){
                                   output += '<td class="text-success"> <a href="add_fees/'+response[i]["id"]+'" class="text-danger">Unpaid</a></td>'
                            }
                            else{
                                   output += '<td class="text-success"> <a class="text-mute mute">Unpaid</a></td>'
                            }
                        }

                        if(response[i]["trainer_name"]==null || response[i]["trainer_name"] == "Select Trainer"){
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-delete/'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                        </div>\
                                    </td>'
                        }
                        else{
                            output+= '<td>\
                                        <div class="dropdown">\
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">\
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">\
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                        <rect x="0" y="0" width="24" height="24" />\
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />\
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />\
                                                    </g>\
                                                </svg>\
                                            </button>\
                                            <div class="dropdown-menu">\
                                                <a class="dropdown-item" href="customer-view/'+response[i]["id"]+'">View</a>\
                                                <a class="dropdown-item" href="customer-edit/'+response[i]["id"]+'">Edit Basic Information</a>\
                                                <a class="dropdown-item" href="customer-edit-pt/'+response[i]["id"]+'">Edit PT Information</a>\
                                                <a data-toggle="modal" class="dropdown-item" data-target="#customer-delete'+response[i]["id"]+'">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="customer-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="customer-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        </div>\
                                    </td>'
                        }
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Customers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Customers</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Customers</h4>
                </div>
                <div class="card-body">
                
                    <div class="row mb-3 ie-section">
                        <div class="col-md-12 mb-3">
                            <a class="btn btn-outline-primary btn-md" href="{{url('create-customer')}}" >Create New +</a>
                        </div>
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
                            <div class="form-group">
                              <select class="form-control border-light" id="fees_payable">
                                <option hidden>Fees Payable</option>
                                <option value="Unpaid">Unpaid</option>
                                <option value="All Clear">All Clear</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        
                        <div class="col-md-3 ">
                           <div class="mr-md-3 text-right">
                            <button class="btn btn-outline-light btn-sm" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                Export <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{url('customer-export/customer_xlsx')}}">Export to Excel (.xlsx) </a>
                                <a class="dropdown-item" href="{{url('customer-export/customer_csv')}}">Export to CSV (.csv)</a>
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
                                    <form action="{{route('customer-imp')}}" enctype="multipart/form-data" method="POST" class="dropzone">
                                        @csrf
                                        <div class="fallback">
                                            <input name="file_customer" type="file"/>
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
                        <table id="example3" class="display min-w850 table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="width80"><strong>#</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>D.O.B</strong></th>
                                    <th><strong>Joining Date</strong></th>
                                    <th><strong>Training Type</strong></th>
                                    <th><strong>Trainer Name</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Fees Payable</strong></th>
                                    <th><strong>Action</strong></th>
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