<style>
    .bootstrap-select.form-control-lg .dropdown-toggle {
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }
</style>

{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
@if(session('user'))
<div class="alert alert-success" role="alert">
    <strong>Success! </strong>Data Inserted Successfully.
</div>

@elseif(session('error'))
<div class="alert alert-success" role="alert">
    <strong>Error! </strong>Something went wrong!.
</div>

@endif

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Customers</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create a New Customer</h4>
                </div>
                <div class="card-body h-100">
                    <form action="/update-customer" id="step-form-horizontal" class="step-form-horizontal" method="POST" enctype="multipart/form-data">


                        <div>
                            @csrf
                            <input type="text" value="{{$datas->id}}" name="id" hidden>
                            <h4>Information</h4>
                            <section class="pl-2 pr-2">
                                <div class="heading-section mt-lg-2">
                                    <h4>Personal Information</h4>
                                    <hr />
                                </div>
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">First Name*</label>
                                            <input type="text" name="firstName" class="form-control" placeholder="Asim" value="{{$datas->first_name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Azher" value="{{$datas->last_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input type="email" class="form-control" name="email" placeholder="abc@xyz.com" required value="{{$datas->email}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" name="phoneNumber" class="form-control" placeholder="0300-XXXXXXX" required value="{{$datas->phone_number}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" name="place" class="form-control" placeholder="101 House, Street 1A, Area, City" value="{{$datas->address}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" value="{{$datas->date_of_birth}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control" placeholder="42874-7358088-1" value="{{$datas->cnic}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="cfile" class="custom-file-input" id="customer-img" value="{{$datas->image}}">
                                                <label class="custom-file-label" for="customer-img">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="heading-section mb-5 mt-5">
                                    <h4>General Information</h4>
                                    <hr />
                                </div>

                                <div class="row">

                                    <div class="col-lg-6 mb-3">

                                        <div class="form-group mb-4">
                                            <label class="text-label">Tell me about your current activity level*</label>
                                            <select name="activity" class="form-control form-control-lg" required>
                                                <option hidden value="{{$datas->current_activity_level}}">{{$datas->current_activity_level}}</option>
                                                <option value="minimal">Minimal</option>
                                                <option value="low">Low</option>
                                                <option value="moderate">Moderate</option>
                                                <option value="high">High</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Tell me about your family and occupational life, what do you for a living? What does a day look like in your life?*</label>
                                            <textarea type="text" name="dailyroutine" class="form-control text-area-hight" placeholder="Describe Briefly..." required>{{$datas->daily_routine}}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group mb-4">
                                            <label class="text-label">Do you have any medical condition</label>
                                            <select name="medicon" id="medicon" class="form-control form-control-lg" required>
                                                <option value="{{$datas->medical_condition}}" hidden>{{$datas->medical_condition}}</option>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Have you had any injuries previously? Please give a clear timeline and description.*</label>
                                            <textarea type="text" id="medicon-desc" name="injury" class="form-control text-area-hight" placeholder="Describe Briefly...">{{$datas->medical_condition_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">What kind of exercise have you done previously? Please go in order, starting from the very beginning and ending at your most recent training regimen. *</label>
                                            <textarea type="text" name="preexcersice" class="form-control text-area-hight" placeholder="Describe Briefly..." required>{{$datas->previous_excersice}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Please tell us your diet*</label>
                                            <textarea type="text" name="dailydiet" class="form-control text-area-hight" placeholder="Describe Briefly..." required>{{$datas->daily_diet}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <h4>Initial Assessment</h4>
                            <section class="pl-2 pr-2">

                                <!-- Funtional Screening accordion -->
                                <div id="accordion-one" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseOne">
                                            <span class="accordion__header--text">Funtional Screening</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseOne" class="collapse accordion__body show" data-parent="#accordion-one">
                                            <div class="accordion__body--text">
                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>TVA/Core Activation </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Can they lie down supine/face up and keep hand under back and squeeze core while keeping back flat?</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 pt-2">
                                                                <div class="row">
                                                                    @if($datas->test1_core_activation == 'yes')
                                                                    <div class="col-6">
                                                                        <input type="radio" value="yes" id="tva-1-1" name="tva1" checked>
                                                                        <label for="tva-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" value="no" id="glute-2-1" name="tva1">
                                                                        <label for="glute-2-1">No</label>
                                                                    </div>
                                                                    @elseif($datas->test1_core_activation == 'no')
                                                                    <div class="col-6">
                                                                        <input type="radio" value="yes" id="tva-1-1" name="tva1">
                                                                        <label for="tva-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" value="no" id="glute-2-1" name="tva1" checked>
                                                                        <label for="glute-2-1">No</label>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="tva_1_com" placeholder="Comment" value="{{$datas->test1_core_activation_description}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 mb-2 ">
                                                        <div class="form-group ">
                                                            <p>Can they do bird dogs with the leg movement coming from glute (like donkey kick) and is the body in straight line without arching back?</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 pt-lg-2">
                                                                <div class="row">
                                                                    @if($datas->test2_core_activation == 'yes')
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-1" value="yes" name="tva2" checked>
                                                                        <label for="tva-2-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-2" value="no" name="tva2">
                                                                        <label for="tva-2-2">No</label>
                                                                    </div>
                                                                    @elseif($datas->test2_core_activation == 'no')
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-1" value="yes" name="tva2" checked>
                                                                        <label for="tva-2-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-2" value="no" checked name="tva2">
                                                                        <label for="tva-2-2">No</label>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="tva_2_com" placeholder="Comment" value="{{$datas->test2_core_activation_description}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Abs Strength*</label>
                                                            <select name="absstrength" class="form-control form-control-lg" id="coreweak" required>
                                                                <option hidden value="{{$datas->strength_core_activation}}">{{$datas->strength_core_activation}}</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak core activation, Describe Briefly*</label>
                                                            <textarea type="text" name="weakcore" class="form-control text-area-hight" placeholder="Describe Briefly...">{{$datas->strength_core_activation_description}}</textarea>
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
                                                        <div class="row">
                                                            <div class="col-md-3 pt-2">
                                                                <div class="row">
                                                                    @if($datas->test_glute_activation=='yes')
                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-1-1" name="glute" value="yes" checked>
                                                                        <label for="glute-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-2" name="glute" value="no">
                                                                        <label for="glute-2">No</label>
                                                                    </div>
                                                                    @elseif($datas->test_glute_activation=='no')

                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-1-1" name="glute" value="yes" checked>
                                                                        <label for="glute-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-2" name="glute" checked value="no">
                                                                        <label for="glute-2">No</label>
                                                                    </div>

                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="glute_com" placeholder="Comment" value="{{$datas->test_glute_activation_description}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Glute Strength*</label>
                                                            <select name="glutestrength" class="form-control form-control-lg" id="gluteweak" required>
                                                                <option hidden value="{{$datas->strength_glute_activation}}">{{$datas->strength_glute_activation}}</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 ">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak Glute activation, Describe Briefly*</label>
                                                            <textarea type="text" name="glutecore" class="form-control text-area-hight" placeholder="Describe Briefly...">{{$datas->strength_glute_activation_description}}</textarea>
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
                                                            <p>Are they able to use the glute medius to perform the movement*</p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 pt-2">
                                                                <div class="row">
                                                                    @if($datas->test_clamshells_activation=='yes')
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-1-1" checked name="clamshell" value="yes">
                                                                        <label for="clamshell-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-2" name="clamshell" value="no">
                                                                        <label for="clamshell-2">No</label>
                                                                    </div>
                                                                    @elseif($datas->test_clamshells_activation=='no')
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-1-1" name="clamshell" value="yes">
                                                                        <label for="clamshell-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-2" checked name="clamshell" value="no">
                                                                        <label for="clamshell-2">No</label>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="clamshell_com" value="{{$datas->test_clamshells_activation_description}}" placeholder="Comment">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of clamshell Strength*</label>
                                                            <select name="clamshellstrength" class="form-control form-control-lg" id="clamshellweak" required>
                                                                <option hidden value="{{$datas->strength_clamshells_activation}}">{{$datas->strength_clamshells_activation}}</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak clamshell activation, Describe Briefly*</label>
                                                            <textarea type="text" name="clamshellcore" class="form-control text-area-hight" placeholder="Describe Briefly...">{{$datas->strength_clamshells_activation_description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Body Measurement accordion -->
                                <div id="accordion-two" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseTwo">
                                            <span class="accordion__header--text">Measurements and Body Statistics</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseTwo" class="collapse accordion__body show" data-parent="#accordion-two">
                                            <div class="accordion__body--text">
                                                <div class="heading-section mb-3 mt-4">
                                                    <h4>Measurement </h4>
                                                    <hr />
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Calculation Unit</label>
                                                            <select name="mcal" class="form-control form-control-lg" id="mcal" required>
                                                                <option value="{{$datas->measurement_cal_unit}}" hidden>{{$datas->measurement_cal_unit}}</option>
                                                                <option value="cm">Centimeter (cm)</option>
                                                                <option value="inch">Inches (inch)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Chest*</label>
                                                            <input type="text" name="chest" required class="form-control" value="{{$datas->chest}}" placeholder="56">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Waist*</label>
                                                            <input type="text" class="form-control" placeholder="86" name="waist" value="{{$datas->waist}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hips*</label>
                                                            <input type="text" name="hips" class="form-control" value="{{$datas->hips}}" placeholder="36" required>
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
                                                            <select name="weight_unit" class="form-control form-control-lg" id="bweight" required>
                                                                <option value="{{$datas->weight_cal_unit}}" hidden>{{$datas->weight_cal_unit}}</option>
                                                                <option value="kilogram">Kilogram</option>
                                                                <option value="pound">Pounds</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body Weight*</label>
                                                            <input type="number" min="0" name="weight" value="{{$datas->body_weight}}" required class="form-control" placeholder="56">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body FAT %*</label>
                                                            <input type="number" min="0" class="form-control" value="{{$datas->body_fat}}" placeholder="86" name="fat" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Muscles Mass %*</label>
                                                            <input type="number" min="0" name="muscles" class="form-control" value="{{$datas->muscles_mass}}" placeholder="16" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <!-- Squart accordion -->
                                <div id="accordion-three" class="accordion accordion-primary">
                                    <div class="accordion__item">
                                        <div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseThree">
                                            <span class="accordion__header--text">Squat</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseThree" class="collapse accordion__body show" data-parent="#accordion-three">
                                            <div class="accordion__body--text">


                                                <div class="row mt-3">
                                                    <div class="col-lg-4 mb-2">
                                                        <div class="form-group">
                                                            <p class="text-primary">Upright posture</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mb-2">
                                                        <div class="form-group">
                                                            <select name="sc1" class="form-control form-control-lg" id="sc1" required>
                                                                <option value="{{$datas->squat_test_1}}" hidden>{{$datas->squat_test_1}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc1_desc" value="{{$datas->squat_test_1_desc}}">
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
                                                            <select name="sc2" class="form-control form-control-lg" id="sc2" required>
                                                                <option value="{{$datas->squat_test_2}}" hidden>{{$datas->squat_test_2}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc2_desc" value="{{$datas->squat_test_2_desc}}">
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
                                                            <select name="sc3" class="form-control form-control-lg" id="sc3" required>
                                                                <option value="{{$datas->squat_test_3}}" hidden>{{$datas->squat_test_3}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc3_desc" value="{{$datas->squat_test_3_desc}}">
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
                                                            <select name="sc4" class="form-control form-control-lg" id="sc4" required>
                                                                <option value="{{$datas->squat_test_4}}" hidden>{{$datas->squat_test_4}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." value="{{$datas->squat_test_4_desc}}" name="sc4_desc">
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
                                                            <select name="sc6" class="form-control form-control-lg" id="sc5" required>
                                                                <option value="{{$datas->squat_test_5}}" hidden>{{$datas->squat_test_5}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." value="{{$datas->squat_test_5_desc}}" name="sc5_desc">
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
                                                            <select name="sc6" class="form-control form-control-lg" id="sc6" required>
                                                                <option value="{{$datas->squat_test_6}}" hidden>{{$datas->squat_test_6}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc6_desc" value="{{$datas->squat_test_6_desc}}">
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
                                                            <select name="sc8" class="form-control form-control-lg" id="sc8" required>
                                                                <option value="{{$datas->squat_test_7}}" hidden>{{$datas->squat_test_7}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc7_desc" value="{{$datas->squat_test_7_desc}}">
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
                                                            <select name="sc8" class="form-control form-control-lg" id="sc8" required>
                                                                <option value="{{$datas->squat_test_8}}" hidden>{{$datas->squat_test_8}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc8_desc" value="{{$datas->squat_test_8_desc}}">
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
                                                            <select name="sc9" class="form-control form-control-lg" id="sc9" required>
                                                                <option value="{{$datas->squat_test_9}}" hidden>{{$datas->squat_test_9}}</option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc9_desc" value="{{$datas->squat_test_9_desc}}">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mt-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Squat Strength*</label>
                                                            <select name="squatstrength" class="form-control form-control-lg" id="squatweak" required>
                                                                <option hidden value="{{$datas->strength_squat_activation}}">{{$datas->strength_squat_activation}}</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak squat activation, Describe Briefly*</label>
                                                            <textarea type="text" name="squatcore" class="form-control text-area-hight" placeholder="Describe Briefly...">{{$datas->strength_squat_activation_description}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </section>



                            <h4>Account Details</h4>
                            <section>
                                <div class="row pl-2 pr-2">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Joining*</label>
                                            <input type="date" name="doj" class="form-control" placeholder="Cellophane Square" value="{{$datas->date_of_joining}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Month End Date</label>
                                            <input type="text" class="form-control disable" name="mde" value="{{$datas->month_end}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Training Type*</label>
                                            <select name="ttype" class="form-control form-control-lg" required>
                                                <option hidden value="{{$datas->training_type}}">{{$datas->training_type}}</option>
                                                <option value="PT">Person Training (PT)</option>
                                                <option value="GT">General Training (GT)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Name</label>
                                            <input type="text" name="tname" class="form-control disable" value="{{$datas->trainer_name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Status*</label>
                                            <select name="status" class="form-control form-control-lg" required>
                                                <option hidden value="{{$datas->status}}">{{$datas->status}}</option>
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Reference Name</label>
                                            <input type="text" name="reference" value="{{$datas->reference_name}}" class="form-control" placeholder="Atif Aslam">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Registration Fee*</label>
                                            <input type="text" name="regfee" class="form-control" value="{{$datas->registration_fees}}" placeholder="3000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Gym Fee*</label>
                                            <input type="text" name="gymfee" class="form-control" value="{{$datas->gym_fees}}" placeholder="5000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Fee Per Session*</label>
                                            <input type="text" name="trainfee" value="{{$datas->trainer_fees_per_session}}" class="form-control" placeholder="2000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Session</label>
                                            <input type="number" name="tsession" value="{{$datas->total_session}}" class="form-control disable" value="0" disabled>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Allow Discount?</label>
                                            @if($datas->allow_discount=='yes')
                                            <div class="material-switch mt-3">
                                                <input id="discounttoggle" hidden name="discounttoggle" value="yes" type="checkbox" checked />
                                                <label for="discounttoggle" id="toggle-discount" class="label-default"></label>
                                            </div>
                                            @else
                                            <div class="material-switch mt-3">
                                                <input id="discounttoggle" hidden name="discounttoggle" type="checkbox" />
                                                <label for="discounttoggle" id="toggle-discount" class="label-default"></label>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" pl-3 pr-3">
                                        <div class="row">
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Category</label>
                                                    <select name="dcat" class="form-control form-control-lg" required>
                                                        <option hidden value="{{$datas->discount_category}}">{{$datas->discount_category}}</option>
                                                        <option value="Family Discount">Family Discount </option>
                                                        <option value="General Discount">General Discount</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Type</label>
                                                    <select name="dtype" id="toggle-discount-select" class="form-control form-control-lg" required>
                                                        <option hidden value="{{$datas->discount_type}}">{{$datas->discount_type}}</option>
                                                        <option value="fixed">Fixed Amount</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2 percent-a">
                                                <div class="form-group ">
                                                    <label class="text-label">Enter Percentage %</label>
                                                    <input type="number" min="0" value="{{$datas->discount_percent_amount}}" max="100" name="percent" placeholder="10" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2 fixed-a">
                                                <div class="form-group ">
                                                    <label class="text-label">Enter Amount</label>
                                                    <input type="text" name="fixed" value="{{$datas->discount_fixed_amount}}" placeholder="1000" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h4>Gym Schedule</h4>
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
                                                            <input type="text" class="form-control" value="{{$datas->mon_start_time}}" name="mondaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->mon_end_time}}" name="mondaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                @if($datas->mon_allow_pt=='on' || $datas->mon_allow_pt=='yes')
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="mondaypt" name="mondaypt" value="yes" hidden type="checkbox" checked />
                                                    <label for="mondaypt" class="label-default"></label>
                                                </div>
                                                @else
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="mondaypt" name="mondaypt" hidden type="checkbox" />
                                                    <label for="mondaypt" class="label-default"></label>
                                                </div>
                                                @endif
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
                                                            <input type="text" class="form-control" value="{{$datas->tue_start_time}}" name="tuesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->tue_end_time}}" name="tuesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($datas->tue_allow_pt=='on' || $datas->tue_allow_pt=='yes')
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="tuesdaypt" value="yes" hidden name="tuesdaypt" type="checkbox" checked />
                                                    <label for="tuesdaypt" class="label-default"></label>
                                                </div>
                                            </div>
                                            @else
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="tuesdaypt" value="yes" hidden name="tuesdaypt" type="checkbox" />
                                                    <label for="tuesdaypt" class="label-default"></label>
                                                </div>
                                            </div>
                                            @endif
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
                                                            <input type="text" class="form-control" value="{{$datas->wed_start_time}}" name="wednesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->wed_end_time}}" name="wednesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($datas->wed_allow_pt=='on' || $datas->wed_allow_pt=='yes')
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="wednesdaypt" value="yes" name="wednesdaypt" checked hidden type="checkbox" />
                                                    <label for="wednesdaypt" class="label-default"></label>
                                                </div>
                                            </div>
                                            @else
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="wednesdaypt" value="yes" name="wednesdaypt" hidden type="checkbox" />
                                                    <label for="wednesdaypt" class="label-default"></label>
                                                </div>
                                            </div>
                                            @endif

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
                                                            <input type="text" class="form-control" value="{{$datas->thu_start_time}}" name="thursdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->thu_start_time}}" name="thursdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                @if($datas->thu_allow_pt=='on' || $datas->thu_allow_pt=='yes')
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="thursdaypt" value="yes" hidden name="thursdaypt" checked type="checkbox" />
                                                    <label for="thursdaypt" class="label-default"></label>
                                                </div>
                                                @else
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="thursdaypt" value="yes" hidden name="thursdaypt" type="checkbox" />
                                                    <label for="thursdaypt" class="label-default"></label>
                                                </div>
                                                @endif
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
                                                            <input type="text" class="form-control" value="{{$datas->fri_start_time}}" name="fridaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->fri_end_time}}" name="fridaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                @if($datas->fri_allow_pt=='on' || $datas->fri_allow_pt=='yes')
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="fridaypt" value="yes" name="fridaypt" hidden checked type="checkbox" />
                                                    <label for="fridaypt" class="label-default"></label>
                                                </div>
                                                @else
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="fridaypt" value="yes" name="fridaypt" hidden type="checkbox" />
                                                    <label for="fridaypt" class="label-default"></label>
                                                </div>
                                                @endif
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
                                                            <input type="text" class="form-control" value="{{$datas->sat_start_time}}" name="saturdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->sat_start_time}}" name="saturdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                @if($datas->sat_allow_pt=='on' || $datas->sat_allow_pt=='yes')
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="saturdaypt" value="yes" hidden name="saturdaypt" checked type="checkbox" />
                                                    <label for="saturdaypt" class="label-default"></label>
                                                </div>
                                                @else
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="saturdaypt" value="yes" hidden name="saturdaypt" type="checkbox" />
                                                    <label for="saturdaypt" class="label-default"></label>
                                                </div>
                                                @endif
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
                                                            <input type="text" class="form-control" value="{{$datas->sun_start_time}}" name="sundaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$datas->sun_start_time}}" name="sundaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                @if($datas->sun_allow_pt=='on' || $datas->sun_allow_pt=='yes')
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="sundaypt" hidden name="sundaypt" value="yes" checked type="checkbox" />
                                                    <label for="sundaypt" class="label-default"></label>
                                                </div>
                                                @else
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="sundaypt" hidden name="sundaypt" value="yes" type="checkbox" />
                                                    <label for="sundaypt" class="label-default"></label>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h4>Confirmation</h4>
                            <section>
                                <div class="checkout-name text-center mt-5 pt-5">
                                    <img src="{{asset('./images/custom/check.png')}}" alt="check image" width="100px">
                                    <h1 class="display-5 mt-3">Your Form is Update</h1>
                                    <p class="lead">Check Your Detail again? or Finish Your Process</p>
                                </div>

                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection