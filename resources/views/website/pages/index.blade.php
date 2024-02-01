@extends('website.layout.master')
@section('content')
    <style>
        .marqueeMain {
            background-color: #ed6d70;
            color: #fff !important;
            font-size: 20px;
            letter-spacing: 0px;
            font-weight: 600;
            line-height: 27px;
            padding: 10px;
        }

        .marqueeMain p {
            margin: 0px;
        }

        .stop-marquee {
            animation-play-state: paused;
        }
        .img-size-fix img{
    max-width: 100%; /* Set the maximum width to 100% of the container */
  height: auto; /* Maintain the aspect ratio of the image */
  display: block; /* Remove extra spacing beneath the image */
  margin: auto; /* Center the image horizontally */
}
.video-container {
    position: relative;
    width: 100%;
    max-width: 500px; /* Set the maximum width for the video */
    margin: 0 auto; /* Center the container */
}

.video-container img {
    width: 100%;
    height: auto;
    cursor: pointer;
}

.video-container .col-md-6 {
    position: relative;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 66%;
    background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.video-overlay i {
    font-size: 50px;
    color: #fff;
}

.video-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: none; /* Hide the iframe by default */
}

    </style>
    <script>
        function toggleMarquee() {
            var marquee = document.getElementById("myMarquee");
            marquee.classList.toggle("stop-marquee");
        }
    </script>

    <div id="first-slider">
        <div class="marqueeMain d-flex align-items-center">

            <marquee id="myMarquee" behavior="scroll" direction="left" onmouseover="toggleMarquee()"
                onmouseout="toggleMarquee()">
                <p class="p-1">Registration for the Project Competition for Colleges !</p>
            </marquee>
        </div>
        <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- Item 1 -->
                <div class="item active">
                    <img class="d-block w-100" src="{{ asset('website/assets/images/Slider/Event222.jpeg') }}"
                        alt="First slide">
                    {{-- <h2 data-animation="animated bounceInDown"><span>Give a little change a lot</span></h2> --}}
                    {{-- <h3 data-animation="animated bounceInDown">consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.!</h3> --}}
                    {{-- <h4 data-animation="animated bounceInUp"><a href="{{ url('about') }}">READ MORE</a></h4> --}}
                </div>
                <!-- Item 2 -->
                <div class="item">
                    <img class="d-block w-100" src="{{ asset('website/assets/images/Slider/Event233.png') }}"
                        alt="Secound slide">
                    {{-- <h2 data-animation="animated bounceInDown"><span>More charity More better life</span></h2> --}}
                    {{-- <h3 data-animation="animated bounceInDown">consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.!</h3>
                    <h4 data-animation="animated bounceInUp"><a href="{{ url('about') }}">READ MORE</a></h4> --}}
                </div>
                <!-- Item 3 -->
                <div class="item">
                    <img class="d-block w-100" src="{{ asset('website/assets/images/Slider/slide1.jpg') }}"
                        alt="Third slide">
                    {{-- <h2 data-animation="animated bounceInDown"><span>Raise fund Warm heart</span></h2> --}}
                    {{-- <h3 data-animation="animated bounceInDown">consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.!</h3> --}}
                    {{-- <h4 data-animation="animated bounceInUp"><a href="{{ url('about') }}">READ MORE</a></h4> --}}
                </div>
                <!-- Item 4 -->
                <div class="item">
                    <img class="d-block w-100" src="{{ asset('website/assets/images/Slider/Event24.png') }}"
                        alt="Forth slide">
                    {{-- <h2 data-animation="animated bounceInDown"><span>Raise your funds for a cause</span></h2> --}}
                    {{-- <h3 data-animation="animated bounceInDown">consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.!</h3> --}}
                    {{-- <h4 data-animation="animated bounceInUp"><a href="{{ url('about') }}">READ MORE</a></h4> --}}
                </div>
                <!-- End Item 4 -->

            </div>
            <!-- End Wrapper for slides-->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    {{-- <section id="video-sec">
        <div class="container">
            <div class="row text-center">
                <h1>Celebrating Our Success Story</h1>
                <hr>
                <div class="text-left">
                    <div class="col-md-6 clearfix top-off video-container">
                        <img src="{{ asset('website/assets/images/Events/videoimg.png') }}" class="img-fluid" onclick="openVideo()">
                        <div class="video-overlay" onclick="openVideo()">
                            <i class="fa fa-video-camera" ></i>
                        </div>
                        <iframe id="videoFrame" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                    <div class="col-md-6 clearfix top-off">
                        <div class="media">
                            <div class="media-text">
                                <p style="text-align: justify">Sumago Infotech aspire to be the global sourcing choice of the world market and revolutionizes the way
                                    service processes function. To reach out to the common people across the globe and making Information
                                    Technology a tool for the “MASS” along with the tool for the “CLASS”. Creating innovative IT solutions
                                    and provide IT-enabled services to delight customers worldwide and build Relationships based on Trust,
                                    Values and Professionalism. Sumago Infotech has industry-specific software expertise in Technology,
                                    Financial, Healthcare, Media, Manufacturing, and many other sectors. </p>
                            </div>
                        </div>
                        <div class="media">
                         
                            <div class="media-text">
                              
                                <p style="text-align: justify">The company specializes in offering
                                    Web Designing, Web Application Development, Mobile Application Development, Software Development,
                                    Digital Marketing, Software Testing, Quality Assurance services, and many more.</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="about-sec">
        <div class="container">
            <div class="row">
                <h1 class="text-center">Our Goal is to offer Top-Notch IT Education
                </h1>
                <hr>
                <div class="row " style="display: flex; justify-content: center;">
                    <div class="col-lg-10 col-md-10 col-sm-10 img-size-fix ">
                        
                        <p style="text-align: justify">Our unwavering focus is on democratizing education through affordable pricing and transparent
                            policies. This inclusive approach empowers a diverse group and fosters their success in
                            professional endeavors. Scope's mission is to reshape learning, particularly for technology
                            enthusiasts. Our meticulously curated, hands-on curriculum aims to deliver an unmatched
                            educational journey that goes beyond conventional limits.</p>
                        <img
                        src="{{ asset('website/assets/images/Events/ourgoal.jpeg') }}" class="img-fluid">
                        
                    </div>
                </div>
                {{-- <div class="text-center">
                    <a href="donate.html" class="btn1">donate now</a>
                    <a href="{{ url('about') }}" class="btn2">Read More</a>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- <section id="activities-sec">
        <div class="container">
            <div class="row text-center">
                <h1>WHAT WE DO?</h1>
                <hr>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</h5>
                <div class="text-left">
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-heart"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Charity for Education</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-cutlery"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Feed for Hungry Child</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-home"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Home for Homeless</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-tint"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Bringing Clean Water</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-thumbs-up"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Help Little Hands</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-content-left"><i class="fa fa-money"></i></div>
                        <div class="grid-content-wrapper">
                            <h4>Donate for Children</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut efficitur eget justo quis
                                dignissim.</p>
                            <a href="activities.html" title="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    {{-- <section id="projects-sec">
        <div class="container">
            <div class="row text-center">
                <h1>OUR PROJECTS</h1>
                <hr>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</h5>
                <div class="text-center">
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-image"><img src="images/test1.jpg"></div>
                        <div class="post-content">
                            <h3>Nepal Earthquake: Clean Water Initiative</h3>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <a href="projects.html" title="">View Project</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-image"><img src="images/test2.jpg"></div>
                        <div class="post-content">
                            <h3>Nepal Earthquake: Clean Water Initiative</h3>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <a href="projects.html" title="">View Project</a>
                        </div>
                    </div>
                    <div class="col-md-4 clearfix top-off">
                        <div class="grid-image"><img src="images/test3.jpg"></div>
                        <div class="post-content">
                            <h3>Nepal Earthquake: Clean Water Initiative</h3>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <a href="projects.html" title="">View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="gallery-sec">
        <div class="container">
            <div class="row text-center">
                <h1>OUR GALLERY</h1>
                <hr>
                <h5>Capturing Moments: Glimpse of talent search 2022<h5>
                        <ul class="clearfix">

                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img src="{{ asset('website/assets/images/Events/gallery.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery1.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img src="{{ asset('website/assets/images/Events/gallery1.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery2.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img src="{{ asset('website/assets/images/Events/gallery2.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery3.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img
                                            src="{{ asset('website/assets/images/Events/gallery3.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery4.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img
                                            src="{{ asset('website/assets/images/Events/gallery4.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery5.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img
                                            src="{{ asset('website/assets/images/Events/gallery5.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery6.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img
                                            src="{{ asset('website/assets/images/Events/gallery6.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('website/assets/images/Events/gallery7.jpg') }}" class="swipebox"
                                    title="">
                                    <div class="image"><img
                                            src="{{ asset('website/assets/images/Events/gallery7.jpg') }}">
                                        <div class="overlay"><i class="fa fa-search-plus"></i></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="text-center">
                            <a href="gallery.html" class="btn1">View More</a>
                        </div> --}}
            </div>
        </div>
    </section>

    <section id="gallery-sec">
        <div class="container">
            <div class="row text-center">
                <h1>NEWS</h1>
                <hr>
                <ul class="clearfix">

                    <li>
                        <a href="{{ asset('website/assets/images/news/news1.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news1.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news2.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news2.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news3.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news3.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news4.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news4.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news5.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news5.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news6.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news6.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news7.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news7.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/news/news8.jpg') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/news/news8.jpg') }}"
                                    height="200">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>


                </ul>
                {{-- <div class="text-center">
                            <a href="gallery.html" class="btn1">View More</a>
                        </div> --}}
            </div>
        </div>
        <script>
            function openVideo() {
                var img = document.querySelector('.video-container img');
                var videoOverlay = document.querySelector('.video-overlay');
                var videoFrame = document.getElementById('videoFrame');
        
                // Get the width and height of the image
                var imgWidth = img.width;
                var imgHeight = img.height;
        
                // Set the width and height of the video iframe
                videoFrame.style.width = imgWidth + 'px';
                videoFrame.style.height = imgHeight + 'px';
        
                // Set the position of the iframe to absolute
                videoFrame.style.position = 'absolute';
                videoFrame.style.top = '0';
                videoFrame.style.left = '0';
        
                img.style.display = 'none';
                videoOverlay.style.display = 'none';
                videoFrame.style.display = 'block';
        
                // Set the video source and autoplay
                videoFrame.src = "https://www.youtube.com/embed/ilz3ti1D0LY?autoplay=1";
            }
        </script>
        
        
    </section>
@endsection
