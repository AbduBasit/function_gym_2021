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
                 url: "{{route('user_data')}}",
                data: value,
                success: function (response) {
                    if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["name"]+'</td>';
                        output += '<td>'+response[i]["email"]+'</td>';
                        output += '<td>'+response[i]["phone"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["roles"]+'</td>';
                        output += '<td>'+response[i]["t_in"]+'</td>';
                        output += '<td>'+response[i]["t_out"]+'</td>';
                        if("{{session()->has('adminUser')}}"){
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
                                                <a class="dropdown-item" href="user-edit/'+response[i]["id"]+'">Edit</a>\
                                                <a class="dropdown-item" data-target="#user-delete'+response[i]["id"]+'" data-toggle="modal">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="user-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="user-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
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
             url: "{{route('user_data')}}",
            dataType: 'json',
            success: function (response) {
                if(response){
                    if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["name"]+'</td>';
                        output += '<td>'+response[i]["email"]+'</td>';
                        output += '<td>'+response[i]["phone"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["roles"]+'</td>';
                        output += '<td>'+response[i]["t_in"]+'</td>';
                        output += '<td>'+response[i]["t_out"]+'</td>';
                        if("{{session()->has('adminUser')}}"){
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
                                                <a class="dropdown-item" href="user-edit/'+response[i]["id"]+'">Edit</a>\
                                                <a class="dropdown-item" data-target="#user-delete'+response[i]["id"]+'" data-toggle="modal">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="user-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="user-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
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
             url: "{{route('user_data')}}",
            data: value,
            success: function (response) {
                if(response){
                    var output="";
                    for(var i = 0; i < response.length; i++){
                        output += '<tr><td>'+[i+1]+'</td>';
                        output += '<td>'+response[i]["name"]+'</td>';
                        output += '<td>'+response[i]["email"]+'</td>';
                        output += '<td>'+response[i]["phone"]+'</td>';
                        output += '<td>'+response[i]["address"]+'</td>';
                        output += '<td>'+response[i]["roles"]+'</td>';
                        output += '<td>'+response[i]["t_in"]+'</td>';
                        output += '<td>'+response[i]["t_out"]+'</td>';
                        if("{{session()->has('adminUser')}}"){
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
                                                <a class="dropdown-item" href="user-edit/'+response[i]["id"]+'">Edit</a>\
                                                <a class="dropdown-item" data-target="#user-delete'+response[i]["id"]+'" data-toggle="modal">Delete</a>\
                                            </div>\
                                            <div class="modal mt-5 fade" id="user-delete'+response[i]["id"]+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">\
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
                                                        <a href="user-delete/'+response[i]["id"]+'" class="btn btn-danger"><i class="fa fa-check" aria-hidden="true"></i> Delete</a>\
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
<style>
    .anchor_link {
        color: rgb(25, 68, 255) !important;
    }

    .anchor_link:hover {
        color: rgb(5, 42, 209) !important;
    }
</style>


{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Users</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Users</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md-responsive" id="example3">
                            <thead>
                                <tr>
                                    <th class="width80"><strong>#</strong></th>
                                    <th><strong>User Name</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Phone Number</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>Roles</strong></th>
                                    <th><strong>Timing In</strong></th>
                                    <th><strong>Timing Out</strong></th>
                                    @if (session()->has('adminUser'))
                                        <th><strong>Action</strong></th>
                                    @endif
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