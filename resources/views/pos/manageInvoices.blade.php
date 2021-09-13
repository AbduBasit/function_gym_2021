{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Invoices</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Manage Invoices</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Invoices</h4>
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
                                    <a class="dropdown-item" href="{{url('invoice-export/invoice_xlsx')}}">Export to Excel (.xlsx) </a>
                                    <a class="dropdown-item" href="{{url('invoice-export/invoice_csv')}}">Export to CSV (.csv)</a>
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
                                        <form action="{{route('invoice-imp')}}" enctype="multipart/form-data" method="POST" class="dropzone">
                                            @csrf
                                            <div class="fallback">
                                                <input name="file_invoice" type="file"/>
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
                            <table class="table table-sm-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th class="width80"><strong>#</strong></th>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Phone</strong></th>
                                        <th><strong>Payment Type</strong></th>
                                        <th><strong>Payment Date</strong></th>
                                        <th><strong>Amount</strong></th>
                                        <th><strong>Discount</strong></th>
                                        <th><strong>Fees Payable</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->id }}</td>
                                            <td>{{ $member->customer_name }}</td>
                                            <td>{{ $member->customer_phone }}</td>
                                            <td>{{ $member->payment_method }}</td>
                                            <td>{{ $member->pay_date }}</td>
                                            <td>{{ $member->net_total }}</td>
                                            <td>{{ $member->discount }}</td>
                                            <td class="text-success">
                                                {{ $member->fees_payable }}
                                            </td>


                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-info light sharp"
                                                        data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{url('invoice/'.$member->id )}}">Check Invoice</a>
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
