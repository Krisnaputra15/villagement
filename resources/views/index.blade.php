@extends('template.template')

@section('content')
                <!-- Carousel Start -->
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/carousel-1.jpg" alt="Carousel Image">
                            <div class="carousel-caption">
                                <p class="animated fadeInRight">Pelayanan Administrasi Desa</p>
                                <h1 class="animated fadeInLeft">Villagement</h1>
                                <a class="btn animated fadeInUp" href="{{url('/login')}}">Daftar Sekarang</a>
                            </div>
                        </div>
    
                        <div class="carousel-item">
                            <img src="img/carousel-2.jpg" alt="Carousel Image">
                            <div class="carousel-caption">
                                <p class="animated fadeInRight">Pengurusan Administrasi Surat-Menyurat</p>
                                <h1 class="animated fadeInLeft"> Lebih Efektif dan Efisien</h1>
                                <a class="btn animated fadeInUp" href="{{url('/login')}}">Daftar Sekarang</a>
                            </div>
                        </div>
    
                        <div class="carousel-item">
                            <img src="img/carousel-3.jpg" alt="Carousel Image">
                            <div class="carousel-caption">
                                <p class="animated fadeInRight">Penyampaian Keluhan Sarana Prasarana Desa</p>
                                <h1 class="animated fadeInLeft">Dalam Forum Diskusi</h1>
                                <a class="btn animated fadeInUp" href="{{url('/login')}}">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
    
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- Carousel End -->
    
    
                <!-- Feature Start-->
                <div class="feature wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-12">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Expert Worker</h3>
                                        <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Quality Work</h3>
                                        <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="flaticon-call"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>24/7 Support</h3>
                                        <p>Lorem ipsum dolor sit amet elit. Phasus nec pretim ornare velit non</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature End-->
    
    
                <!-- About Start -->
                <div class="about wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <div class="about-img">
                                    <img src="img/about.jpg" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="section-header text-left">
                                    <p>Welcome to Builderz</p>
                                    <h2>25 Years Experience</h2>
                                </div>
                                <div class="about-text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                                    </p>
                                    <a class="btn" href="">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About End -->
    
    
                <!-- Fact Start -->
                <div class="fact">
                    <div class="container-fluid">
                        <div class="row counters">
                            <div class="col-md-6 fact-left wow slideInLeft">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="fact-icon">
                                            <i class="flaticon-worker"></i>
                                        </div>
                                        <div class="fact-text">
                                            <h2 data-toggle="counter-up">109</h2>
                                            <p>Expert Workers</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="fact-icon">
                                            <i class="flaticon-building"></i>
                                        </div>
                                        <div class="fact-text">
                                            <h2 data-toggle="counter-up">485</h2>
                                            <p>Happy Clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fact-right wow slideInRight">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="fact-icon">
                                            <i class="flaticon-address"></i>
                                        </div>
                                        <div class="fact-text">
                                            <h2 data-toggle="counter-up">789</h2>
                                            <p>Completed Projects</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="fact-icon">
                                            <i class="flaticon-crane"></i>
                                        </div>
                                        <div class="fact-text">
                                            <h2 data-toggle="counter-up">890</h2>
                                            <p>Running Projects</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fact End -->
    
    
                <!-- Service Start -->
                <div class="service">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Our Services</p>
                            <h2>We Provide Services</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-1.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>Building Construction</h3>
                                        <a class="btn" href="img/service-1.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-2.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>House Renovation</h3>
                                        <a class="btn" href="img/service-2.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-3.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>Architecture Design</h3>
                                        <a class="btn" href="img/service-3.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-4.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>Interior Design</h3>
                                        <a class="btn" href="img/service-4.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-5.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>Fixing & Support</h3>
                                        <a class="btn" href="img/service-5.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="service-item">
                                    <div class="service-img">
                                        <img src="img/service-6.jpg" alt="Image">
                                        <div class="service-overlay">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="service-text">
                                        <h3>Painting</h3>
                                        <a class="btn" href="img/service-6.jpg" data-lightbox="service">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Service End -->
    
    
                <!-- Video Start -->
               
                <!-- Video End -->
    
    
                <!-- Team Start -->
                <div class="team">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Our Team</p>
                            <h2>Meet Our Engineer</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="img/team-1.jpg" alt="Team Image">
                                    </div>
                                    <div class="team-text">
                                        <h2>Adam Phillips</h2>
                                        <p>CEO & Founder</p>
                                    </div>
                                    <div class="team-social">
                                        <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="img/team-2.jpg" alt="Team Image">
                                    </div>
                                    <div class="team-text">
                                        <h2>Dylan Adams</h2>
                                        <p>Civil Engineer</p>
                                    </div>
                                    <div class="team-social">
                                        <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="img/team-3.jpg" alt="Team Image">
                                    </div>
                                    <div class="team-text">
                                        <h2>Jhon Doe</h2>
                                        <p>Interior Designer</p>
                                    </div>
                                    <div class="team-social">
                                        <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="team-item">
                                    <div class="team-img">
                                        <img src="img/team-4.jpg" alt="Team Image">
                                    </div>
                                    <div class="team-text">
                                        <h2>Josh Dunn</h2>
                                        <p>Painter</p>
                                    </div>
                                    <div class="team-social">
                                        <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                        <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team End -->
                
    
                <!-- FAQs Start -->
                <div class="faqs">
                    <div class="container">
                        <div class="section-header text-center">
                            <p>Frequently Asked Question</p>
                            <h2>You May Ask</h2>
                        </div>
                        <div class="row">
                            <div class="">
                                <div id="accordion-1">
                                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                                Lorem ipsum dolor sit amet?
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                                Lorem ipsum dolor sit amet?
                                            </a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                                Lorem ipsum dolor sit amet?
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                                Lorem ipsum dolor sit amet?
                                            </a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card wow fadeInLeft" data-wow-delay="0.5s">
                                        <div class="card-header">
                                            <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
                                                Lorem ipsum dolor sit amet?
                                            </a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FAQs End -->
    
    
                <!-- Testimonial Start -->

                <!-- Blog End -->
@endsection