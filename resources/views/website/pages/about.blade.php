@extends('website.layout.master')
@section('content')
    <section id="inner-banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>ABOUT US</h1>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="breadcrumb"><a href="{{ url('/') }}">Home</a> / About us</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-sec">
        <div class="container">
            <div class="row">
                <h1 class="">ABOUT LAGHU UDYOG Bharti NASHIK</h1>
                {{-- <hr> --}}
                {{-- <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</h5> --}}
                <p style="text-align: justify">Sumago Infotech aspire to be the global sourcing choice of the world market and revolutionizes the way
                    service processes function. To reach out to the common people across the globe and making Information
                    Technology a tool for the “MASS” along with the tool for the “CLASS”. Creating innovative IT solutions
                    and provide IT-enabled services to delight customers worldwide and build Relationships based on Trust,
                    Values and Professionalism. Sumago Infotech has industry-specific software expertise in Technology,
                    Financial, Healthcare, Media, Manufacturing, and many other sectors. The company specializes in offering
                    Web Designing, Web Application Development, Mobile Application Development, Software Development,
                    Digital Marketing, Software Testing, Quality Assurance services, and many more.</p>
                    <p>We are a team of committed innovative, client-sensitive and experienced software professionals who always strive to deliver customized, cost- effective and long-term software solutions that complement our client's objective and result in a satisfied customer.</p>

            </div>
        </div>
    </section>

    <section id="about-sec">
        <div class="container">
            <div class="row">
                <h1 class="">OUR VISION 

                </h1><br>
                {{-- <hr> --}}
              <p>We aspire to be the global sourcing choice of the 
                world market and revolutionizes the way service processes function. To reach out to the common people across the globe and making Information Technology a tool for the “MASS” along with the tool for the “CLASS”. Creating innovative IT solutions and provide IT-enabled services to delight customers worldwide and build Relationships based on Trust, Values and Professionalism.</p>

                <h1 class="">OUR MISION</h1><br>
                <P>At Sumago Infotech, We “Strive with Technology” to provide the most effective and affordable service that fulfills our customer’s needs and budget. We provide customized websites and software solutions that suit customer’s company objectives. We always keep involving our customers in an entire process starting from design through deployment, so that your ideas can be incorporated into our work.</P>
            </div>
        </div>
    </section>

    <section id="gallery-sec">
        <div class="container">
            <div class="row ">
                <h1>KEY ACHIEVEMENTS</h1>
                {{-- <hr> --}}
                <ul class="clearfix">

                    <li>
                        <a href="{{ asset('website/assets/images/Awards/Award1.png') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/Awards/Award1.png') }}">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('website/assets/images/Awards/Award2.png') }}" class="swipebox" title="">
                            <div class="image"><img src="{{ asset('website/assets/images/Awards/Award2.png') }}">
                                <div class="overlay"><i class="fa fa-search-plus"></i></div>
                            </div>
                        </a>
                    </li>


                </ul>

            </div>
        </div>
    </section>
@endsection
