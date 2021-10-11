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

                                <div class="compose-content">




                                    <div class="form-group">
                                        <select id="to" class="multi-select border-primary" name="emails[]"
                                            multiple="multiple">
                                            @foreach ($data as $item)
                                            <option value="all">All</option>
                                            <option value="customer">All Customer</option>
                                            <option value="trainer">All Trainer</option>
                                            <option value="user">All User</option>
                                                <option value="{{ $item->email }}">{{ $item->email }}</option>

                                            @endforeach
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
        jQuery(document).on('submit', '#email', function(e) {
            e.preventDefault();
            // let to = document.getElementById('to').value;
            let subject = document.getElementById('sub').value;
            let message = document.getElementById('message').value;
            let selectedValues = $('select[name="emails[]"] option:selected');
            let allVal = document.getElementById('to').value;
            let emails = null;

            function massMail(mass){
                for (i = 0; i < mass.length; i++) {
                emails = mass[i];
                emailsData = [emails.value];
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
                        emails: emails.value
                    },
                    success: function(response) {
                        if (response) {
                            alert(response);
                        }
                    }
                });
            }
            }
            
            for (i = 0; i < selectedValues.length; i++) {
                emails = selectedValues[i];
                emailsData = [emails.value];
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
                        emails: emails.value
                    },
                    success: function(response) {
                        if (response) {
                            alert(response);
                        }
                    }
                });
            }
        });
    </script>
@endsection
