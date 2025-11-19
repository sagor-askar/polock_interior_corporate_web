@extends('layouts.master')
@section('content')
    <!-- Header -->
    <div class="jumbotron text-center mb-0">
        <h1 class="display-4">Contact Us</h1>
        <p class="lead">We’d love to hear from you! Reach out anytime.</p>
    </div>

    <div class="container mt-5 mb-5">

        <div class="row">

            <!-- Contact Form -->
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Send us a Message</h4>

                        <form>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" placeholder="Message subject">
                            </div>

                            <div class="form-group">
                                <label>Your Message</label>
                                <textarea class="form-control" rows="5" placeholder="Write your message..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                Send Message
                            </button>
                        </form>

                    </div>
                </div>

            </div>

            <!-- Contact Info -->
            <div class="col-md-4">

                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Our Location</h5>
                        <p>Dhaka, Bangladesh</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Call Us</h5>
                        <p>+880 1234 567 890</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">Email</h5>
                        <p>info@example.com</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
