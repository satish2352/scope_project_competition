<footer class="footer footer_mt-2">
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-section">
                        <h4 class="footer-section-title">About LUB</h4><!-- /.footer-section-title -->

                        <div class="footer-section-body">
                            <p>Our mission is to develop a skilled IT workforce in India, empowering individuals with
                                accessible and affordable IT training to drive innovation & economic growth, and bridge
                                the digital divide in the ever-evolving tech landscape. </p>
                        </div><!-- /.footer-section-body -->
                    </div><!-- /.footer-section -->
                </div><!-- /.columns large-3 medium-12 -->

                <div class="col-md-3">
                    <div class="footer-section">
                        <h4 class="footer-section-title">Quick Links</h4><!-- /.footer-section-title -->

                        <div class="footer-section-body">
                            <ul class="list-links">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ url('about') }}">About Us</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ url('events') }}">Events</a>
                                </li> --}}

                                <li>
                                    <a href="{{ url('contact-us') }}">Contact Us</a>
                                </li>

                                {{-- <li>
                                    <a href="gallery.html">Gallery</a>
                                </li>

                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li> --}}

                            </ul><!-- /.list-links -->

                        </div><!-- /.footer-section-body -->
                    </div><!-- /.footer-section -->
                </div><!-- /.columns large-3 medium-12 -->

                <div class="col-md-3">
                    <div class="footer-section">
                        <h4 class="footer-section-title">Head Office</h4><!-- /.footer-section-title -->

                        <div class="footer-section-body"><b><i class="fa fa-map-marker"></i> </b>
                            Third Floor, Gajra Chambers, Mumbai - Agra National Hwy, Kamod Nagar, Indira Nagar, Nashik,
                            Maharashtra 422009<br>

                          
                            <!--<b>-->
                            <!--    <i class="fa fa-envelope-o"></i>-->
                            <!--</b>-->
                            <!--headoffice@lubindia.com<br> <b>-->
                            <!--    <i class="fa fa-envelope-o"></i>-->
                            <!--</b>lubheadoffice@gmail.com<br>-->
                            <!--Phone: 011-23238582<br>-->
                            <!--Tel. Fax: 011-23525052-->

                        </div><!-- /.footer-section-body -->
                        <div class="footer-section-body" style="padding-top: 15px"><b><a to="tel:91 8408084888" style="cursor: pointer;"><i class="fa fa-mobile-phone" style="color:#fff;"></i> </b>
                            +91 8408084888 </a><br>
                        </div><!-- /.footer-section-body -->
                      
                    </div><!-- /.footer-section -->
                </div><!-- /.columns large-3 medium-12 -->
                <div class="col-md-3">
                    <div class="footer-section">
                        <h4 class="footer-section-title">Contact Us</h4><!-- /.footer-section-title -->

                        <div class="footer-section-body">
                            <p><b><i class="fa fa-map-marker"></i> </b> The Avenue, Fourth Floor, Behind Prakash Petrol
                                Pump, Govind Nagar, Nashik, Maharashtra 422009</p>

                            <div class="footer-contacts">
                                {{-- <p>
                                    <b>
                                        <i class="fa fa-phone"></i> Phone:
                                    </b>

                                    +1-310-341-3870
                                </p> --}}

                                <p>
                                    <a href="mailto:info@sumagoinfotech.com" style="cursor: pointer;">
                                        <b>
                                            <i class="fa fa-envelope-o"></i>
                                        </b>

                                        info@sumagoinfotech.com
                                    </a>

                                </p>
                            </div><!-- /.footer-contacts -->
                        </div><!-- /.footer-section-body -->
                    </div><!-- /.footer-section -->
                </div><!-- /.columns large-3 medium-12 -->
            </div><!-- /.row -->
        </div>
    </div><!-- /.footer-body -->

    <div class="bwt-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <div class="left-text">Copyright &copy; Sumago Infotech Pvt. Ltd. © 2024 All Right Reserved</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('website/assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('website/assets/js/bootsnav.js') }}"></script>
<script src="{{ asset('website/assets/js/banner.js') }}"></script>
<script src="{{ asset('website/assets/js/jquery.swipebox.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        /* Basic Gallery */
        $('.swipebox').swipebox();

        /* Video */
        $('.swipebox-video').swipebox();

        /* Dynamic Gallery */
        $('#gallery').click(function(e) {
            e.preventDefault();
            $.swipebox([{
                    href: 'http://swipebox.csag.co/mages/image-1.jpg',
                    title: 'My Caption'
                },
                {
                    href: 'http://swipebox.csag.co/images/image-2.jpg',
                    title: 'My Second Caption'
                }
            ]);
        });

    });
</script>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementsByClassName("password")[0];
        var toggleIcon = document.querySelector(".togglePpassword i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
<script>
    function toggleConfirmPasswordVisibility() {
        var passwordInput = document.getElementsByClassName("password_confirmation")[0];

        var toggleIcon = document.querySelector(".toggleConfirmPpassword i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
{{-- <script src="{{ asset('website/assets/js/script.js') }}"></script> --}}
</body>

</html>
