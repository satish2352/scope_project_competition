<nav class="navbar navbar-default  bootsnav">
    <div class="container">
        <div class="row">
            <div class="attr-nav">
                <a class="sponsor-button" href="{{ url('registration') }}">Registration</a>
                 <a class="donation" href="{{ url('login') }}">Login</a>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand logo" href="{{ '/' }}"><img
                        src="{{ asset('website/assets/images/logo.jpg') }}" class="img-responsive" style="padding:10px" /></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">About Us</a></li>
                    {{-- <li><a href="{{ url('events') }}">Events</a></li> --}}
                    {{-- <li><a href="projects.html">Projects</a></li> --}}
                    {{-- <li><a href="gallery.html">Gallery</a></li> --}}
                    <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    {{-- <li><a href="contact.html">Registration</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</nav>
