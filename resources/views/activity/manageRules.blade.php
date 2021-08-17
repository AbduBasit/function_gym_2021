{{-- Extends layout --}}
@extends('layout.default')
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Activity</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Rules</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Note!</strong> You can't Create and Delete the rules but all rules are editable, if you want to add some other rules so contact your <a href="#" class="text-primary">Developer</a>.
    </div>

    <script>
        $(".alert").alert();
    </script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Customers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-md-responsive">
                            <thead>
                                <tr>
                                    <th class="width80"><strong>#</strong></th>
                                    <th><strong>Rules</strong></th>
                                    <th><strong>Description</strong></th>
                                    <th><strong>Module Use</strong></th>
                                    <th><strong>Values</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->rules}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->module_use}}</td>
                                    <td>{{$data->values}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                                    </g>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="update_rule_show/{{$data->id}}">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection