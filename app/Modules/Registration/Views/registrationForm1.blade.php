@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $title }}
                    <a href="{{ url('/registration') }}" class="btn btn-secondary float-end"> Back</a>

                    @if ($mode == 'show')
                        <a href="{{ route('registration.edit', $registration->id) }}"
                            class="btn btn-primary me-2 float-end"> Edit</a>
                    @endif
                </h5>
                <form action="{{ route('registration.store') }}" method="POST" class="p-4" id="form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card shadow" id="register">
                        <div class="card-body">

                            <h5 class="card-title border-bottom border-sucess text-center">
                                Employee Information Form
                            </h5>


                            <div class="form-section">
                                <h5 class="mb-4"> Personal Information </h5>
                                <!-- Employee Info-->


                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-lg-6 mb-2">
                                            <input type="hidden" name="employee[id]" id="id"
                                                value="{{ $registration->id }}">

                                            <label for="employee_number">Employee Number</label>
                                            <input type="text" class="form-control"
                                                {{ $mode == 'show' ? 'disabled' : 'disabled' }}
                                                name="employee[employee_number]" placeholder="Employee Number"
                                                id="employee_number" value="{{ $registration->employee_number }}">

                                        </div>
                                    </div>

                                    {{-- <input type="hidden" id="currSection" name="currSection" value="sectionA"> --}}

                                    {{-- Roles --}}

                                    <div class="row">
                                        <label for="roles">Roles</label>
                                        <div class="form-group col-lg-6 mb-2">
                                            <select {{ $mode == 'show' ? 'disabled' : '' }}
                                                class="roles form-select mt-2 dynamic" id="roles" name="employee[role_code]"
                                                value="{{ $registration->role_code }}" aria-label="Default select example"
                                                required>
                                                <option selected> </option>
                                                @foreach ($roles as $role)
                                                    <option
                                                        {{ $registration->role_code == $role->code ? 'selected' : '' }}
                                                        value="{{ $role->code }}">
                                                        {{ $role->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="firstname">Name</label>
                                        <div class="form-group col-lg-6 mb-2">


                                            <input {{ $mode == 'show' ? 'disabled' : '' }} type="text"
                                                class="form-control" name="employee[firstname]" id="firstname"
                                                value="{{ $registration->firstname }}" pattern="^\D*$">
                                            <div id="" class="form-text">First Name</div>
                                        </div>

                                        <div class="form-group col-lg-6 mb-2">
                                            <label for="lastname"></label>
                                            <input type="text" class="form-control"
                                                {{ $mode == 'show' ? 'disabled' : '' }} name="employee[lastname]"
                                                id="lastname" value="{{ $registration->lastname }}" pattern="^\D*$">
                                            <div id="" class="form-text">Last Name</div>
                                        </div>
                                    </div>

                                    <!-- Address Info-->

                                    <div class=" col-lg-12 mb-3">
                                        <label for="form-label" id=""> Address</label>
                                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                                            name="employee[streetAddress1]" id="streetAddress1"
                                            value="{{ $registration->streetAddress1 }}">
                                        <div id="" class="form-text">Street Address</div>
                                    </div>

                                    <div class=" col-lg-12 mb-3">
                                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                                            name="employee[streetAddress2]" id="streetAddress2"
                                            value="{{ $registration->streetAddress2 }}">
                                        <div id="" class="form-text">Street Address Line 2</div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-lg-6 mb-3">
                                                <input type="text" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[city]"
                                                    id="city" value="{{ $registration->city }}">
                                                <div id="" class="form-text">City</div>
                                            </div>

                                            <div class=" col-lg-6 mb-3">
                                                <input type="text" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[state]"
                                                    id="state" value="{{ $registration->state }}">
                                                <div id="" class="form-text">State / Province</div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Contact Info-->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-lg-6 mb-3">
                                                <label for="phonenumber"> Phone
                                                    Number</label>
                                                <input type="text" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[phonenumber]"
                                                    id="phonenumber" value="{{ $registration->phonenumber }}"
                                                    placeholder="(000)000-0000">
                                            </div>



                                            <div class=" col-lg-6 mb-3">
                                                <label for="homenumber" id="">Home Phone
                                                    Number</label>
                                                <input type="text" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[homenumber]"
                                                    id="homenumber" value="{{ $registration->homenumber }}"
                                                    placeholder="(000)000-0000">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class=" col-lg-6 mb-3">
                                                <label for="email" id="">Email</label>
                                                <input type="email" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[email]"
                                                    id="email" value="{{ $registration->email }}">
                                                <div id="" class="form-text">example@example.com</div>
                                            </div>

                                            <!-- Birthday Info-->

                                            <div class=" col-lg-6 mb-3">
                                                <label for="birthday" id="">Birthday</label>

                                                <input type="date" class="form-control"
                                                    {{ $mode == 'show' ? 'disabled' : '' }} name="employee[birthday]"
                                                    id="birthday" value="{{ $registration->birthday }}">
                                                <div id="" class="form-text">Date</div>
                                            </div>
                                        </div>

                                        <!-- Upload Photo-->
                                        <div class="col-lg-12">

                                            <label class="mb-2" for="photo">Please upload your photo </label>


                                            @if ($mode == 'show' ? 'disabled' : '')
                                                <input type="file"
                                                    value="{{ isset($registration->image_path) ? '/storage/images/' . $registration->image_path : '' }}"
                                                    class="form-control" aria-label="file example" name="image_path"
                                                    id="image_path" required>

                                                <img src="{{ isset($registration->image_path) ? '/storage/images/' . $registration->image_path : '' }}"
                                                    id="image">
                                            @elseif ($mode == 'edit' ? 'disabled' : '')
                                                <input type="file"
                                                    value="{{ isset($registration->image_path) ? '/storage/images/' . $registration->image_path : '' }}"
                                                    class="form-control" aria-label="file example" name="image_path"
                                                    id="image_path">

                                                <img src="{{ isset($registration->image_path) ? '/storage/images/' . $registration->image_path : '' }}"
                                                    id="image">
                                            @endif
                                        </div>
                                        {{-- <div class="custom-file col-lg-12">
                                <label class="mb-2" for="photo">Please upload your photo  </label>
                                <input type="file" class="form-control" aria-label="file example" class="custom-file-input" value="{{ $registration->image_path }}"
                                    {{ $mode == 'show' ? 'disabled' : '' }} name="image_path" id="image_path" required>
                                <img src="/storage/images/{{ $registration->image_path }}" alt="Photo"/>

                             </div> --}}

                                    </div>
                                    <div class="card-footer">

                                        <button id="first" type="button"
                                            class="btn btn-primary pe-4 ps-4 float-end">Next</button>
                                        {{-- href=" url('registration/create') --}}
                                    </div>

                                    <style>
                                        img#image {
                                            max-height: 50vh;
                                            max-width: 40vw;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow" id="job" {{-- style="display:none" --}}>
                        <div class="card-body">
                            <div class="form-group p-4">

                                <h5 class="card-title pb-4">
                                    Job Information
                                </h5>



                                <div class="col-lg-6 mb-4">
                                    <input type="hidden" name="job[id]" value="{{ $job->id }}">

                                    <input type="hidden" name="job[employee_id]" id="id" value="{{ $registration->id }}">

                                    <label class="form-label" id="titleContent">Title</label>
                                    <input {{ $mode == 'show' ? 'disabled' : '' }} type="text" class="form-control"
                                        name="job[title]" id="title" placeholder="" value="{{ $job->title }}">
                                </div>


                                <!-- Department -->
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Department</label>
                                    <select {{ $mode == 'show' ? 'disabled' : '' }} class="form-select"
                                        aria-label="Default select example" name="job[department]" id="department"
                                        value="{{ $job->department }}" required>
                                        <option value="Please Select">Please Select </option>
                                        {{-- <option {{ $job->department == 'IT Department' ? 'selected' : '' }}
                                            value="IT Department">IT
                                            Department</option>
                                        <option {{ $job->department == 'Sales Department' ? 'selected' : '' }}
                                            value="Sales Department">Sales Department</option>
                                        <option {{ $job->department == 'Engineering Department' ? 'selected' : '' }}
                                            value="Engineering Department">Engineering Department</option>
                                        <option {{ $job->department == 'HR Department' ? 'selected' : '' }}
                                            value="HR Department">HR
                                            Department</option>
                                        <option {{ $job->department == 'Accounting Department' ? 'selected' : '' }}
                                            value="Accounting Department">Accounting Department</option> --}}
                                            @foreach ($departments as $department)
                                            <option
                                                {{ $job->department == $department->code ? 'selected' : '' }}
                                                value="{{$department->code }}">
                                                {{ $department->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <input type="hidden" id="currSection" name="currSection" value="sectionB"> --}}

                                <!-- Working Type -->
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Working Type</label>
                                    <select {{ $mode == 'show' ? 'disabled' : '' }} class="form-select"
                                        aria-label="Default select example" name="job[working_type]" id="working_type"
                                        value="{{ $job->working_type }}" required>
                                        <option value="Please Select">Please Select </option>

                                        {{-- <option {{ $job->working_type == 'HR Manager' ? 'selected' : '' }}
                                            value="HR Manager">
                                            HR Manager</option>
                                        <option {{ $job->working_type == 'IT Specialist' ? 'selected' : '' }}
                                            value="IT Specialist">
                                            IT Specialist</option>
                                        <option {{ $job->working_type == 'Accountant' ? 'selected' : '' }}
                                            value="Accountant">
                                            Accountant</option>
                                        <option {{ $job->working_type == 'Business Analyst' ? 'selected' : '' }}
                                            value="Business Analyst">
                                            Business Analyst</option>
                                        <option {{ $job->working_type == 'Sales Manager' ? 'selected' : '' }}
                                            value="Sales Manager">
                                            Sales Manager</option> --}}
                                            @foreach ($working_types as $working)
                                                    <option
                                                        {{ $job->working_type == $working->code ? 'selected' : '' }}
                                                        value="{{$working->code }}">
                                                        {{ $working->description }}</option>
                                                @endforeach
                                    </select>
                                </div>

                                <!-- Start Date -->
                                <div class="col-lg-6">
                                    <label class="form-label">Start Date</label>
                                    <input {{ $mode == 'show' ? 'disabled' : '' }} type="date" class="form-control"
                                        placeholder="MM-DD-YYYY" name="job[start_date]" id="start_date"
                                        value="{{ $job->start_date }}">
                                </div>
                                <div id="" class="form-text">Date</div>
                            </div>

                            <div class="card-footer">

                                <button type="button" id="previous"
                                    class="btn btn-primary pe-4 ps-4 float-start">Previous</button>

                                <button type="button" id="nextpage"
                                    class="btn btn-primary pe-4 ps-4 float-end">Next</button>
                                {{-- href=" url('registration/create') --}}
                            </div>

                        </div>
                    </div>
            </div>




            <div class="card shadow" id="emergency" {{-- style="display:none" --}}>
                <div class="card-body">
                    <div class="form-group p-4">

                    <div class="form-group col-lg-12 mb-2">
                        <input type="hidden" name="emergency[id]" value="{{ $emergency->id }}">

                        <input type="hidden" name="emergency[employee_id]" id="id" value="{{ $registration->id }}">


                        <label for="form-label"> Primary Emergency | Contact Name</label>
                    </div>

                    <div class="form-group col-lg-6  mb-4">
                        <input type="text" {{ $mode == 'show' ? 'disabled' : '' }} class="form-control"
                            name="emergency[contact_firstname]" id="contact_firstname" pattern="^\D*$"
                            value="{{ $emergency->contact_firstname }}">
                        <div id="" class="form-text">First Name</div>
                    </div>
                    {{-- <input type="hidden" id="currSection" name="currSection" value="sectionC"> --}}


                    <div class="form-group col-lg-6  mb-4">
                        <input type="text" {{ $mode == 'show' ? 'disabled' : '' }} class="form-control "
                            name="emergency[contact_lastname]" id="contact_lastname" pattern="^\D*$"
                            value="{{ $emergency->contact_lastname }}">
                        <div id="" class="form-text">Last Name</div>
                    </div>
                </div>

                <!-- Primary Emergency | Phone Number -->



                <div class="col-lg-6 mb-4">
                    <label class="form-label">Primary Emergency | Phone Number</label>
                    <input type="text" {{ $mode == 'show' ? 'disabled' : '' }} class="form-control"
                        name="emergency[contact_phonenumber]" placeholder="(000)000-0000" id="contact_phonenumber"
                        value="{{ $emergency->contact_phonenumber }}">
                    <div id="" class="form-text">Please enter a valid phone number</div>

                </div>

                <!-- Primary Emergency | What is your relationship with this person? -->
                <div class="col-lg-12">
                    <label class="form-label">Primary Emergency | What is your
                        relationship with
                        this person?</label>
                </div>

                <div class="col-lg-6 mb-4">
                    <input type="text" {{ $mode == 'show' ? 'disabled' : '' }} class="form-control"
                        name="emergency[relationship]" placeholder="" id="relationship"
                        value="{{ $emergency->relationship }}">
                </div>




                <!-- Secondary Emergency | Contact Name -->

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <label for="form-label"> Secondary Emergency | Contact Name</label>
                    </div>

                    <div class="col-lg-6 mb-2">
                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                            name="emergency[secondcontact_fname]" id="secondcontact_fname" pattern="^\D*$"
                            value="{{ $emergency->secondcontact_fname }}">
                        <div id="" class="form-text">First Name</div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                            name="emergency[secondcontact_lname]" id="secondcontact_lname" pattern="^\D*$"
                            value="{{ $emergency->secondcontact_lname }}">
                        <div id="" class="form-text">Last Name</div>
                    </div>
                </div>

                <!-- Secondary Emergency | Phone Number -->


                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label class="form-label">Secondary Emergency | Phone Number</label>
                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                            name="emergency[second_phonenumber]" placeholder="(000)000-0000"
                            value="{{ $emergency->second_phonenumber }}" id="second_phonenumber">
                        <div id="" class="form-text">Please enter a valid phone number</div>
                    </div>

                    <!-- Secondary Emergency | What is your relationship with this person? -->
                    <div class="col-lg-12">
                        <label class="form-label">Secondary Emergency | What is your
                            relationship
                            with
                            this person?</label>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <input type="text" class="form-control" {{ $mode == 'show' ? 'disabled' : '' }}
                            name="emergency[second_relationship]" id="second_relationship"
                            value="{{ $emergency->second_relationship }}" placeholder="">
                    </div>
                </div>


                <!-- Footer-->
                <button id="back" type="button" class="btn btn-secondary pe-4 ps-4 float-start">Back</button>

                <button type="submit" {{ $mode == 'show' ? 'disabled' : '' }}
                    class="btn btn-primary pe-4 ps-4 float-end">Submit</button>


            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        // if ($("#first").click(function() {
        $(document).ready(function() {
            $("#job").hide();
            $("#emergency").hide();
            jQuery.validator.setDefaults({
                // debug: true,
                success: "valid",
                // ignore: []
            });
            let section = $('#currSection').val();
            console.log("first section");
            var forms = $('#form');
            forms.validate({
                errorClass: "is-invalid",
                validClass: "is-valid",
                rules: {
                    //job Section B
                    "job[title]": {
                        required: true
                    },
                    "job[department]": {
                        required: {
                            depends: function(element) {
                                if ('Please Select' == $('#department').val()) {
                                    //Set predefined value to blank.
                                    $('#department').val('');
                                }
                                return true;
                            }
                        }
                    },
                    "job[working_type]": {
                        required: {
                            depends: function(element) {
                                if ('Please Select' == $('#working_type').val()) {
                                    //Set predefined value to blank.
                                    $('#working_type').val('');
                                }
                                return true;
                            }
                        }
                    },
                    "job[start_date]": {
                        dateISO: true,
                        required: true
                    },
                    //job Section A
                    "employee[firstname]": {
                        required: true
                    },
                    "employee[lastname]": {
                        required: true
                    },
                    "employee[streetAddress1]": {
                        required: true
                    },
                    "employee[streetAddress2]": {
                        required: true
                    },
                    "employee[city]": {
                        required: true
                    },
                    "employee[state]": {
                        required: true
                    },
                    "employee[phonenumber]": {
                        number: true,
                        required: true
                    },
                    "employee[homenumber]": {
                        required: true,
                        number: true
                    },
                    "employee[email]": {
                        required: true
                    },
                    "employee[birthday]": {
                        dateISO: true,
                        required: true
                    },
                    image_path: {
                        extension: "jpg|png",
                        accept: "image/*",
                        required: true
                    },
                    //Section C emergency
                    "emergency[contact_firstname]": {
                        required: true
                    },
                    "emergency[contact_lastname]": {
                        required: true
                    },
                    "emergency[contact_phonenumber]": {
                        number: true,
                        required: true
                    },
                    "emergency[relationship]": {
                        required: true
                    },
                    "emergency[secondcontact_fname]": {
                        required: true
                    },
                    "emergency[secondcontact_lname]": {
                        required: true
                    },
                    "emergency[second_phonenumber]": {
                        number: true,
                        required: true
                    },
                    "emergency[second_relationship]": {
                        required: true
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                }
            });
            $("#first").click(function() {
                if (forms.valid()) {
                    $("#job").show();
                    $("#register").hide();
                    $("#emergency").hide();
                }
            });
            $("#nextpage").click(function() {
                if (forms.valid()) {
                    $("#job").hide();
                    $("#register").hide();
                    $("#emergency").show();
                }
            });
            $('#previous').click(function() {
                $('#register').show();
                $('#job').hide();
                $('#emergency').hide();
            });
            $('#back').click(function() {
                $('#register').hide();
                $('#job').show();
                $('#emergency').hide();
            });
        });
    </script>
@endsection
<style>
    /* #job {
            display: none;
        }
        #emergency {
            display: none;
        } */
    .is-invalid {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: .3875cm;
        color: #dc3545;
    }
</style>
