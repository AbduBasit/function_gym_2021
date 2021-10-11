{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Expenses Category</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-outline-primary btn-md" type="button" data-toggle="modal"
                            data-target="#modelId">+ Create New</button>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal bd-example-modal-lg fade" id="modelId" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="expense_cat_create" method="POST">
                                <div class="modal-dialog model-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="model-title">Add Expense Category</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @csrf
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Category Name</label>
                                                        <input type="text" class="form-control" name="catname" id=""
                                                            placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Category Description</label>
                                                        <input type="text" class="form-control" name="catdesc">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                        <div class="table-md-responsive table-hover">
                            <table class="table">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        @if (session()->has('adminUser'))
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->expense_title }}</td>
                                            <td>{{ $item->expense_description }}</td>
                                            @if (session()->has('adminUser'))
                                            <td class="text-right"><a class="btn btn-danger btn-sm sharp"
                                                href="{{ url('cat_delete/' . $item->id) }}"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></a>
                                             </td>
                                            @endif
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
