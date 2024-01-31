@extends('user.layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .fa-eye-slash {
            /* display: none; */
        }
    </style>
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    {{-- <b>Event organized by Laghu Udyog Bharti & Government Polytechnic,
                        Nashik (DTE)</b> --}}
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Users Master</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                                action="{{ route('project-registration-save') }}" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                <div class="row">
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                                    <input type="hidden" class="form-control" name="registration_type" id="registration_type"
                                                placeholder="" value="{{ $user_data->registration_type }}" >

                                  
                                   

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_email" id="u_email"
                                                placeholder="" value="{{ $user_data['u_email'] }}" readonly>
                                            @if ($errors->has('u_email'))
                                                <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Contact No</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                                placeholder="" value="{{ $user_data['mobile_no'] }}" readonly>
                                            @if ($errors->has('mobile_no'))
                                                <span class="red-text"><?php echo $errors->first('mobile_no', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="project_title">Project Title</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="project_title"
                                                id="project_title" placeholder="" value="{{ old('project_title') }}">
                                            @if ($errors->has('project_title'))
                                                <span class="red-text"><?php echo $errors->first('project_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="academic_year">Select Academic Year </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="academic_year" name="academic_year">
                                                <option value="">Select</option>
                                                <option value="1"
                                                    @if (old('academic_year') == '1') {{ 'selected' }} @endif>
                                                    First Year
                                                </option>
                                                <option value="2"
                                                    @if (old('academic_year') == '2') {{ 'selected' }} @endif>
                                                    Second Year
                                                </option>
                                                <option value="3"
                                                    @if (old('academic_year') == '3') {{ 'selected' }} @endif>
                                                    Third Year
                                                </option>
                                                <option value="4"
                                                    @if (old('academic_year') == '4') {{ 'selected' }} @endif>
                                                    Fourth Year
                                                </option>
                                                <option value="5"
                                                    @if (old('academic_year') == '5') {{ 'selected' }} @endif>
                                                    Other
                                                </option>
                                            </select>
                                            @if ($errors->has('academic_year'))
                                                <span class="red-text"><?php echo $errors->first('academic_year', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="education_type">Select Qualification </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="education_type" name="education_type">
                                                <option value="">Select</option>


                                                <option value="1"
                                                    @if (old('education_type') == '1') {{ 'selected' }} @endif>
                                                    ITI
                                                </option>
                                                <option value="2"
                                                    @if (old('education_type') == '2') {{ 'selected' }} @endif>
                                                    Diploma
                                                </option>
                                                <option value="3"
                                                    @if (old('education_type') == '3') {{ 'selected' }} @endif>
                                                    Degree
                                                </option>
                                                {{-- <option value="3"
                                                    @if (old('education_type') == '3') {{ 'selected' }} @endif>Other
                                            </option>
                                            --}}

                                            </select>
                                            @if ($errors->has('education_type'))
                                                <span class="red-text"><?php echo $errors->first('education_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" id="other_institute" style="display:none">
                                        <div class="form-group">
                                            <label for="institute_other_name">Enter Institute Details</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="institute_other_name"
                                                id="institute_other_name" placeholder=""
                                                value="{{ old('institute_other_name') }}">
                                            @if ($errors->has('institute_other_name'))
                                                <span class="red-text"><?php echo $errors->first('institute_other_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name_of_institute">Select Name Of Institute</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="name_of_institute" name="name_of_institute"
                                                onchange="myFunction(this.value)">
                                                <option value="">Select</option>
                                                <option value="0"
                                                    @if (old('name_of_institute') == '0') {{ 'selected' }} @endif>Other
                                                </option>

                                            </select>
                                            @if ($errors->has('name_of_institute'))
                                                <span class="red-text"><?php echo $errors->first('name_of_institute', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" id="other_name_of_school"
                                        style="display:none">
                                        <div class="form-group">
                                            <label for="name_of_institute_other">Enter Institute Details</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="name_of_institute_other"
                                                id="name_of_institute_other" placeholder=""
                                                value="{{ old('name_of_institute_other') }}">
                                            @if ($errors->has('name_of_institute_other'))
                                                <span class="red-text"><?php echo $errors->first('name_of_institute_other', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" id="branch_details_box">
                                        <div class="form-group">
                                            <label for="branch_details">Select Branch </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="branch_details" name="branch_details">
                                                <option value="">Select</option>


                                                <option value="1"
                                                    @if (old('branch_details') == '1') {{ 'selected' }} @endif>
                                                    Artificial Intelligence(AI)and Data Science
                                                </option>
                                                <option value="2"
                                                    @if (old('branch_details') == '2') {{ 'selected' }} @endif>
                                                    Artificial Intelligence(AI)and Machine Learning
                                                </option>
                                                <option value="3"
                                                    @if (old('branch_details') == '3') {{ 'selected' }} @endif>
                                                    Automation and Robotics
                                                </option>
                                                <option value="4"
                                                    @if (old('branch_details') == '4') {{ 'selected' }} @endif>
                                                    Automobile
                                                </option>
                                                <option value="5"
                                                    @if (old('branch_details') == '5') {{ 'selected' }} @endif>
                                                    Checimal
                                                </option>
                                                <option value="6"
                                                    @if (old('branch_details') == '6') {{ 'selected' }} @endif>
                                                    Civil
                                                </option>
                                                <option value="7"
                                                    @if (old('branch_details') == '7') {{ 'selected' }} @endif>
                                                    Civil
                                                    and Environmental
                                                </option>
                                                <option value="8"
                                                    @if (old('branch_details') == '8') {{ 'selected' }} @endif>
                                                    Computer
                                                </option>
                                                <option value="8"
                                                    @if (old('branch_details') == '8') {{ 'selected' }} @endif>
                                                    Computer
                                                    Science and Design
                                                </option>
                                                <option value="9"
                                                    @if (old('branch_details') == '9') {{ 'selected' }} @endif>
                                                    Computer
                                                    Technology
                                                </option>
                                                <option value="9"
                                                    @if (old('branch_details') == '9') {{ 'selected' }} @endif>
                                                    Dress
                                                    Designing and
                                                    Garnment Manufacturing
                                                </option>
                                                <option value="10"
                                                    @if (old('branch_details') == '10') {{ 'selected' }} @endif>
                                                    Electrical

                                                </option>
                                                <option value="11"
                                                    @if (old('branch_details') == '11') {{ 'selected' }} @endif>
                                                    Electronic and Telecommunication

                                                </option>
                                                <option value="12"
                                                    @if (old('branch_details') == '12') {{ 'selected' }} @endif>
                                                    Information Technology

                                                </option>
                                                <option value="13"
                                                    @if (old('branch_details') == '13') {{ 'selected' }} @endif>
                                                    Instrumentation and Control Interior Design

                                                </option>
                                                <option value="14"
                                                    @if (old('branch_details') == '14') {{ 'selected' }} @endif>
                                                    Mechanical

                                                </option>
                                                <option value="15"
                                                    @if (old('branch_details') == '15') {{ 'selected' }} @endif>
                                                    Mechatronics

                                                </option>
                                                <option value="16"
                                                    @if (old('branch_details') == '16') {{ 'selected' }} @endif>Polymer
                                                    Technology

                                                </option>
                                                <option value="17"
                                                    @if (old('branch_details') == '17') {{ 'selected' }} @endif>Robotics
                                                    and Automation

                                                </option>
                                                <option value="18"
                                                    @if (old('branch_details') == '18') {{ 'selected' }} @endif>
                                                    Other


                                                </option>


                                            </select>
                                            @if ($errors->has('branch_details'))
                                                <span class="red-text"><?php echo $errors->first('branch_details', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" id="other_branch_details_box"
                                        style="display:none">
                                        <div class="form-group">
                                            <label for="other_branch_details">Branch</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="other_branch_details form-control"
                                                id="other_branch_details" name="other_branch_details"
                                                value="{{ old('other_branch_details') }}">
                                            @if ($errors->has('other_branch_details'))
                                                <span class="red-text"><?php echo $errors->first('other_branch_details', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="payment_type"><b>Registration fees Rs.1000/- paid by</b>
                                            </label>&nbsp<span class="red-text">*</span>
                                            
                                            <select class="form-control" id="payment_type" name="payment_type"
                                                onchange="payment_type(this.value)">
                                                <option value="">Select Payment Mode</option>
                                                <option value="neft"
                                                    @if (old('payment_type') == 'neft') {{ 'selected' }} @endif>NEFT
                                                </option>
                                                <option value="qr_code"
                                                    @if (old('payment_type') == 'qr_code') {{ 'selected' }} @endif>QR Code
                                                </option>

                                            </select>
                                            @if ($errors->has('payment_type'))
                                                <span class="red-text"><?php echo $errors->first('payment_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="transaction_details">Payment confirmation - UTR
                                                Code</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="transaction_details form-control"
                                                id="transaction_details" name="transaction_details"
                                                value="{{ old('transaction_details') }}">
                                            @if ($errors->has('transaction_details'))
                                                <span class="red-text"><?php echo $errors->first('transaction_details', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <p class="mt-3">
                                                <label for="bankdetails" class="bank_details">
                                                    <b>Bank details:</b><br />
                                                    A/c Name: Laghu Udyog Bharti <br />
                                                    Bank: TJSB Bank <br />
                                                    Branch: Gangapur Rd. <br />
                                                    A/c No.: 021110100000661 <br />
                                                    IFS Code: TJSB0000021 <br />
                                                </label>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <p class="mt-3">

                                                <img style="height: 300px;width: 250px;"
                                                    src="{{ asset('website\assets\images\qr.jpeg') }}" alt="" />
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="payment_proof">Payment Acknowledgement / Receipt</label>&nbsp<span
                                                class="red-text"><br>Upload Payment proof in
                                                jpeg,png,jpg format with size 1 MB*</span><br>
                                            <input type="file" name="payment_proof" id="payment_proof"
                                                accept="image/*" value="{{ old('payment_proof') }}"><br>
                                            @if ($errors->has('payment_proof'))
                                                <span class="red-text"><?php echo $errors->first('payment_proof', ':message'); ?></span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="project_presentation">Upload Project Presentation
                                            </label>&nbsp
                                            <span class="red-text"><br>
                                                Upload project presentation only pdf
                                                format with 5 MB*</span>
                                            <br>
                                            <input type="file" name="project_presentation" id="project_presentation"
       accept=".pdf, .ppt, .pptx, .doc, .docx" value="{{ old('project_presentation') }}"><br>

                                            @if ($errors->has('project_presentation'))
                                                <span class="red-text"><?php echo $errors->first('project_presentation', ':message'); ?></span>
                                            @endif
                                        </div>

                                    </div>




                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table width="100%" class="table table-bordered">
                                                <thead>
                                                    <th>Sr No.</th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Upload Passport Photo <br><span style="color: red";>(jpeg,png,jpg
                                                            format
                                                            with
                                                            size 2 MB*)
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    @for ($index = 1; $index <= 5; $index++)
                                                        <tr>
                                                            <td>{{ $index }}
                                                                <input type="hidden" class="form-control"
                                                                    name="sr_no_{{ $index }}"
                                                                    id="sr_no_{{ $index }}" placeholder=""
                                                                    value="{{ $index }}">
                                                            </td>
                                                            <td>
                                                                <div class="form-group width-input">
                                                                    <input type="text" class="form-control"
                                                                        name="{{ 'f_name_' . $index }}"
                                                                        id="{{ 'f_name_' . $index }}" placeholder=""
                                                                        value="{{ old('f_name_' . $index) }}"
                                                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    @if ($errors->has('f_name_' . $index))
                                                                        <span class="red-text"><?php echo $errors->first('f_name_' . $index, ':message'); ?></span>
                                                                    @endif
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="form-group width-input">
                                                                    <input type="text" class="form-control"
                                                                        name="{{ 'm_name_' . $index }}"
                                                                        id="{{ 'm_name_' . $index }}" placeholder=""
                                                                        value="{{ old('m_name_' . $index) }}"
                                                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    @if ($errors->has('m_name_' . $index))
                                                                        <span class="red-text"><?php echo $errors->first('m_name_' . $index, ':message'); ?></span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group width-input">
                                                                    <input type="text" class="form-control"
                                                                        name="{{ 'l_name_' . $index }}"
                                                                        id="{{ 'l_name_' . $index }}" placeholder=""
                                                                        value="{{ old('l_name_' . $index) }}"
                                                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                    @if ($errors->has('l_name_' . $index))
                                                                        <span class="red-text"><?php echo $errors->first('l_name_' . $index, ':message'); ?></span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="file"
                                                                        name="passport_photo_{{ $index }}"
                                                                        id="passport_photo_{{ $index }}"
                                                                        accept="image/*"
                                                                        value="{{ old('passport_photo_' . $index) }}"><br>
                                                                    @if ($errors->has('passport_photo_' . $index))
                                                                        <span class="red-text"><?php echo $errors->first('passport_photo_' . $index, ':message'); ?></span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 p-3">
                                    <div class="form-group">
                                        <label for="agree_checkbox">
                                            <input type="checkbox" name="agree_checkbox" id="agree_checkbox">
                                            By accessing this form, I agree to comply that what ever information I am
                                            providing is true to my knowledge.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save
                                        &amp; Submit</button>
                                </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function submitRegister() {
            document.getElementById("frm_register").submit();
        }
    </script>



    <script>
        $(document).ready(function() {

            $("#education_type").change(function(e) {
                if ($("#education_type").val() == '6') {
                    $("#other_institute").show();
                } else {
                    $("#other_institute").attr("style", "display:none");
                }
            });



            $("#name_of_institute").change(function(e) {
                if ($("#name_of_institute").val() == '21' || $("#name_of_institute").val() == '47' || $(
                        "#name_of_institute").val() == '69') {
                    $("#other_name_of_school").show();


                } else {
                    $("#other_name_of_school").attr("style", "display:none");


                }
            });



            $('#education_type').change(function(e) {
                var education_type = $('#education_type').val();
                getEducationDetails(education_type);
            });

            if ("{{ old('education_type') }}") {
                getEducationDetails("{{ old('education_type') }}");
            }

        });


        function getEducationDetails(education_type) {

            $('#name_of_institute').empty();


            $('#name_of_institute').html(
                '<option value="">Select Name Of Institute</option>');

            if (education_type == '1' || education_type == '2' || education_type == '3') {
                $.ajax({
                    url: '{{ route('get-college-list') }}',
                    type: 'POST',
                    data: {
                        education_type: education_type
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        if (response.institute_list.length > 0) {
                            $('#name_of_institute').html(
                                '<option value="">Select Name Of Institute</option>');
                            $.each(response.institute_list, function(index,
                                institute_list) {
                                $('#name_of_institute').append('<option value="' +
                                    institute_list
                                    .id +
                                    '">' + institute_list.institute_name +
                                    '</option>');
                            });

                            $('#name_of_institute').val('{{ old('name_of_institute') }}');



                        }
                    }
                });
            } else {

            }

        }
    </script>

    <script>
        $("#other_branch_details_box").hide();
        $("#branch_details").change(function(e) {
            // var val = $('#branch_details').val();
            // alert(val);

            if ($("#branch_details").val() == '18') {

                $("#other_branch_details_box").show();
            } else {
                $("#other_branch_details_box").attr("style", "display:none");
            }
        });
    </script>
    <script>
        function validateForm() {
            var agreeCheckbox = document.getElementById('agree_checkbox');
            if (agreeCheckbox.checked) {
                document.getElementById("frm_register").submit();
                return true;
            } else {
                alert('Please agree to submit.');
                return false;
            }
        }
    </script>
@endsection
