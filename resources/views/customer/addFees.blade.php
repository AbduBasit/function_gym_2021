{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<style>
    .new-input {
        height: 40px !important;
    }
</style>
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Finance</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Expenses</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Expenses</h4>
                </div>
                <div class="card-body">


                    <form id="new" action="{{route('expense-add')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Enter Total of Months</label>
                                    <input type="number" disabled name="id" class="disable form-control">
                                </div>
                            </div>

                            <div class="col-lg-3 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Due Fees*</label>
                                    <select name="fees_status" class="form-control form-control-lg" required>
                                        <option hidden>Select status</option>
                                        <option value="All Clear">All Clear</option>
                                        <option value="Unpaid">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Enter Total of Months</label>
                                    <input type="date" required name="advance_month" id="t-months" placeholder="10" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">discount</label>
                                    <input type="number" min="0" name="discount" id="t-discount" placeholder="10" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Total Amount</label>
                                    <input type="text" name="avance_total" placeholder="0" id="t-amount" disabled class="disable form-control">
                                </div>
                            </div>
                        </div>

                        </table>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="btn-group ml-auto">
                        <button type="submit" id="save" class="btn btn-outline-info shadow btn-md mr-1"> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>


@endsection