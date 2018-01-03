<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfolio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/front/') }}/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('/front/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('/front/') }}/css/responsive.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
</head>
<body oncontextmenu="return false";>
<!-- top area -->
<section class="top-area">
    <div class="top-area-bg">
        <div class="container">
            <div class="row">
                @foreach($contacts as $contact)
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="gmail">
                        <i class="fa fa-envelope-o"></i><span>  {{ $contact->email }} </span>
                    </div>
                    <div class="phone">
                        <i class="fa fa-phone"></i><span> +88 {{ $contact->mobile }}</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="social-icon pull-right">
                        <a target="_blank" href="{{ $contact->fb }}"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="{{ $contact->tw }}"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="{{ $contact->ln }}"><i class="fa fa-linkedin"></i></a>
                        <a target="_blank" href="{{ $contact->gp }}"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- navbar area -->
<section class="header-top-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
                <div class="navbar-brand">
                    <a href="index.php">IMSUMAN</a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li class="active smooth-menu"><a href="#home">Home</a></li>
                            <li class="smooth-menu"><a href="#about">about</a></li>
                            <li class="smooth-menu"><a href="#skills">Skills</a></li>
                            <li class="smooth-menu"><a href="#portfolio">Portfolio</a></li>
                            <li class="smooth-menu"><a href="#blog">Blog</a></li>
                            <li class="smooth-menu"><a href="#contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider-section -->
<section class="slider-area" id="home">
    <div data-velocity="-.5" class="parallax-bg slider-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="slider-content text-center">
                    <h2>I'M Suman Ahmed</h2>
                    <p>Im a Web Developer To Creating Awesome And Effective Website For Your Company.If You Want To Build Up Your Personal Or Company Website.</p>
                    <button type="submit" class="btn btn-success">Hire Me</button>
                </div>
            </div>
        </div>
    </div>
</section>


@foreach($sections as $section)
<section class="about-area section-padding" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->about_title }}</h2>
                    <p class="about-text">{{ $section->about_description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="my-image">
                    <img src="{{ asset('/front/') }}/images/suman.jpg" alt="" />
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="personal-imformation">
                    @foreach($abouts as $about)
                    <h2>Personal Information</h2>
                    <p>Name : {{ $about->name }}</p>
                    <p>Email : {{ $about->email }}</p>
                    <p>Present Address : {{ $about->present_address }}</p>
                    <p>Permanent Address : {{ $about->permanent_address }}</p>
                    <p>Phone : +88 {{ $about->phone }}</p>
                    <p>Nationality : {{ $about->nationality }}</p>
                    <a target="_blank" href="resume/resume.pdf" class="btn btn-success">My Resume</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- skills-section -->
<section class="skills_area section-padding" id="skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->skill_title }}</h2>
                    <p class="about-text">{{ $section->skill_description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                @foreach($skills as $skill)
               <div class="progress">
                    <div class="progress-bar" style="width:{{ $skill->skill_percent }}%; background: {{ $skill->skill_color }};">
                        <div class="progress-value">{{ $skill->skill_percent }}%</div>
                        <div class="progressbar-title">{{ $skill->skill_name }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- portfolio-section -->

<section class="portfolio-area section-padding" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->portfolio_title }}</h2>
                    <p class="about-text">{{ $section->portfolio_description }}</p>
                </div>
            </div>
        </div>

        <div class="isotop-area">
            <div class="row">
                <div class="col-lg-12 col-md-12 cols-sm-12 col-xs-12">
                    <div class="iso-nav">
                        <ul>
                            <li class="active" data-filter="*">ALL ITEMS</li>
                            @foreach($tags as $tag)
                            <li data-filter=".{{ $tag->tag_name }}">{{ $tag->tag_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="main-iso">
                        <div class="row">
                            @foreach($portfolios as $portfolio)
                            <div class="col-lg-4 col-md-4 item {{ $portfolio->portfolio_terms }}">
                                <div class="portfolio-img">
                                    <img src="{{ asset($portfolio->portfolio_image) }}" alt="">
                                    <div class="portfolio-overly text-center">
                                        <h2>{{ $portfolio->portfolio_title }}</h2>
                                        <a target="_blank" href="{{ $portfolio->portfolio_link }}" class="overlay-button">Live Preview</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-area section-padding" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 cols-sm-offset-2 col-xs-12">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->service_title }}</h2>
                    <p class="about-text">{{ $section->service_description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="service text-center">
                    <h2>{{ $service->service_title }}</h2>
                    <p>{{ $service->service_text }}</p>
                    <a href="{{ $service->service_link }}" class="read-more">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- our blog section -->
<section class="blog-area section-padding" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->blog_title }}</h2>
                    <p class="about-text">{{ $section->blog_description }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-sm-6 col-md-4 col-xs-12">
                <div class="thumbnail blog-iteam wow bounceInLeft">
                    <div class="blog-iteam-img">
                        <a href="#"><img src="{{ asset($blog->blog_image) }}" alt="blog-img-01" class="img-responsive" /></a>
                        <div class="blog-figcaption">
                            <a href="#"><i class="fa fa-picture-o"></i></a>
                        </div>
                    </div>
                    <div class="caption blog-iteam-content">
                        <div class="blog-content-inner">
                            <h3><a href="#">{{ $blog->blog_title }}</a> </h3>
                            <div class="blog-meta-menu">
                                <ul class="nav nav-pills meta-menu-blog">
                                    <li><a href="#"><i class="fa fa-user"></i>suman</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i>12 Comments</a></li>
                                    <li><i class="fa fa-eye"></i>120</li>
                                </ul>
                            </div>
                            <p>{{ $blog->blog_description }}</p>
                            <p><a href="single.php" class="btn btn-default" role="button">Read More</a></p>
                        </div>
                    </div>
                </div><!-- blog-iteam end -->
            </div><!-- col-md-4 end -->
            @endforeach
        </div><!-- row end -->
    </div><!-- container end -->
</section><!-- our blog end -->

<section class="contact-area section-padding" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <div class="about-content text-center">
                    <h2 class="about-title">{{ $section->contact_title }}</h2>
                    <p class="about-text">{{ $section->contact_description }}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-lg-6 col-md-6 cols-sm-6 col-xs-12">
                <div class="google-map wow bounceInLeft" data-wow-duration=".9s" data-wow-delay=".8s">
                    <div class="map">
                        <div class="map_area">
                            @foreach($contacts as $contact)
                            <iframe src="{{ $contact->google_map }}" frameborder="0" style="border:0" allowfullscreen></iframe>
                            @endforeach
                        </div>
                    </div> <!-- /map -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 cols-sm-6 col-xs-12">
                <div class="contact-form wow bounceInRight" data-wow-duration=".9s" data-wow-delay=".8s">
                    <div class="row">
                        <form class="form-horizontal" action="{{ url('/send-email') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-md-2 col-sm-2">Name:</label>
                                <div class="col-md-9 col-sm-10">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-2 col-sm-2">Email:</label>
                                <div class="col-md-9 col-sm-10">
                                    <input class="form-control" type="text" name="email" id="email" placeholder="Enter your email..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-md-2 col-sm-2">Message:</label>
                                <div class="col-md-9 col-sm-10">
                                    <textarea class="form-control" rows="10" name="message" id="message" placeholder="Enter your query.." style="resize: vertical;" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-2 cols-sm-12 col-xs-12">
                                    <input class="btn btn-block btn-success" type="submit" name="submit" value="SEND">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer-area">
    <div class="container text-center">
        @foreach($contacts as $contact)
        <p>{{ $contact->reserved_by }}.</p>
        @endforeach
    </div>
</section>


<div id="stop" class="scrollTop">
    <span><a href=""><i class="fa fa-angle-up"></i></a></span>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('/front/') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('/front/') }}/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('/front/') }}/js/wow.min.js"></script>
<script src="{{ asset('/front/') }}/js/jquery.scrollUp.min.js"></script>
<script src="{{ asset('/front/') }}/js/jquery.sticky.js"></script>
<script src="{{ asset('/front/') }}/js/main.js"></script>

</body>
</html>