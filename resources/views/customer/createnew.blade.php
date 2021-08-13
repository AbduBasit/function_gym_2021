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
                    <form action="/create-customer" id="step-form-horizontal" class="step-form-horizontal" method="POST" enctype="multipart/form-data">


                        <div>
                            @csrf
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
                                            <input type="text" name="firstName" class="form-control" placeholder="Asim" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Azher">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Email Address*</label>
                                            <input type="email" class="form-control" name="email" placeholder="abc@xyz.com" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Phone Number*</label>
                                            <input type="text" name="phoneNumber" class="form-control" placeholder="0300-XXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Residential Address</label>
                                            <input type="text" name="place" class="form-control" placeholder="101 House, Street 1A, Area, City">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">CNIC</label>
                                            <input type="text" name="cnic" class="form-control" placeholder="42874-7358088-1">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="text-label">Upload Image</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="cfile" class="custom-file-input" id="customer-img">
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
                                                <option hidden>Select activity level</option>
                                                <option value="minimal">Minimal</option>
                                                <option value="low">Low</option>
                                                <option value="moderate">Moderate</option>
                                                <option value="high">High</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Tell me about your family and occupational life, what do you for a living? What does a day look like in your life?*</label>
                                            <textarea type="text" name="dailyroutine" class="form-control text-area-hight" placeholder="Describe Briefly..." required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group mb-4">
                                            <label class="text-label">Do you have any medical condition</label>
                                            <select name="medicon" id="medicon" class="form-control form-control-lg" required>
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Have you had any injuries previously? Please give a clear timeline and description.*</label>
                                            <textarea type="text" id="medicon-desc" name="injury" disabled class="form-control disable text-area-hight" placeholder="Describe Briefly..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">What kind of exercise have you done previously? Please go in order, starting from the very beginning and ending at your most recent training regimen. *</label>
                                            <textarea type="text" name="preexcersice" class="form-control text-area-hight" placeholder="Describe Briefly..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Please tell us your diet*</label>
                                            <textarea type="text" name="dailydiet" class="form-control text-area-hight" placeholder="Describe Briefly..." required></textarea>
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
                                                                    <div class="col-6">
                                                                        <input type="radio" value="yes" id="tva-1-1" name="tva1">
                                                                        <label for="tva-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" value="no" id="glute-2-1" name="tva1">
                                                                        <label for="glute-2-1">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="tva_1_com" placeholder="Comment">
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
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-1" value="yes" name="tva2">
                                                                        <label for="tva-2-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="tva-2-2" value="no" name="tva2">
                                                                        <label for="tva-2-2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="tva_2_com" placeholder="Comment">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Abs Strength*</label>
                                                            <select name="absstrength" class="form-control form-control-lg" id="coreweak" required>
                                                                <option hidden>Select activity level</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 core-weak">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak core activation, Describe Briefly*</label>
                                                            <textarea type="text" name="weakcore" class="form-control text-area-hight" placeholder="Describe Briefly..."></textarea>
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
                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-1-1" name="glute" value="yes">
                                                                        <label for="glute-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="glute-2" name="glute" value="no">
                                                                        <label for="glute-2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="glute_com" placeholder="Comment">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Glute Strength*</label>
                                                            <select name="glutestrength" class="form-control form-control-lg" id="gluteweak" required>
                                                                <option hidden>Select activity level</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 glute-weak">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak Glute activation, Describe Briefly*</label>
                                                            <textarea type="text" name="glutecore" class="form-control text-area-hight" placeholder="Describe Briefly..."></textarea>
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
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-1-1" name="clamshell" value="yes">
                                                                        <label for="clamshell-1-1">Yes</label>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="radio" id="clamshell-2" name="clamshell" value="no">
                                                                        <label for="clamshell-2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" name="clamshell_com" placeholder="Comment">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-lg-6 mt-4">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of clamshell Strength*</label>
                                                            <select name="clamshellstrength" class="form-control form-control-lg" id="clamshellweak" required>
                                                                <option hidden>Select activity level</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 clamshell-weak">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak clamshell activation, Describe Briefly*</label>
                                                            <textarea type="text" name="clamshellcore" class="form-control text-area-hight" placeholder="Describe Briefly..."></textarea>
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
                                                                <option value="cm">Centimeter (cm)</option>
                                                                <option value="inch">Inches (inch)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Chest*</label>
                                                            <input type="text" name="chest" required class="form-control" placeholder="56">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Waist*</label>
                                                            <input type="text" class="form-control" placeholder="86" name="waist" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Hips*</label>
                                                            <input type="text" name="hips" class="form-control" placeholder="36" required>
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
                                                                <option value="kilogram">Kilogram</option>
                                                                <option value="pound">Pounds</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body Weight*</label>
                                                            <input type="number" min="0" name="weight" required class="form-control" placeholder="56">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Body FAT %*</label>
                                                            <input type="number" min="0" class="form-control" placeholder="86" name="fat" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Muscles Mass %*</label>
                                                            <input type="number" min="0" name="muscles" class="form-control" placeholder="16" required>
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc1_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc2_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc3_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc4_desc">
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
                                                            <select name="sc5" class="form-control form-control-lg" id="sc5" required>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc5_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc6_desc">
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
                                                            <select name="sc7" class="form-control form-control-lg" id="sc8" required>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc7_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc8_desc">
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
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Describe..." name="sc9_desc">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row mt-3">
                                                    <div class="col-lg-6 mt-3">
                                                        <div class="form-group mb-4">
                                                            <label class="text-label">Level of Squat Strength*</label>
                                                            <select name="squatstrength" class="form-control form-control-lg" id="squatweak" required>
                                                                <option hidden>Select activity level</option>
                                                                <option value="weak">Weak</option>
                                                                <option value="moderate">Moderate</option>
                                                                <option value="strong">Strong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mt-4 squat-weak">
                                                        <div class="form-group">
                                                            <label class="text-label">If weak squat activation, Describe Briefly*</label>
                                                            <textarea type="text" name="squatcore" class="form-control text-area-hight" placeholder="Describe Briefly..."></textarea>
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
                                            <input type="date" name="doj" class="form-control" placeholder="Cellophane Square" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Month End Date</label>
                                            <input type="text" class="form-control disable" name="mde" value="undefine" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Training Type*</label>
                                            <select name="ttype" class="form-control form-control-lg" required>
                                                <option hidden>Select Training Type</option>
                                                <option value="PT">Person Training (PT)</option>
                                                <option value="GT">General Training (GT)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Name</label>
                                            <select name="tname" id="single-select" class="form-control form-control-lg" required>
                                                <option hidden>Select Trainer</option>
                                                @foreach ($trainers as $trainer)
                                                <option value="{{$trainer->first_name . ' '. $trainer->last_name}}">{{$trainer->first_name . ' '. $trainer->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Status*</label>
                                            <select name="status" class="form-control form-control-lg" required>
                                                <option hidden>Select status</option>
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Reference Name</label>
                                            <input type="text" name="reference" class="form-control" placeholder="Atif Aslam">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Registration Fee*</label>
                                            <input type="text" name="regfee" class="form-control" placeholder="3000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Gym Fee*</label>
                                            <input type="text" name="gymfee" class="form-control" placeholder="5000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Trainer Fee Per Session*</label>
                                            <input type="text" name="trainfee" class="form-control" placeholder="2000" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Total Session</label>
                                            <input type="number" name="tsession" class="form-control disable" value="0" disabled>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="text-label">Allow Discount?</label>
                                            <div class="material-switch mt-3">
                                                <input id="discounttoggle" hidden name="discounttoggle" value="yes" type="checkbox" />
                                                <label for="discounttoggle" id="toggle-discount" class="label-default"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="discount pl-3 pr-3">
                                        <div class="row">
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Category</label>
                                                    <select name="dcat" class="form-control form-control-lg" required>
                                                        <option hidden>Select Type</option>
                                                        <option value="Family Discount">Family Discount </option>
                                                        <option value="General Discount">General Discount</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Discount Type</label>
                                                    <select name="dtype" id="toggle-discount-select" class="form-control form-control-lg" required>
                                                        <option value="fixed">Fixed Amount</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2 percent-a">
                                                <div class="form-group ">
                                                    <label class="text-label">Enter Percentage %</label>
                                                    <input type="number" min="0" max="100" name="percent" placeholder="10" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2 fixed-a">
                                                <div class="form-group ">
                                                    <label class="text-label">Enter Amount</label>
                                                    <input type="text" name="fixed" placeholder="1000" class="form-control">
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
                                                            <input type="text" class="form-control" value="09:30" name="mondaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="mondaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="mondaypt" name="mondaypt" hidden type="checkbox" />
                                                    <label for="mondaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="tuesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="tuesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="tuesdaypt" value="yes" hidden name="tuesdaypt" type="checkbox" />
                                                    <label for="tuesdaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="wednesdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="wednesdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="wednesdaypt" value="yes" name="wednesdaypt" hidden type="checkbox" />
                                                    <label for="wednesdaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="thursdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="thursdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="thursdaypt" value="yes" hidden name="thursdaypt" type="checkbox" />
                                                    <label for="thursdaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="fridaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="fridaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="fridaypt" value="yes" name="fridaypt" hidden type="checkbox" />
                                                    <label for="fridaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="saturdaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="saturdaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="saturdaypt" value="yes" hidden name="saturdaypt" type="checkbox" />
                                                    <label for="saturdaypt" class="label-default"></label>
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
                                                            <input type="text" class="form-control" value="09:30" name="sundaytimein"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>End Timming</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="10:30" name="sundaytimeout"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <p class="card-text d-inline">Person Training (PT)?</p>
                                                <div class="material-switch mt-3 float-right">
                                                    <input id="sundaypt" hidden name="sundaypt" value="yes" type="checkbox" />
                                                    <label for="sundaypt" class="label-default"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h4>Confirmation</h4>
                            <section>
                                <div class="checkout-name text-center mt-5 pt-5">
                                    <img src="{{asset('./images/custom/check.png')}}" alt="check image" width="100px">
                                    <h1 class="display-5 mt-3">Your Form is Done</h1>
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