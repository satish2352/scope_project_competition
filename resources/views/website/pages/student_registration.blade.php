@extends('website.layout.master')
@section('content')
    <style>
        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 42%;
            right: 32px;
            transform: translateY(-50%);
        }
        .password-toggle1 {
            cursor: pointer;
            position: absolute;
            top: 51%;
            right: 32px;
            transform: translateY(-50%);
        }

        /* .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        } */
    </style>
    <section id="inner-banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Registration for Project Competition 2024</h1>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="breadcrumb"><a href="index.html">Home</a> / Registration</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Registration Form</h2>
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">

            </div>
            <div class="row clearfix">
                <div class="">

                    @if (Session::get('status') == 'success')
                        <div class="col-12 grid-margin">
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong> <span id="data_to_show">
                                        {{ Session::get('msg') }}
                                    </span> </strong>
                            </div>
                        </div>
                    @endif

                    @if (Session::get('status') == 'error')
                        <div class="col-12 grid-margin">
                            <div class="alert alert-danger" id="danger-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong> <span id="data_to_show">
                                        {!! session('msg') !!}
                                    </span> </strong>
                            </div>
                        </div>
                    @endif
                    <form class="forms-sample" id="frm_register" name="frm_register" method="post" role="form"
                        action="{{ route('add-users') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="text" name="u_email" id="u_email" value="{{ old('u_email') }}"
                                placeholder="Email" />

                        </div>
                        @if ($errors->has('u_email'))
                            <span class="red-text"><?php echo $errors->first('u_email', ':message'); ?></span>
                        @endif
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                            <input type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no') }}"
                                maxlength="10" minlength="10" placeholder="Mobile no."
                                onkeyup="addvalidateMobileNumber(this.value)">
                        </div>
                        <span id="validation-message" class="red-text"></span>

                        @if ($errors->has('mobile_no'))
                            <span class="red-text"><?php echo $errors->first('mobile_no', ':message'); ?></span>
                        @endif

                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" class="password" name="u_password" id="u_password"
                                placeholder="Password" />
                        </div>
                        <span id="togglePassword" class="togglePpassword password-toggle"
                        onclick="togglePasswordVisibility()">
                        <i class="fa fa-eye-slash"></i>
                        </span>
                        @if ($errors->has('u_password'))
                            <span class="red-text"><?php echo $errors->first('u_password', ':message'); ?></span>
                        @endif
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" class="password_confirmation" name="password_confirmation"
                                id="password_confirmation" placeholder="Re-type Password" />

                        </div>


                        <span id="toggleConfirmPassword" class=" toggleConfirmPpassword password-toggle1"
                        onclick="toggleConfirmPasswordVisibility()">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        @if ($errors->has('password_confirmation'))
                            <span class="red-text"><?php echo $errors->first('password_confirmation', ':message'); ?></span>
                        @endif
                        <div class=" select_option regist_type">
                            <select class="form-control" id="registration_type" name="registration_type">
                                <option value="">Select Type Of Registration</option>
                                <option value="0" selected>Student</option>
                                {{-- <option value="1">Industry</option> --}}
                            </select>
                            <div class="select_arrow"></div>

                        </div>
                        @if ($errors->has('registration_type'))
                            <span class="red-text"><?php echo $errors->first('registration_type', ':message'); ?></span>
                        @endif


                        <div class=" select_option regist_type">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <span class="red-text">{{ $errors->first('g-recaptcha-response') }}</span>
                                </span>
                            @endif

                        </div>


                        {{--
                        <div class="input_field select_option">
                            <select class="form-control" id="education_type" name="education_type">
                                <option value="">Select Type Of Course</option>
                                <option value="3">Degree</option>
                                <option value="4">Diploma</option>
                                <option value="5">ITI</option>
                            </select>
                            <div class="select_arrow"></div>

                        </div>
                        @if ($errors->has('education_type'))
                            <span class="red-text"><?php echo $errors->first('education_type', ':message'); ?></span>
                        @endif
                        --}}
                        <input class="button " type="submit" value="Register" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $().ready(function() {
            $("#signupForm").validate({
                rules: {
                    nameproject: "required",
                    Nameofyourcollege: "required",
                    nameparticipants: "required",
                    PaymentUTRCode: "required",
                    email: {
                        required: true,
                        email: true,
                    },
                    paymentconfirm: "required",
                    paymentcode: "required",
                    attchcopy: "required",
                    imgupload: "required",
                    projectupload: "required"
                },
                // In 'messages', users have to specify messages as per rules
                messages: {
                    nameproject: "This field is required.*",
                    nameparticipants: "This field is required.*",
                    Nameofyourcollege: "This field is required.*",
                    PaymentUTRCode: "This field is required*.",
                    imgupload: "This field is required.*",
                    projectupload: "This field is required.*"
                },
            });
        });
    </script>
    <script>
        function addvalidateMobileNumber(number) {
            var mobileNumberPattern = /^\d*$/;
            var validationMessage = document.getElementById("validation-message");

            if (mobileNumberPattern.test(number)) {
                validationMessage.textContent = "";
            } else {
                validationMessage.textContent = "Please enter only numbers.";
            }
        }
    </script>
    <script>
        const passwordInput = document.getElementById('u_password');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
        <script>
        $(document).ready(function() {
            $('#password_confirmation').on('input', function() {

                var password = $('#u_password').val();
                var confirmPassword = $(this).val();
                var errorSpan = $('#password-error');

                if (password !== confirmPassword) {
                    errorSpan.text('Password does not match.');
                } else {
                    errorSpan.text('');
                }
            });
        });
    </script>
@endsection
