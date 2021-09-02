{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <style>
        .new-input {
            height: 40px !important;
        }

        .bootstrap-select .btn,
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            border: 1px solid #1B75BC !important;
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
                        <div class="table-responsive">
                            <table class="table table-md-responsive">
                                <thead>
                                    <tr>
                                        <th><strong>Particular</strong></th>

                                        <th><strong>Expense Type</strong></th>
                                        <th><strong>Amount</strong></th>
                                        <th><strong>Quantity</strong></th>
                                        <th><strong>Discount</strong></th>
                                        <th><strong>Tax %</strong></th>
                                        <th><strong>Net Amount</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <form id="new" action="{{ route('expense-add') }}" method="POST">
                                    <tbody class="report">
                                        <tr id="row-sec">
                                            @csrf
                                            <td> <input type="text" name="exp_add[0][exp_title]" required
                                                    class="form-control border-primary new-input"> </td>

                                            <td>
                                                <select name="exp_add[0][exp_desc]" id="single-select"
                                                    class="form-control new-lg form-control-lg" required>
                                                    <option hidden>Expense Category</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->expense_title }}">
                                                            {{ $item->expense_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> <input type="number" name="exp_add[0][exp_amount]" value="0" min="0"
                                                    required class="form-control new-input  border-primary"> </td>
                                            <td> <input type="number" name="exp_add[0][exp_quan]" value="1" min="0"
                                                    max="1000" required
                                                    class="width80 form-control new-input  border-primary"> </td>
                                            <td> <input type="number" name="exp_add[0][exp_disc]" value="0" min="0"
                                                    max="100000" class="width80 form-control new-input  border-primary">
                                            </td>
                                            <td> <input type="number" name="exp_add[0][exp_tax]" value="0" min="0" max="100"
                                                    class="width80 form-control new-input  border-primary"> </td>
                                            <td> <input type="text" name="exp_add[0][exp_net]" value="0" disabled
                                                    class="disable form-control new-input border-primary"> </td>
                                        </tr>
                                    </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="btn-group ml-auto">
                                <button type="button" id="addRow" class="btn btn-outline-primary shadow btn-sm mr-1"><i
                                        class="fa fa-plus"></i> Add Row</button>

                                <button type="submit" id="save" class="btn btn-outline-info shadow btn-md mr-1">
                                    Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('./js/jquery.js') }}"></script>
    <script>
        var count = 0;
        // addRow function
        jQuery('#addRow').on('click', () => {
            count++;
            var html_code = ' <tr id="row' + count + '">';
            html_code +=
                '<td> <input type="text" name="exp_add[' + count +
                '][exp_title]" required class="form-control border-primary new-input"> </td>';
            html_code +=
                '<td> <select name="exp_add[' + count +
                '][exp_desc]" id="single-select" class="form-control new-lg form-control-lg" required> <option hidden>Expense Category</option> @foreach ($data as $item) <option value="{{ $item->expense_title }}"> {{ $item->expense_title }} </option> @endforeach </select> </td>';
            html_code +=
                '<td> <input type="number" name="exp_add[' + count +
                '][exp_amount]" value="0" min="0" required class="form-control new-input  border-primary"> </td>';
            html_code +=
                '<td> <input type="number" name="exp_add[' + count +
                '][exp_quan]" value="1" min="0" max="1000" required class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                '<td> <input type="number" name="exp_add[' + count +
                '][exp_disc]" value="0" min="0" max="100000" class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                ' <td> <input type="number" name="exp_add[' + count +
                '][exp_tax]" value="0" min="0" max="100" class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                ' <td> <input type="text" name="exp_add[' + count +
                '][exp_net]" value="0" disabled class="disable form-control new-input border-primary"> </td>';
            html_code +=
                ' <td class="width80"><button type="button" class="deleteRow btn btn-danger shadow btn-sm sharp" data-row="row' +
                count + '"><i class="fa fa-trash"></i></button></td>';
            html_code += '</tr>'
            jQuery('.report').append(html_code);
        })
        // delete row
        jQuery(document).on('click', '.deleteRow', function() {
            var delete_row = jQuery(this).data("row");
            jQuery('#' + delete_row).remove();
        })

        // jQuery(document).on('submit', '#new', (e)=>{
        //     e.preventDefault();
        //     data = jQuery('#new').serializeArray();
        //     console.log(data);
        // })
    </script>

@endsection
