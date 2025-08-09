@extends('layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-dark d-flex align-items-center mb-2 py-5" id="home" style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left side: User Info -->
                <div class="col-lg-6 px-5 pl-lg-0 pb-5 pb-lg-0 text-center text-lg-left">
                    <img class="img-fluid w-75 rounded-circle shadow-sm mb-4" src="{{ asset("storage/$user?->profile_pic") }}" alt="Profile Picture">
                    <h3 class="text-white font-weight-normal mb-3">Hi, I'm Ruel</h3>
                    <h3 class="text-white font-weight-normal mb-3">We’d Love Your Feedback!</h3>
                    <p class="text-white-50 font-weight-normal">
                        Your opinion means a lot to us. Please take a moment to share your experience working with me. Your review helps me improve and lets others know what to expect.
                    </p>
                </div>

                <!-- Right side: Review Form -->
                <div class="col-lg-6">
                    <div class="rounded p-4 shadow" style="background: transparent;">
                        <h4 class="mb-4 text-center text-white">Write a Review</h4>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="review_name" class="text-white">Name</label>
                                <input type="text" class="form-control" id="review_name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="review_job" class="text-white">Job</label>
                                <input type="text" class="form-control" id="review_job" name="job" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="review_profile_pic" class="text-white">Profile Picture (optional)</label>
                                <input type="file" class="form-control" id="review_profile_pic" name="profile_pic" accept="image/*">
                            </div>
                            <div class="form-group mb-3">
                                <label for="review_message" class="text-white">Message</label>
                                <textarea class="form-control" id="review_message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->





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
