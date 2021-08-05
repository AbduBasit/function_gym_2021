{{-- Extends layout --}}
@extends('layout.fullwidth')

{{-- Content --}}
@section('content')
{{$error=null}}
<div class="col-md-6">
    @if($error!=null)
    <div class="alert alert-danger" role="alert">
        <strong>{{$error}}</strong>
    </div>
    @endif
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <h4 class="text-center mb-4">Sign in your account</h4>
                    <form action="login_process" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" placeholder="hello@example.com" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Password</strong></label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection