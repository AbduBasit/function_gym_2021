{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
@if(session('user'))
<div class="alert alert-success" role="alert">
    <strong>Success! </strong>Data Inserted Successfully.
</div>

@elseif(session('error'))
<div class="alert alert-success" role="alert">
    <strong>Error! </strong>Something went wrong!.
</div>

@endif

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Activity</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Rules</a></li>
            <li class="breadcrumb-item active"><a href="create-trainer">Update Rules</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Update Rules</h4>
                </div>
                <div class="card-body h-100">
                    <form action="/update_rule" method="POST">


                        <div>
                            @csrf
                            <input type="text" value="{{$datas->id}}" name="id" hidden>
                            <section class="pl-2 pr-2">

                                <div class="row">

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Rules*</label>
                                            <input type="text" name="rules" value="{{$datas->rules}}" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Description*</label>
                                            <input type="text" name="description" value="{{$datas->description}}" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Module Use</label>
                                            <input type="text" value="{{$datas->module_use}}" disabled class="form-control disable">
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Value</label>
                                            <input type="text" name="values" value="{{$datas->values}}" class="form-control" required>
                                        </div>
                                    </div>

                                </div>



                            </section>
                            <div class="row float-right mr-3 mt-5">
                                <button type="submit" class="btn btn-primary dark">Update Rule</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection