
{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
 
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    
                    <div class="card-body h-100">
                        <form action="{{route('three-info')}}" id="step-form-horizontal" class="step-form-horizontal" method="POST">
                            <div>
                                @csrf
                                <section>
                                    {{-- Scheduling Section --}}
                                    <div class="">
                                        <div class="heading-title mt-3">
                                            <h4>Gym Schedule</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <table class="table table-outline-danger table-lg-responsive table-bordered">
                                                <thead>
                                                    <th>Days</th>
                                                    <th>Time Start</th>
                                                </thead>
                                                <tr>
                                                    
                                                    <td>Monday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="mondaytimein" name="mondaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                 
                                                </tr>
                                                <tr>
                                                    
                                                    <td>Tuesday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="tuesdaytimein" name="tuesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                   
                                                </tr>
                                                <tr>
                                                    
                                                    <td>Wednesday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="wednesdaytimein" name="wednesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    
                                                    <td>Thursday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="thursdaytimein" name="thursdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                   
                                                </tr>
                                                <tr>
                                                    
                                                    <td>Friday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="fridaytimein" name="fridaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                 
                                                    <td>Saturday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="saturdaytimein" name="saturdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                  
                                                </tr>
                                                <tr>
                                                   
                                                    <td>Sunday</td>
                                                    <td>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                            <input type="text" class="form-control border-light clock-n" id="sundaytimein" name="sundaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </td>
                                                
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </section>


                                <div class="row">
                                    <button type="submit" class="btn  ml-auto mr-3 btn-primary">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  



@endsection
