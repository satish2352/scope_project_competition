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

        .verify_msg {
            /* padding: 20px; */
            background-color: #ec671f;
            /* color: red; */
            font-size: 18px;
            border-style: none;
            text-align: center;
            display: flex;
            justify-content: center;
            text-wrap: balance;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
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
                        <div class="text-center p-3">
                            <button type="button" class="btn btn-primary mb-3 verify_msg">

                                @if ($user_data['is_project_uploaded'] == 1 && $user_data['is_payment_done'] == 0)
                                    Data submitted successfully but payment is not verified by Admin
                                @endif
                            </button>


                        </div>

                        <div class="card-body">
                            <form class="forms-sample" id="frm_register_update" name="frm_register_update" method="post"
                                role="form" action="{{ route('project-registration-upadte') }} "
                                enctype="multipart/form-data" onsubmit="return validate_updateForm()">
                                <div class="row">
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="u_email">Email ID</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="u_email" id="u_email"
                                                placeholder="" value="{{ $user_data['u_email'] }}" disabled>
                                            @if ($errors->has('u_email'))
                                                <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Contact No</label>&nbsp<span class="red-text">*</span>
                                            <input type="text" class="form-control" name="mobile_no" id="mobile_no"
                                                placeholder="" value="{{ $user_data['mobile_no'] }}" disabled>
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
                                                id="project_title" placeholder=""
                                                value="{{ $project_data['project_title'] }}" disabled>
                                            @if ($errors->has('project_title'))
                                                <span class="red-text"><?php echo $errors->first('project_title', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="education_type">Select Academic Year </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="academic_year" name="academic_year" disabled>
                                                <option value="">Select</option>
                                                <option value="1"
                                                    @if (old('academic_year') == '1' || $project_data['academic_year'] == '1') {{ 'selected' }} @endif>
                                                    First Year
                                                </option>
                                                <option value="2"
                                                    @if (old('academic_year') == '2' || $project_data['academic_year'] == '2') {{ 'selected' }} @endif>
                                                    Second Year
                                                </option>
                                                <option value="3"
                                                    @if (old('academic_year') == '3' || $project_data['academic_year'] == '3') {{ 'selected' }} @endif>
                                                    Third Year
                                                </option>
                                                <option value="4"
                                                    @if (old('academic_year') == '4' || $project_data['academic_year'] == '4') {{ 'selected' }} @endif>
                                                    Fourth Year
                                                </option>
                                                <option value="5"
                                                    @if (old('academic_year') == '5' || $project_data['academic_year'] == '5') {{ 'selected' }} @endif>
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
                                            <label for="education_type">Select Qualification</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="education_type" name="education_type"
                                                onchange="education_type(this.value)" disabled>
                                                <option value="">Select</option>
                                                <option value="1"
                                                    @if ($project_data['education_type'] == '1') {{ 'selected' }} @endif>ITI
                                                </option>
                                                <option value="2"
                                                    @if ($project_data['education_type'] == '2') {{ 'selected' }} @endif>Diploma
                                                </option>
                                                <option value="3"
                                                    @if ($project_data['education_type'] == '3') {{ 'selected' }} @endif>Degree
                                                </option>

                                                {{-- <option value="6"
                                                    @if ($project_data['education_type'] == '4') {{ 'selected' }} @endif>Other
                                                </option> --}}

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
                                                value="{{ $project_data['name_of_institute_other'] }}" disabled>
                                            @if ($errors->has('institute_other_name'))
                                                <span class="red-text"><?php echo $errors->first('institute_other_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name_of_institute">Select Institute</label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="name_of_institute" name="name_of_institute"
                                                onchange="myFunction(this.value)" disabled>
                                                <option value="">Select</option>
                                                <option value="0"
                                                    @if ($project_data['name_of_institute'] == '0') {{ 'selected' }} @endif>Other
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
                                                value="{{ $project_data['name_of_institute_other'] }}" disabled>
                                            @if ($errors->has('name_of_institute_other'))
                                                <span class="red-text"><?php echo $errors->first('name_of_institute_other', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" id="branch_details_box">
                                        <div class="form-group">
                                            <label for="branch_details">Select Branch </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="branch_details" name="branch_details"
                                                disabled>
                                                <option value="">Select</option>


                                                <option value="1"
                                                    @if ($project_data['branch_details'] == '1') {{ 'selected' }} @endif>
                                                    Artificial Intelligence(AI)and Data Science
                                                </option>
                                                <option value="2"
                                                    @if ($project_data['branch_details'] == '2') {{ 'selected' }} @endif>
                                                    Artificial Intelligence(AI)and Machine Learning
                                                </option>
                                                <option value="3"
                                                    @if ($project_data['branch_details'] == '3') {{ 'selected' }} @endif>
                                                    Automation and Robotics
                                                </option>
                                                <option value="4"
                                                    @if ($project_data['branch_details'] == '4') {{ 'selected' }} @endif>
                                                    Automobile
                                                </option>
                                                <option value="5"
                                                    @if ($project_data['branch_details'] == '5') {{ 'selected' }} @endif>
                                                    Checimal
                                                </option>
                                                <option value="6"
                                                    @if ($project_data['branch_details'] == '6') {{ 'selected' }} @endif>
                                                    Civil
                                                </option>
                                                <option value="7"
                                                    @if ($project_data['branch_details'] == '7') {{ 'selected' }} @endif>
                                                    Civil
                                                    and Environmental
                                                </option>
                                                <option value="8"
                                                    @if ($project_data['branch_details'] == '8') {{ 'selected' }} @endif>
                                                    Computer
                                                </option>
                                                <option value="8"
                                                    @if ($project_data['branch_details'] == '8') {{ 'selected' }} @endif>
                                                    Computer
                                                    Science and Design
                                                </option>
                                                <option value="9"
                                                    @if ($project_data['branch_details'] == '9') {{ 'selected' }} @endif>
                                                    Computer
                                                    Technology
                                                </option>
                                                <option value="9"
                                                    @if ($project_data['branch_details'] == '9') {{ 'selected' }} @endif>
                                                    Dress
                                                    Designing and
                                                    Garnment Manufacturing
                                                </option>
                                                <option value="10"
                                                    @if ($project_data['branch_details'] == '10') {{ 'selected' }} @endif>
                                                    Electrical

                                                </option>
                                                <option value="11"
                                                    @if ($project_data['branch_details'] == '11') {{ 'selected' }} @endif>
                                                    Electronic and Telecommunication

                                                </option>
                                                <option value="12"
                                                    @if ($project_data['branch_details'] == '12') {{ 'selected' }} @endif>
                                                    Information Technology

                                                </option>
                                                <option value="13"
                                                    @if ($project_data['branch_details'] == '13') {{ 'selected' }} @endif>
                                                    Instrumentation and Control Interior Design

                                                </option>
                                                <option value="14"
                                                    @if ($project_data['branch_details'] == '14') {{ 'selected' }} @endif>
                                                    Mechanical

                                                </option>
                                                <option value="15"
                                                    @if ($project_data['branch_details'] == '15') {{ 'selected' }} @endif>
                                                    Mechatronics

                                                </option>
                                                <option value="16"
                                                    @if ($project_data['branch_details'] == '16') {{ 'selected' }} @endif>Polymer
                                                    Technology

                                                </option>
                                                <option value="17"
                                                    @if ($project_data['branch_details'] == '17') {{ 'selected' }} @endif>Robotics
                                                    and Automation

                                                </option>
                                                <option value="18"
                                                    @if ($project_data['branch_details'] == '18') {{ 'selected' }} @endif>
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
                                                value="{{ $project_data['other_branch_details'] }}" disabled>
                                            @if ($errors->has('other_branch_details'))
                                                <span class="red-text"><?php echo $errors->first('other_branch_details', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6" id="edit_branch" style="display:none">
                                        <div class="form-group">
                                            <label for="branch_other_name">Branch</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="branch_other_name"
                                                id="branch_other_name" placeholder=""
                                                value="{{ $project_data['other_branch_details'] }}" disabled>
                                            @if ($errors->has('branch_other_name'))
                                                <span class="red-text"><?php echo $errors->first('branch_other_name', ':message'); ?></span>
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
                                                    @if ($project_data['payment_type'] == 'neft') {{ 'selected' }} @endif>NEFT
                                                </option>
                                                <option value="qr_code"
                                                    @if ($project_data['payment_type'] == 'qr_code') {{ 'selected' }} @endif>QR Code
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
                                                value="{{ $project_data['transaction_details'] }}">
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
                                            <label for="payment_proof">Upload Payment proof in
                                                jpeg,png,jpg format with size 1 Mb*</label>&nbsp<span
                                                class="red-text">*</span><br>
                                            <input type="file" name="payment_proof" id="payment_proof"
                                                accept="image/*" value="{{ $project_data['payment_proof'] }}"><br>
                                            @if ($errors->has('payment_proof'))
                                                <span class="red-text"><?php echo $errors->first('payment_proof', ':message'); ?></span>
                                            @endif
                                        </div>


                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                            data-target="#exampleModal">
                                            View payment receipt
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header img-modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <img style="width: 100%;height: 260px;"
                                                                src="{{ env('APP_URL') . '/storage/all_web_data/images/payment_proof/' . $user_data['payment_proof'] }}">

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer img-modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                                                                                                                                                                                                                                                                                                                                                                                                            <img style="width: 250px;height: 260px;"
                                                                                                                                                                                                                                                                                                                                                                                                                                src="{{ env('APP_URL') . '/storage/all_web_data/images/payment_proof/' . $user_data['payment_proof'] }}">

                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="project_presentation"> Upload project presentation only pdf
                                                format with 5 Mb*</label>&nbsp<span class="red-text">*</span><br>
                                            <input type="file" name="project_presentation" id="project_presentation"
                                                accept="image/*" value="{{ old('project_presentation') }}" disabled><br>
                                            @if ($errors->has('project_presentation'))
                                                <span class="red-text"><?php echo $errors->first('project_presentation', ':message'); ?></span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <a class="btn btn-primary mb-3" target="_blank"
                                                href="{{ env('APP_URL') . '/storage/all_web_data/project_docs/' . $user_data['project_presentation'] }}">
                                                View Presentation </a>
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
                                                            size 2 MB*)</span>
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <?php for($index =0; $index < 5; $index ++) { ?>
                                                    <tr>
                                                        <td><?php echo $index + 1; ?>
                                                            <input type="hidden" class="form-control"
                                                                name="participant_id_<?php echo $index + 1; ?>"
                                                                id="participant_id_<?php echo $index + 1; ?>" placeholder=""
                                                                value="<?php if (isset($participant_data[$index]['id'])) {
                                                                    echo $participant_data[$index]['id'];
                                                                } ?>">

                                                            <input type="hidden" class="form-control"
                                                                name="old_passport_photo_<?php echo $index + 1; ?>"
                                                                id="old_passport_photo_<?php echo $index + 1; ?>"
                                                                placeholder="" value="<?php if (isset($participant_data[$index]['passport_photo'])) {
                                                                    echo $participant_data[$index]['passport_photo'];
                                                                } ?>">
                                                        </td>
                                                        <td>
                                                            <div class="form-group width-input">
                                                                <input type="text" class="form-control"
                                                                    name="f_name_<?php echo $index + 1; ?>"
                                                                    id="f_name_<?php echo $index + 1; ?>" placeholder=""
                                                                    value="<?php if (old('f_name_' . $index + 1)) {
                                                                        echo old('f_name_' . $index + 1);
                                                                    } elseif (isset($participant_data[$index]['f_name'])) {
                                                                        echo $participant_data[$index]['f_name'];
                                                                    } ?>"
                                                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    disabled>
                                                                {{-- @if ($errors->has('f_name_' . $index + 1))
                                                                    <span
                                                                        class="red-text">{{ $errors->first('f_name_' . $index + 1, ':message') }}</span>
                                                                @endif --}}
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="form-group width-input">
                                                                <input type="text" class="form-control"
                                                                    name="m_name_<?php echo $index + 1; ?>"
                                                                    id="m_name_<?php echo $index + 1; ?>" placeholder=""
                                                                    value="<?php if (old('m_name_' . $index + 1)) {
                                                                        echo old('m_name_' . $index + 1);
                                                                    } elseif (isset($participant_data[$index]['m_name'])) {
                                                                        echo $participant_data[$index]['m_name'];
                                                                    } ?>"
                                                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    disabled>
                                                                {{-- @if ($errors->has('m_name_' . $index + 1))
                                                                    <span
                                                                        class="red-text">{{ $errors->first('m_name_' . $index + 1, ':message') }}</span>
                                                                @endif --}}
                                                            </div>
                                                        </td>


                                                        <td>
                                                            <div class="form-group width-input">
                                                                <input type="text" class="form-control"
                                                                    name="l_name_<?php echo $index + 1; ?>"
                                                                    id="l_name_<?php echo $index + 1; ?>" placeholder=""
                                                                    value="<?php if (old('l_name_' . $index + 1)) {
                                                                        echo old('l_name_' . $index + 1);
                                                                    } elseif (isset($participant_data[$index]['l_name'])) {
                                                                        echo $participant_data[$index]['l_name'];
                                                                    } ?>"
                                                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                    disabled>
                                                                {{-- @if ($errors->has('l_name_' . $index + 1))
                                                                    <span
                                                                        class="red-text">{{ $errors->first('l_name_' . $index + 1, ':message') }}</span>
                                                                @endif --}}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    name="passport_photo_{{ $index + 1 }}"
                                                                    id="passport_photo_{{ $index + 1 }}"
                                                                    accept="image/*"
                                                                    value="{{ old('passport_photo_' . ($index + 1)) }}"
                                                                    disabled><br>

                                                                {{-- @if ($errors->has('passport_photo_' . ($index + 1)))
                                                                    <span
                                                                        class="red-text">{{ $errors->first('passport_photo_' . ($index + 1), ':message') }}</span>
                                                                @endif --}}


                                                            </div>
                                                            @if (isset($participant_data[$index]['passport_photo']))
                                                                <img style="width: 70px;height: 120px;"
                                                                    src="{{ env('APP_URL') . '/storage/all_web_data/images/userPassportPhoto/' . $participant_data[$index]['passport_photo'] }}">
                                                            @endif

                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 p-3">
                                    <div class="form-group">
                                        <label for="agree_checkbox">
                                            <input type="checkbox" name="update_agree_checkbox"
                                                id="update_agree_checkbox">
                                            By accessing this form, I agree to comply that what ever information I am
                                            providing is true to my knowledge.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn btn-success">Save
                                        &amp; Submit</button>
                                </div>
                                <input type="hidden" name="id" id="id" class="form-control"
                                    value="{{ $user_data['id'] }}" placeholder="">
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
            document.getElementById("frm_register_update").submit();
        }
    </script>



    <script>
        $(document).ready(function() {

            $("#education_type").change(function(e) {
                if ($("#education_type").val() == '4') {
                    $("#other_institute").show();
                } else {
                    $("#other_institute").attr("style", "display:none");
                }
            });

            $("#name_of_institute").change(function(e) {
                if ($("#name_of_institute").val() == '21' ||
                    $("#name_of_institute").val() == '47' ||
                    $("#name_of_institute").val() == '69') {
                    $("#other_name_of_school").show();
                } else {
                    $("#other_name_of_school").attr("style", "display:none");
                }
            });

            getEducationDetails();

            $('#education_type').change(function(e) {
                getEducationDetails();
            });




        });

        $("#branch_details").change(function(e) {
            if ($("#branch_details").val() == '18') {
                $("#other_branch_details_box").show();
            } else {
                $("#other_branch_details_box").attr("style", "display:none");
            }
        });

        function getEducationDetails() {

            $('#name_of_institute').empty();
            var education_type = $('#education_type').val();

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


                            //$('#name_of_institute').append(
                            //  '<option value="0">Other</option>');
                            $('#name_of_institute').val('{{ $project_data['name_of_institute'] }}');

                            if ($("#name_of_institute").val() == '21' ||
                                $("#name_of_institute").val() == '47' ||
                                $("#name_of_institute").val() == '69') {
                                $("#other_institute").show();
                            } else {
                                $("#other_institute").attr("style", "display:none");
                            }
                        }
                    }
                });
            } else {

            }

        }
    </script>
    <script>
        if ($("#branch_details").val() == '18') {
            $("#edit_branch").show();
        } else {
            $("#edit_branch").attr("style", "display:none");
        }
    </script>
    <script>
        function validate_updateForm() {
            var agreeCheckbox = document.getElementById('update_agree_checkbox');
            if (agreeCheckbox.checked) {
                document.getElementById("frm_register_update").submit();
                return true;
            } else {
                alert('Please agree to submit.');
                return false;
            }
        }
    </script>
@endsection
