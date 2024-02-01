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
            background-color: green;
            color: white;
            font-size: 18px;
            text-align: center;
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
          @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }

    h1 {
      animation: blink 1s infinite;
    }
    </style>
    <div class="main-panel">
        <div class="content-wrapper mt-6">
            <div class="page-header">
                <h3 class="page-title">
                    {{-- <b>Event organized by Sumago Infotech Pvt. Ltd.  & Government Polytechnic,
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
                         <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 p-3">
                                <button type="button" class="btn btn-primary  float-left" style="font-size: 18px;">
                                    @if ($user_data['registration_type'] == 1 && $user_data['is_project_uploaded'] == 1 && $user_data['is_payment_done'] == 1)
                                    Your Industry Code is: {{ $project_data['industry_code'] }}
                                        @else
                                        Your Project Code is: {{ $project_data['project_code'] }}
                                    @endif
                                </button>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-center align-items-center ">
                                @if ($user_data['registration_type'] == 1 && $user_data['is_project_uploaded'] == 1 && $user_data['is_payment_done'] == 1)
                             <h1><a href="{{ env('FILE_VIEW') }}/all_web_data/images/certificate/{{ $project_data['industry_code'] }}.rar" target="_blank"
                               class="mr-4 font-weight-medium auth-form-btn d-flex align-items-center" style="font-size:18px ">
                             Click Here to Download Certificate
                               </a></h1>  
                               @else
                               <h1><a href="{{ env('FILE_VIEW') }}/all_web_data/images/certificate/{{ $project_data['industry_code'] }}.rar" target="_blank"
                               class="mr-4 font-weight-medium auth-form-btn d-flex align-items-center" style="font-size:18px ">
                             Click Here to Download Certificate
                               </a></h1>
                                  @endif
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 p-3">
                                <button type="button" class="btn float-right verify_msg">
                                    @if ($user_data['is_project_uploaded'] == 1 && $user_data['is_payment_done'] == 1)
                                        <div class="verify_msg">
                                            Your Payment is verified
                                        </div>
                                    @endif
                                </button>

                            </div>
                        </div>



                        <div class="card-body">

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
                                        <label for="project_title">Project Title</label>&nbsp<span class="red-text">*</span>
                                        <input type="text" class="form-control" name="project_title" id="project_title"
                                            placeholder="" value="{{ $project_data['project_title'] }}" disabled>
                                        @if ($errors->has('project_title'))
                                            <span class="red-text"><?php echo $errors->first('project_title', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                               
 <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="education_type">Select Academic Year </label>&nbsp<span
                                                class="red-text">*</span>
                                            <select class="form-control" id="industry_type" name="industry_type" disabled>
                                                <option value="">Select</option>
                                                <option value="1"
                                                    @if (old('industry_type') == '1' || $project_data['industry_type'] == '1') {{ 'selected' }} @endif>
                                                    Large
                                                </option>
                                                <option value="2"
                                                    @if (old('industry_type') == '2' || $project_data['industry_type'] == '2') {{ 'selected' }} @endif>
                                                    Medium
                                                </option>
                                                <option value="3"
                                                    @if (old('industry_type') == '3' || $project_data['industry_type'] == '3') {{ 'selected' }} @endif>
                                                    Small
                                                </option>
                                                <option value="4"
                                                    @if (old('industry_type') == '4' || $project_data['industry_type'] == '4') {{ 'selected' }} @endif>
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
            id="industry_name" placeholder=""  value="{{ $project_data['industry_name'] }}" disabled>
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
            id="product_type" placeholder="" value="{{ $project_data['product_type'] }}" disabled>
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
                                            onchange="payment_type(this.value)" disabled>
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
                                            value="{{ $project_data['transaction_details'] }}" disabled>
                                        @if ($errors->has('transaction_details'))
                                            <span class="red-text"><?php echo $errors->first('transaction_details', ':message'); ?></span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">


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
                                                            src="{{ env('APP_URL') . '/storage/all_web_data/industry/images/payment_proof/' . $user_data['payment_proof'] }}">

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
                                                                                                                                                                                                                                                                            src="{{ env('APP_URL') . '/storage/all_web_data/industry/images/payment_proof/' . $user_data['payment_proof'] }}">

                                                                                                                                                                                                                                                                    </div> -->
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <a class="btn btn-primary mb-3" target="_blank"
                                            href="{{ env('APP_URL') . '/storage/all_web_data/industry/project_docs/' . $user_data['project_presentation'] }}">
                                            View Presentation </a>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <table width="100%" class="table table-bordered">
                                        <thead>
                                            <th>Sr No.</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Passport Photo</th>
                                        </thead>
                                        <tbody>

                                            @forelse($participant_data as $key=>$data)
                                                <tr>
                                                    <td> {{ $key + 1 }}</td>
                                                    <td> {{ $data['f_name'] }}</td>
                                                    <td> {{ $data['m_name'] }}</td>
                                                    <td> {{ $data['l_name'] }}</td>
                                                    <td> <img style="width: 70px;height: 120px;"
                                                            src="{{ env('APP_URL') . '/storage/all_web_data/industry/images/userPassportPhoto/' . $data['passport_photo'] }}">
                                                    </td>
                                                <tr>
                                                @empty
                                                    {{ 'No participant found' }}
                                            @endforelse

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <input type="hidden" name="id" id="id" class="form-control"
                                value="{{ $user_data['id'] }}" placeholder="">
                        </div>

                    </div>
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
                if ($("#name_of_institute").val() == '21' || $("#name_of_institute").val() == '47' || $(
                        "#name_of_institute").val() == '48') {
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

        function getEducationDetails() {

            $('#name_of_institute').empty();
            var education_type = $('#education_type').val();

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


                            //$('#name_of_institute').append(
                            //   '<option value="0">Other</option>');
                            $('#name_of_institute').val('{{ $project_data['name_of_institute'] }}');
                            if ('{{ $project_data['name_of_institute'] }}' == '21' ||
                                '{{ $project_data['name_of_institute'] }}' == '47' ||
                                '{{ $project_data['name_of_institute'] }}' ==
                                '48') {
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
@endsection
