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
                                <form id="new">
                                    <tbody class="report">
                                        <tr id="row-sec">
                                            @csrf
                                            <td> <input type="text" id="exp_title0" required
                                                    class="form-control border-primary new-input"> </td>

                                            <td>
                                                <select id="exp_desc0" 
                                                    class="form-control new-lg form-control-lg" required>
                                                    <option hidden>Expense Category</option>
                                                    @foreach ($data as $item)
                                                        <option value="{{ $item->expense_title }}">
                                                            {{ $item->expense_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td> <input type="number" id="exp_amount0" value="0" min="0"
                                                    required class="form-control new-input  border-primary"> </td>
                                            <td> <input type="number" id="exp_quan0" value="1" min="0"
                                                    max="1000" required
                                                    class="width80 form-control new-input  border-primary"> </td>
                                            <td> <input type="number" id="exp_disc0" value="0" min="0"
                                                    max="100000" class="width80 form-control new-input  border-primary">
                                            </td>
                                            <td> <input type="number" id="exp_tax0" value="0" min="0" max="100"
                                                    class="width80 form-control new-input  border-primary"> </td>
                                            <td> <input type="text" id="exp_net0" value="0" disabled
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
       $(document).ready(function () {
            var count = 0;
        var html_code = '';
        // addRow function
        jQuery('#addRow').on('click', () => {
            count++;
            html_code = ' <tr id="row' + count + '">';
            html_code +=
                '<td> <input type="text" id="exp_title'+ count +'" required class="form-control border-primary title new-input"> </td>';
            html_code +=
                '<td> <select id="exp_desc'+ count +'"  class="form-control new-lg form-control-lg" required> <option hidden>Expense Category</option> @foreach ($data as $item) <option value="{{ $item->expense_title }}"> {{ $item->expense_title }} </option> @endforeach </select> </td>';
            html_code +=
                '<td> <input type="number" id="exp_amount'+ count +'" value="0" min="0" required class="form-control new-input  border-primary"> </td>';
            html_code +=
                '<td> <input type="number" id="exp_quan'+ count +'" value="1" min="0" max="1000" required class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                '<td> <input type="number" id="exp_disc'+ count +'" value="0" min="0" max="100000" class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                ' <td> <input type="number" id="exp_tax'+ count +'" value="0" min="0" max="100" class="width80 form-control new-input  border-primary"> </td>';
            html_code +=
                ' <td> <input type="text" id="exp_net'+ count +'" value="0" disabled class="disable form-control new-input border-primary"> </td>';
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

        jQuery(document).on('submit', '#new', (e)=>{
            e.preventDefault();
          
            // data = jQuery('#new').serializeArray();
            var i = 0;
            let _token = $("input[name=_token]").val();
           
            while( i <= document.getElementsByClassName('title').length){
                let title = document.getElementById('exp_title'+i);
                let desc = document.getElementById('exp_desc'+i);
                let amount = document.getElementById('exp_amount'+i);
                let quan = document.getElementById('exp_quan'+i);
                let disc = document.getElementById('exp_disc'+i);
                let tax = document.getElementById('exp_tax'+i);
                let net = document.getElementById('exp_net'+i);
            

                var data = {
                        title:[title.value],
                        desc:[desc.value],
                        amount:[amount.value],
                        quan:[quan.value],
                        disc:[disc.value],
                        tax:[tax.value],
                        net:[net.value],
                        
                };
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                
                $.ajax({
                    type: "post",
                    url: "{{ route('expense-add')}}",
                    data: data,
                    success: function (response) {
                    }
                });
                i++
            }
            location.href="manage-expense";
        })
       });
    </script>

@endsection
