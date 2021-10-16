{{-- Extends layout --}}
@extends('layout.default')
{{-- Content --}}
@section('content')

    <style>
        .select2-container .select2-selection--multiple {
            border: 1px solid #1B75BC !important;
            border-radius: 0px !important;
            height: 50px !important;
            padding-top: 5px !important;
        }
        .loader{
            position: absolute;
            z-index: 999;
            left: 0;
            right: 0;
            margin: 0 auto !important;
            top: 10em;
            display: none;
        }
        .advance{
            display: none;
        }
        .dropdown.bootstrap-select.show-tick.select2-with-label-multiple.border-primary{
            border: 1px solid #1B75BC !important;
            width: 100% !important;
        }
        
    </style>

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Compose</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="mail">
                            <form id="email">

                                <div class="compose-content" style="position: relative">
                                    <img src="{{asset('loader/loader.gif')}}" alt="" class="loader">
                                   
                                    <div class="form-group basic">
                                        <div class="row text-right"><a id="advance" class="text-primary ml-auto mr-3 mb-3">Advance Options</a></div>
                                        <select id="to" class="multi-select border-primary" name="emails[]"
                                            multiple="multiple">
                                            @foreach ($data as $item)
                                                <option value="{{ $item->email }}">{{ $item->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group advance">
                                        <div class="row text-right"><a id="basic" class="text-primary ml-auto mr-3 mb-3">Hide Advance Options</a></div>
                                        <select id="to" class="select2-with-label-multiple border-primary" name="emails[]"
                                            multiple="multiple">
                                            <option hidden>Select Options</option>
                                            <option value="all">All</option>
                                            <option value="customer">All Customer</option>
                                            <option value="trainer">All Trainer</option>
                                            <option value="user">All User</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="sub" class="form-control border-primary"
                                            placeholder=" Subject:">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="message" class="textarea_editor form-control border-primary" rows="15"
                                            placeholder="Enter text ..."></textarea>
                                    </div>


                                </div>
                                <div class="text-left mt-4 mb-5">
                                    <button type="submit" class="btn btn-primary btn-sl-sm mr-2" id="send"><span
                                            class="mr-2"><i class="fa fa-paper-plane"></i></span>Send</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="{{ asset('./js/jquery.js') }}"></script>
    <script>
            
            $(document).ready(function () {
            $('.multi-select').select2();   
                $('#advance').on('click',(e)=>{
                    e.preventDefault()
                    $('.multi-select-1').select2();  
                    $('.basic').hide();
                    $('.advance').show();
                    
                })
                $('#basic').on('click',()=>{
                    $('.advance').hide();
                    $('.basic').show();
                })
           
            jQuery(document).on('submit', '#email', function(e) {

                var subject = document.getElementById('sub').value;
            var message = document.getElementById('message').value;
            var selectedValues = $('select[name="emails[]"] option:selected');
            var allVal = document.getElementById('to').value;
            
            var user=null;
            var trainer=null;
            var customer=null;
            e.preventDefault();  
            
            
            function groupMail(){
                for(i=0; i<selectedValues.length; i++){
                    if($(selectedValues[i]).val()=="user"){
                user = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($user_email)}}")).replace(/&quot;/g,'"'))
                }
                if($(selectedValues[i]).val()=="customer"){
                    customer = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($data)}}")).replace(/&quot;/g,'"'))
                }
                if($(selectedValues[i]).val()=="trainer"){
                    trainer = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($trainer)}}")).replace(/&quot;/g,'"'))
                }
                var emails = [user, trainer, customer];
                emails = $.grep(emails,function(n){ return n == 0 || n });
                }
                
                emails.forEach(element => {
                    element.forEach(data => {
                        var values = {
                            subject: [subject],
                            message: [message],
                        };

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        jQuery.ajax({
                            type: "post",
                            url: "{{ route('send_mail') }}",
                            data: {
                                values: values,
                                email_value: data.email
                            },
                            success: function(response) {
                                
                            }
                        });
                    });
                });
            }
       
            if($('#to').val()=="all,"){
                alert('You have select All Option');
            }
            if($('#to').val()=="all"){
                $(document).children('option').attr('disabled', true);
                user = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($user_email)}}")).replace(/&quot;/g,'"'))
                trainer = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($trainer)}}")).replace(/&quot;/g,'"'))
                customer = JSON.parse(JSON.parse(JSON.stringify("{{json_encode($data)}}")).replace(/&quot;/g,'"'))
                var emails = [user, trainer, customer];
                sendEmailbulk(emails);
            }
            function sendEmailbulk(emails){
                 emails.forEach(element => {
                     element.forEach(data => {
                        var values = {
                            subject: [subject],
                            message: [message],
                        };

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        jQuery.ajax({
                            type: "post",
                            url: "{{ route('send_mail') }}",
                            data: {
                                values: values,
                                email_value: data.email
                            },
                            success: function(response) {
                                
                            }
                        });
                     });
                 });
            }
            
            for (i = 0; i < selectedValues.length; i++) {
                emails = selectedValues[i];
                emailsData = [emails.value];

                if(emailsData[0]=="user" || emailsData[0]=="customer" || emailsData[0]=="trainer"){
                    groupMail();
                    break;
                }
                var values = {
                    subject: [subject],
                    message: [message],
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    type: "post",
                    url: "{{ route('send_mail') }}",
                    data: {
                        values: values,
                        email_value: emails.value
                    },
                    success: function(response) {

                    }
                });
            }
            
            
        
        });
        });
    </script>
@endsection
