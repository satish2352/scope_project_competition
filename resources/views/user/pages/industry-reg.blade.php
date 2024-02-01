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
                                action="{{ route('add-industry-data') }}" enctype="multipart/form-data"
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
                                            <label for="industry_type">Select Industry Type </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="industry_type" name="industry_type">
                                                <option value="">Select</option>
                                                <option value="1"
                                                    @if (old('industry_type') == '1') {{ 'selected' }} @endif>
                                                    Large
                                                </option>
                                                <option value="2"
                                                    @if (old('industry_type') == '2') {{ 'selected' }} @endif>
                                                   Medium
                                                </option>
                                                <option value="3"
                                                    @if (old('industry_type') == '3') {{ 'selected' }} @endif>
                                                  Small
                                                </option>
                                                <option value="4"
                                                    @if (old('industry_type') == '4') {{ 'selected' }} @endif>
                                                    Micro
                                                </option>
                                            </select>
                                            @if ($errors->has('industry_type'))
                                                <span class="red-text"><?php echo $errors->first('industry_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>  
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="industry_name">Name of Industry</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="industry_name"
                                                id="industry_name" placeholder="" value="{{ old('industry_name') }}">
                                            @if ($errors->has('industry_name'))
                                                <span class="red-text"><?php echo $errors->first('industry_name', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>                     
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="product_type">Type Of Product</label>&nbsp<span
                                                class="red-text">*</span>
                                            <input type="text" class="form-control" name="product_type"
                                                id="product_type" placeholder="" value="{{ old('product_type') }}">
                                            @if ($errors->has('product_type'))
                                                <span class="red-text"><?php echo $errors->first('product_type', ':message'); ?></span>
                                            @endif
                                        </div>
                                    </div>      
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                           
                                            <label for="payment_type"><b>Registration fees Rs.2000/- paid by</b>
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
                                            {{-- <input type="file" name="payment_proof" id="payment_proof"
                                                accept="image/*, .pdf" value="{{ old('payment_proof') }}"><br> --}}
                                                <input type="file" name="payment_proof" id="payment_proof" accept="image/jpeg,image/png,image/jpg" value="{{ old('payment_proof') }}" /><br>

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
                                                Upload project presentation pdf, ppt, word
                                                format with 25 MB*</span>

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
