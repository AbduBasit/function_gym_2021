{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

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
                                    
                                    <div class="compose-content">
                                        
                                            <div class="form-group">
                                                <input type="email" id="to" class="form-control border-primary" required placeholder=" To:">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="sub" class="form-control required border-primary" placeholder=" Subject:">
                                            </div>
                                            <div class="form-group">
                                                <textarea id="message" required class="textarea_editor form-control border-primary" rows="15" placeholder="Enter text ..."></textarea>
                                            </div>
                                        
                                        
                                            </div>
                                            <div class="text-left mt-4 mb-5">
                                                <button type="submit" class="btn btn-primary btn-sl-sm mr-2" id="send" ><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                                                
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
                
                    jQuery(document).on('submit', '#email', function(e){
                        e.preventDefault();
                        let to = document.getElementById('to').value;
                        let subject = document.getElementById('sub').value;
                        let message = document.getElementById('message').value;
                        var values = {
                        to:[to],
                        subject:[subject],
                        message:[message],
                    };
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                       jQuery.ajax({
                           type: "post",
                           url: "{{ route('send_mail')}}",
                           data: values,
                           success:function(response){
                                console.log(response)   
                           }
                       });
                        
                    });
               
            </script>
@endsection