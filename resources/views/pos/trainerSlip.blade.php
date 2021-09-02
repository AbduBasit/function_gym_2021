{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Trainer Pay Slip</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th><strong>Trainer Name</strong></th>
                                        <th><strong>Net Salary</strong></th>
                                        <th><strong>Salary of Month</strong></th>
                                        <th><strong>Salary Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $trainer)
                                        <tr>

                                            <td>{{ $trainer->customer_name }}</td>
                                            <td>{{ round((($trainer->gym_fees * $trainer->commision) / 100) * $trainer->total_session + $trainer->fixed_salary + $trainer->trainer_fees_per_session + $trainer->registration_fees) }}
                                            </td>
                                            <td>July</td>
                                            <td>clear</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
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
                                                            href="{{ url('payslip/' . $trainer->trainer_id) }}">Details</a>
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
