@extends('layouts.app')

@section('content')

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Header Start -->
    <div class="container-fluid bg-dark d-flex align-items-center mb-3 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm" src="{{ asset("storage/$user?->profile_pic") }}" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-dark mb-2" style="-webkit-text-stroke: 2px #ffffff;">{{ $user?->name }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-primary"></h1>
                    <div class="typed-text d-none">{{ $user?->job }}</div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5 text-small">
                        <a href="#portfolio" class="btn btn-primary px-3"><i class="fa-solid fa-list-check" style="margin-right: 7px;"></i>PROJECTS</a>
                        <a href="#contact" class="btn text-white-50"><i class="fa-regular fa-message" style="margin-right: 7px;"></i>CONTACT ME</a>
{{--                        <button type="button" class="btn-play" data-toggle="modal"--}}
{{--                            data-src="{{$setting->video_url }}" data-target="#videoModal">--}}
{{--                            <span></span>--}}
{{--                        </button>--}}
{{--                        <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5 bg-dark" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" src="{{ asset("storage/$setting->about_photo") }}" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4 text-white-50">{{ $setting->about_title }}</h3>
                    <p>{{ $setting->about_description }}</p>
                    <div class="row mb-3">
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Name: <span class="text-secondary">{{ $user?->name }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Birthday: <span class="text-secondary">{{ $user?->birth_day }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Degree: <span class="text-secondary">{{ $user?->degree }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Experience: <span class="text-secondary">{{ $user?->experience }} Years</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Phone: <span class="text-secondary">{{ $user?->phone }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Email: <span class="text-secondary">{{ $user?->email }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Address: <span class="text-secondary">{{ $user?->address }}</span></h6></div>
                        <div class="col-sm-6 py-2"><h6 class="text-secondary">Freelance: <span class="text-secondary">Available</span></h6></div>
                    </div>
                    <a href="{{ $setting->freelance_url }}" class="btn btn-outline-primary mr-4">Hire Me</a>
                    {{-- <a href="" class="btn btn-outline-primary">Learn More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid bg-dark py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary">Education & Expericence</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4 text-white-50">My Education</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($educations as $education)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute " style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1 text-white-50">{{ $education->title }}</h5>
                            <p class="mb-2 text-white-50"><strong>{{ $education->association }}</strong> | <small>{{ $education->from }} - {{ $education->to }}</small></p>
                            <p>{{ $education->description }} </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4 text-white-50">My Expericence</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        @foreach ($experiences as $experience)
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute" style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1 text-white-50">{{ $experience->title }}</h5>
                            <p class="mb-2 text-white-50"><strong>{{ $experience->association }}</strong> | <small>{{ $experience->from }} - {{ $experience->to }}</small></p>
                            <p>{{ $experience->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5 bg-dark" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            @php
                $groups = max(1, (int) ceil($skills->count() / 3));
            @endphp

            <div class="row align-items-center">
                @foreach($skills->split($groups) as $row)
                    <div class="col-md-6">
                        @foreach($row as $skill)
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold text-white-50">{{ $skill->name }}</h6>
                                    <h6 class="font-weight-bold text-white-50">{{ $skill->percent }}%</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100" style="background-color: {{ $skill->color }}"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid bg-dark pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Service</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Services</h1>
            </div>
            <div class="row pb-3">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="{{ $service->icon }} service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0 text-white-50">{{ $service->name }}</h4>
                    </div>
                    <p>{{ $service->description }}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid bg-dark pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Gallery</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Project</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li class="btn btn-sm btn-outline-primary m-1"
                                data-filter=".{{ Str::slug($category->name) }}">
                                {{ $category->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{ Str::slug($portfolio->category->name) }}">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid rounded w-100" src="{{ asset("storage/$portfolio->image") }}" alt="">
                            <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                <a href="{{ asset("storage/$portfolio->image") }}" data-lightbox="portfolio">
                                    <i class="fa fa-plus text-white" style="font-size: 50px;"></i>
                                </a>
                                <a href="{{ $portfolio->project_url }}" target="_blank">
                                    <i class="fa-solid fa-link text-white" style="margin-left:20px; font-size: 50px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 bg-dark" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Review</h1>
                <h1 class="position-absolute text-uppercase text-primary">Client Testimonials</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($reviewers as $review)
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4 text-white-50">{{ $review->description }}</h4>
                            <img class="img-fluid rounded-circle mx-auto mb-3" src="{{ asset("storage/$review->image") }}" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0 text-white-50">{{ $review->name }} </h5>
                            <span class="text-white-50">{{ $review->job }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5 bg-dark" id="contact">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase" style="-webkit-text-stroke: 1px black;">Contact</h1>
                <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        @if (Session::has('message'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: '{{ session('message') }}',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        <br>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required name="name" value="{{old('name')}}"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Your Email" value="{{old('email')}}"
                                        required name="email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject" value="{{old('subject_mail')}}"
                                    required name="subject_mail"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="content"
                                    required>{{old('content')}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                            @if ($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                             @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-3 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->github_url }}"><i class="fab fa-github"></i></a>
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->fb_url }}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-light btn-social mr-2" href="{{ $setting->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-secondary" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-secondary" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-secondary" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-secondary" href="#">Help</a>
            </div>
            <p class="m-0">&copy; <a class="text-secondary font-weight-bold" href="#">Domain Name</a>. All Rights Reserved.
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-secondary scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>

@endsection
