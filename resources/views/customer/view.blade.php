
{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="manage-customer">Customers</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Customer View</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Customer Details</h4>
                </div>
                <div class="card-body">
                        <div id="full_details">
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Personal Information</h4>
                                    <hr />
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="text-label">Image</label>
                                        @if($datas->image){
                                            <img src="{{$datas->image}}" alt="" width="100px">
                                        }
                                        @else <h6>No Image</h6>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Full Name</label>
                                            <h6>{{$datas->first_name ." ". $datas->last_name}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address</label>
                                            <h6>{{$datas->email}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number</label>
                                            <h6>{{$datas->phone_number}}</h6>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <h6>{{$datas->address}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <h6>{{$datas->date_of_birth}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <h6>{{$datas->cnic}}</h6>
                                        </div>
                                    </div>

                                   
                                </div>


                                <div class="heading-section mb-2 mt-3">
                                    <h4>General Information</h4>
                                    <hr />
                                </div>

                                <div class="row">

                                    <div class="col-lg-6 mb-3">

                                        <div class="form-group mb-4">
                                            <label class="text-label">Tell me about your current activity level</label>
                                            <h6>{{$datas->current_activity_level}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Tell me about your family and occupational life, what do you for a living? What does a day look like in your life?</label>
                                            <h6>{{$datas->daily_routine}}</h6>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group mb-4">
                                            <label class="text-label">Do you have any medical condition</label>
                                            <h6>{{$datas->medical_condition}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Have you had any injuries previously? Please give a clear timeline and description.</label>
                                            @if($datas->medical_condition_description)
                                            <h6>{{$datas->medical_condition_description}}</h6>
                                            @else <h6>No Medical Issues</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">What kind of exercise have you done previously? Please go in order, starting from the very beginning and ending at your most recent training regimen. </label>
                                            <h6>{{$datas->previous_excersice}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Please tell us your diet</label>
                                            <h6>{{$datas->daily_diet}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <section class="pl-2 pr-2">
                                <!-- Funtional Screening accordion -->
                               
                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>TVA/Core Activation </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Can they lie down supine/face up and keep hand under back and squeeze core while keeping back flat?</p>
                                                        </div>
                                                        
                                                        <div class="row pr-2 pl-3"><h6>{{$datas->test1_core_activation}}</h6></div>
                                                        <div class="row pr-2 pl-3"><h6 class="text-primary">Reason / Comment</h6> &nbsp;&nbsp; <h6> {{$datas->test1_core_activation_description}}</h6></div>
                                                    </div>


                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Can they do bird dogs with the leg movement coming from glute (like donkey kick) and is the body in straight line without arching back?</p>
                                                        </div>
                                                        <div class="row pr-2 pl-3"><h6>{{$datas->test2_core_activation}}</h6></div>
                                                        <div class="row pr-2 pl-3"><h6 class="text-primary">Reason / Comment</h6> &nbsp;&nbsp; <h6> {{$datas->test2_core_activation_description}}</h6></div>
                                                    </div>


                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Abs Strength</label>
                                                            <h6>{{$datas->strength_core_activation}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak core activation, Describe Briefly</label>
                                                            @if($datas->strength_core_activation_description)
                                                            <h6>{{$datas->strength_core_activation_description}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="heading-section mb-3 mt-4">
                                                    <h4> Glute activation </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Are they able to do a bridge from just squeezing their glutes and not using their back? Ask them to stop and repeat at full squeeze. About 2 sets of 10 reps.</p>
                                                        </div>
                                                        <div class="row pr-2 pl-3"><h6>{{$datas->test_glute_activation}}</h6></div>
                                                        <div class="row pr-2 pl-3"><h6 class="text-primary">Reason / Comment</h6> &nbsp;&nbsp; <h6> {{$datas->test_glute_activation_description}}</h6></div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Glute Strength</label>
                                                            <h6>{{$datas->strength_glute_activation}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 ">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak Glute activation, Describe Briefly</label>
                                                            @if($datas->strength_glute_activation_description)
                                                            <h6>{{$datas->strength_glute_activation_description}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>Clamshells/Lateral Banded Walk </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Are they able to use the glute medius to perform the movement</p>
                                                        </div>
                                                        
                                                        <div class="row pr-2 pl-3"><h6>{{$datas->test_clamshells_activation}}</h6></div>
                                                        <div class="row pr-2 pl-3"><h6 class="text-primary">Reason / Comment</h6> &nbsp;&nbsp; <h6> {{$datas->test_clamshells_activation_description}}</h6></div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of clamshell Strength</label>
                                                            <h6>{{$datas->strength_clamshells_activation}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 ">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak clamshell activation, Describe Briefly</label>
                                                            @if($datas->strength_clamshells_activation_description)
                                                            <h6>{{$datas->strength_clamshells_activation_description}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                            
                                       
                                    
                                



                                <!-- Body Measurement accordion -->
                               
                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>Measurement </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Calculation Unit</label>
                                                            <h6>{{$datas->measurement_cal_unit}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Chest</label>
                                                            <h6>{{$datas->chest}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Waist</label>
                                                            <h6>{{$datas->waist}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hips</label>
                                                            <h6>{{$datas->hips}}</h6>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>Body Statistics</h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Weight Unit</label>
                                                            <h6>{{$datas->weight_cal_unit}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body Weight</label>
                                                            <h6>{{$datas->body_weight}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body FAT %</label>
                                                            <h6>{{$datas->body_fat}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Muscles Mass %</label>
                                                            <h6>{{$datas->muscles_mass}}</h6>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                               




                                <!-- Squart accordion -->
                                
                                <div class="heading-section mb-3 mt-4">
                                    <h4>Squat </h4>
                                    <hr />
                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Upright posture</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_1}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_1_desc)
                                                            <h6>{{$datas->squat_test_1_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Bracing core correctly</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_2}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_2_desc)
                                                            <h6>{{$datas->squat_test_2_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Weight distributed evenly</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_3}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_3_desc)
                                                            <h6>{{$datas->squat_test_3_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Hips rotate externally</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_4}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_4_desc)
                                                            <h6>{{$datas->squat_test_4_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Exploding up properly</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_5)
                                                            <h6>{{$datas->squat_test_5}}</h6>
                                                            @else <h6>No</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_5_desc)
                                                            <h6>{{$datas->squat_test_5_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Squeezing glutes properly</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_6}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_6_desc)
                                                            <h6>{{$datas->squat_test_6_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Can they brace their core? </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_7}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_7_desc)
                                                            <h6>{{$datas->squat_test_7_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Can they keep their spine neutral? </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_8}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_8_desc)
                                                            <h6>{{$datas->squat_test_8_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary"> Are they able to squat to parallel at least? </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <h6>{{$datas->squat_test_9}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            @if($datas->squat_test_9_desc)
                                                            <h6>{{$datas->squat_test_9_desc}}</h6>
                                                            @else <h6>No Description</h6>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mt-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Squat Strength</label>
                                                            <h6>{{$datas->strength_squat_activation}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak squat activation, Describe Briefly</label>
                                                            <h6>{{$datas->strength_squat_activation_description}}</h6>
                                                        </div>
                                                    </div>

                                                
                            </section>



                            <div class="heading-section mb-3 mt-4">
                                <h4>Account </h4>
                                <hr />
                            </div>

                            <section>
                                <div class="row pl-2 pr-2">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Joining</label>
                                            <h6>{{$datas->date_of_joining}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Month End Date</label>
                                            <h6>{{$datas->month_end}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Training Type</label>
                                            <h6>{{$datas->training_type}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Name</label>
                                            <h6>{{$datas->trainer_name}}</h6>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Status</label>
                                            <h6>{{$datas->status}}</h6>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Reference Name</label>
                                            <h6>{{$datas->reference_name}}</h6>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Registration Fee</label>
                                            <h6>{{$datas->registration_fees}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Gym Fee</label>
                                            <h6>{{$datas->gym_fees}}</h6>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Fee Per Session</label>
                                            <h6>{{$datas->trainer_fees_per_session}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Session</label>
                                            <h6>{{$datas->total_session}}</h6>
                                            
                                        </div>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Allow Discount?</label>
                                            <div class="material-switch mt-3">
                                                @if($datas->allow_discount)
                                                <h6>{{$datas->allow_discount}}</h6>
                                                @else <h6>No Discount</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @if($datas->allow_discount)
                                    <div class="pl-3 pr-3">
                                        <div class="row">
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Category</label>
                                                    <h6>{{$datas->discount_category}}</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Type</label>
                                                    <h6>{{$datas->discount_type}}</h6>
                                                </div>
                                            </div>
                                            @if ($datas->discount_type == 'percentage')
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group ">
                                                    <label class="text-label">Percentage %</label>
                                                    @if($datas->discount_percent_amount)
                                                    <h6>{{$datas->discount_percent_amount}}</h6>
                                                    @else <h6>No Amount</h6>
                                                    @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-lg-4 mb-2 ">
                                                <div class="form-group ">
                                                    <label class="text-label">Fixed Amount</label>
                                                    @if($datas->discount_fixed_amount)
                                                    <h6>{{$datas->discount_fixed_amount}}</h6>
                                                    @else <h6>No Amount</h6>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </section>
                            <div class="heading-section mb-3 mt-4">
                                <h4>Gym Schedule</h4>
                                <hr />
                            </div>

                            <section class="pl-2 pr-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Monday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->mon_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->mon_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->mon_allow_pt)
                                                    <h6>{{$datas->mon_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Tuesday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->tue_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->tue_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->tue_allow_pt)
                                                    <h6>{{$datas->tue_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Wednesday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->wed_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->wed_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->wed_allow_pt)
                                                    <h6>{{$datas->wed_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Thursday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->thu_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->thu_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->thu_allow_pt)
                                                    <h6>{{$datas->thu_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Friday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->fri_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->fri_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->fri_allow_pt)
                                                    <h6>{{$datas->fri_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Saturday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->sat_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->sat_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->sat_allow_pt)
                                                    <h6>{{$datas->sat_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card bg-card-form-customer">
                                            <div class="card-header border-0 pb-0">
                                                <h5 class="card-title">Sunday</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Start Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->sun_start_time}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <h6>{{$datas->sun_end_time}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <h6 class="card-text d-inline">Person Training (PT)?</h6>
                                                <div class="material-switch float-right">
                                                    @if ($datas->sun_allow_pt)
                                                    <h6>{{$datas->sun_allow_pt}}</h6>
                                                    @else
                                                    <h6>No Personal Training</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                </div>
            </div>
        </div>
    </div>
</div>



@endsection