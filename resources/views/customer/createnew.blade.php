<style>
    .bootstrap-select.form-control-lg .dropdown-toggle{
        border: 0px none !important;
        padding: 0.9rem 1rem !important;
        font-size: 15px !important;
    }
</style>

{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

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
                                <form action="#" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
                                    <div>
                                       <h4>Personal Info</h4>
                                        <section class="pl-2 pr-2">
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
                                                        <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="abc@xyz.com" required>
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
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Date of Birth</label>
                                                        <input type="date" name="dob" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">CNIC</label>
                                                        <input type="text" name="cnic" class="form-control" placeholder="42874-7358088-1">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Weight (KG)</label>
                                                        <input type="number" min="20" max="300" name="weight" class="form-control" placeholder="40">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="text-label">Upload Image</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                          <input type="file" name="cimg" class="custom-file-input" id="customer-img">
                                                          <label class="custom-file-label" for="customer-img">Choose file</label>
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
                                                        <input type="text" name="tname" class="form-control disable" disabled value="undefine">
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
                                                            <input id="discounttoggle" hidden name="discounttoggle" value="yes" type="checkbox"/>
                                                            <label for="discounttoggle" id="toggle-discount" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="discount pl-3 pr-3">
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="form-group">
                                                                <label class="text-label">Discount Category</label>
                                                                <select name="dtype" class="form-control form-control-lg" required>
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
                                                                <input id="mondaypt" name="mondaypt" hidden type="checkbox"/>
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
                                                                <input id="tuesdaypt" hidden name="tuesdaypt" type="checkbox"/>
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
                                                                <input id="wednesdaypt" name="wednesdaypt" hidden type="checkbox"/>
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
                                                                <input id="thursdaypt" hidden name="thursdaypt" type="checkbox"/>
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
                                                                <input id="fridaypt" name="fridaypt" hidden type="checkbox"/>
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
                                                                <input id="saturdaypt" hidden name="saturdaypt" type="checkbox"/>
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
                                                                <input id="sundaypt" hidden name="sundaypt" type="checkbox"/>
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
                                               <img src="{{asset('./images/custom/check.png')}}" alt="check image" width="100px" >
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


