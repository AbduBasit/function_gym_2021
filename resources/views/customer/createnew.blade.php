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
                            <div class="card-body">
                                <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                    <div>
                                        <h4>Personal Info</h4>
                                        <section>
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
                                            </div>
                                        </section>
                                        <h4>Account Details</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Date of Joining*</label>
                                                        <input type="date" name="doj" class="form-control" placeholder="Cellophane Square" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Month End Date</label>
                                                        <input type="text" class="form-control disable" name="mde" value="name" disabled>
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
                                                        <input type="text" name="tname" class="form-control disable" disabled value="Zaheer Khan">
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
                                                        <input type="text" name="phoneNumber" class="form-control" placeholder="3000" required>
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Gym Fee*</label>
                                                        <input type="text" name="phoneNumber" class="form-control" placeholder="5000" required>
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Trainer Fee Per Session*</label>
                                                        <input type="text" name="phoneNumber" class="form-control" placeholder="2000" required>
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Total Session</label>
                                                        <input type="number" name="tsession" class="form-control disable" value="10" disabled>
													</div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Allow Discount?</label>
                                                        <div class="material-switch mt-3">
                                                            <input id="someSwitchOptionDefault" hidden name="discounttoggle" type="checkbox"/>
                                                            <label for="someSwitchOptionDefault" class="label-default"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Discount Category</label>
                                                        <select name="dtype" class="form-control form-control-lg" required>
                                                            <option hidden>Select Category</option>
                                                            <option value="percentage">Percentage</option>
                                                            <option value="fixed">Fixed Amount</option>
                                                        </select>
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Discount Type</label>
                                                        <select name="dtype" class="form-control form-control-lg" required>
                                                            <option hidden>Select Type</option>
                                                            <option value="Family Discount">Family Discount </option>
                                                            <option value="General Discount">General Discount</option>
                                                        </select>
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Enter Percentage %</label>
                                                        <input type="number" min="0" max="100" name="percent" placeholder="10" class="form-control">
													</div>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Enter Amount</label>
                                                        <input type="text" name="fixed" placeholder="1000" class="form-control">
													</div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Business Hours</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <h4>Monday *</h4>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <h4>Tuesday *</h4>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <h4>Wednesday *</h4>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <h4>Thrusday *</h4>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <h4>Friday *</h4>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-3 mb-2">
                                                    <div class="form-group">
                                                        <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Email Setup</h4>
                                        <section>
                                            <div class="row emial-setup">
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                            <input type="radio" name="emailclient" id="mailclient11">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-plus" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Gmail</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient12" class="mailclinet mailclinet-office">
                                                            <input type="radio" name="emailclient" id="mailclient12">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-office" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Office</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                            <input type="radio" name="emailclient" id="mailclient13">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">I'm using Drive</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="form-group">
                                                        <label for="mailclient14" class="mailclinet mailclinet-another">
                                                            <input type="radio" name="emailclient" id="mailclient14">
                                                            <span class="mail-icon">
                                                                <i class="fa fa-question-circle-o"
                                                                    aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">Another Service</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="skip-email text-center">
                                                        <p>Or if want skip this step entirely and setup it later</p>
                                                        <a href="javascript:void()">Skip step</a>
                                                    </div>
                                                </div>
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