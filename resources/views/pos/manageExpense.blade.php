{{-- Extends layout --}}
@extends('layout.default')



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
                        <div class="col-md-9"></div>
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
                                <tr>
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
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->desc}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->quan}}</td>
                                    <td>{{$data->disc}}</td>
                                    <td>{{$data->tax}}</td>
                                    <td>{{$data->net}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{url('editExpense/'.$data->id)}}" id="editExpense" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="deleteExpense/{{$data->id}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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