@extends('layouts.master')
@section('content')
    <style>
        :root {
            --off-white: #f2f3f5;
            --primary-color: #4a6cf7;
            --dark-color: #333;
            --light-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            --medium-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            --p-base-width: 600px;
            --p-base-height: 820px;
            --p-horizontal-safe-space: 80px;
        }

        /* Hero Section */
        .hero {
            max-height: 105vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 55px 15px 0px;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
            color: var(--dark-color);
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
            max-width: 600px;
            margin-bottom: 60px;
            line-height: 1.6;
        }

        /* P Shape Layout */
        .p-shape-frame {
            position: relative;
            margin: 0 auto;
            width: calc(var(--p-base-width) * var(--p-scale, 1));
            height: calc(var(--p-base-height) * var(--p-scale, 1));
        }

        .hero .p-shape-frame {
            --p-scale: clamp(0.25,
                    calc((100vw - var(--p-horizontal-safe-space)) / var(--p-base-width)),
                    1);
        }

        .p-shape-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: var(--p-base-width);
            height: var(--p-base-height);
            transform-origin: top center;
            transform: translateX(-50%) scale(var(--p-scale, 1));
        }

        /* Individual Image Styles */
        .image-item {
            position: absolute;
            overflow: hidden;
            box-shadow: var(--light-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ddd;
            border: none;
        }

        .image-item::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.35));
            opacity: 1;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .image-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--medium-shadow);
            z-index: 10;
        }

        .image-item:hover::after {
            opacity: 0;
        }

        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-item:hover img {
            transform: scale(1.05);
        }

        /* Left vertical line of P (5 images) */
        .p-left-1 {
            top: 0px;
            left: 10px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

        .p-left-2 {
            top: 150px;
            left: 0px;
            width: 150px;
            height: 120px;
        }

        .p-left-3 {
            top: 290px;
            left: 0px;
            width: 150px;
            height: 120px;
        }

        .p-left-4 {
            top: 430px;
            left: 0px;
            width: 150px;
            height: 120px;
        }

        .p-left-5 {
            top: 570px;
            left: 0px;
            width: 150px;
            height: 120px;
        }

        /* Top horizontal line of P */
        .p-top-1 {
            top: 0px;
            left: 150px;
            width: 150px;
            height: 120px;
        }

        .p-top-2 {
            top: 0px;
            left: 320px;
            width: 150px;
            height: 120px;
        }

        .p-top-3 {
            top: 40px;
            left: 490px;
            width: 150px;
            height: 120px;
        }

        /* Middle D shape of P */
        .p-middle {
            top: 160px;
            left: 225px;
            width: 180px;
            height: 150px;
            border-radius: 0 110px 110px 0;
        }

        /* Bottom horizontal line of P */
        .p-bottom-1 {
            top: 350px;
            left: 224px;
            width: 150px;
            height: 120px;
        }

        .p-bottom-2 {
            top: 350px;
            left: 400px;
            width: 150px;
            height: 120px;
            border-radius: 0px 0px 30px 0px;
        }

        /* Right vertical line of P (3 images) */
        .p-right-1 {
            top: 0px;
            left: 490px;
            width: 150px;
            height: 120px;
            border-top-right-radius: 100px;
        }

        .p-right-2 {
            top: 150px;
            left: 490px;
            width: 155px;
            height: 165px;
            border-radius: 0px 0px 35px 0px;
        }

        .p-right-3 {
            top: 290px;
            left: 490px;
            width: 150px;
            height: 130px;
            border-bottom-right-radius: 50px;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero {
                padding: 50px 24px 80px;
            }
        }
    </style>
    <main class="main">
        <!-- Hero Section -->
        <section class="hero">
            <!-- P Shape Image Layout -->
            <div class="p-shape-frame">
                <div class="p-shape-container">
                    <!-- Left vertical line of P (5 images) -->
                    <div class="image-item p-left-1">
                        <img src="{{ asset('dummy_images/1.jpg') }}" alt="">
                    </div>
                    <div class="image-item p-left-2">
                        <img src="{{ asset('dummy_images/15.jpg') }}" alt="">
                    </div>
                    <div class="image-item p-left-3">
                        <img src="{{ asset('dummy_images/3.jpg') }}" alt="">
                    </div>
                    <div class="image-item p-left-4">
                        <img src="{{ asset('dummy_images/4.jpg') }}" alt="">
                    </div>

                    <!-- Top horizontal line of P -->
                    <div class="image-item p-top-1">
                        <img src="{{ asset('dummy_images/7.jpeg') }}" alt="">
                    </div>
                    <div class="image-item p-top-2">
                        <img src="{{ asset('dummy_images/8.jpeg') }}" alt="Lake and mountains">
                    </div>

                    <!-- Middle D shape of P -->
                    <div class="image-item p-middle">
                        <img src="{{ asset('dummy_images/9.jpeg') }}" alt="Cityscape">
                    </div>

                    <!-- Bottom horizontal line of P -->
                    <div class="image-item p-bottom-1">
                        <img src="{{ asset('dummy_images/10.jpeg') }}" alt="Rocky shore">
                    </div>
                    <div class="image-item p-bottom-2">
                        <img src="{{ asset('dummy_images/11.jpeg') }}" alt="Aurora borealis">
                    </div>

                    <!-- Right vertical line of P (3 images) -->
                    <div class="image-item p-right-1">
                        <img src="{{ asset('dummy_images/12.jpg') }}" alt="Ocean waves">
                    </div>
                    <div class="image-item p-right-2">
                        <img src="{{ asset('dummy_images/13.jpg') }}" alt="Desert landscape">
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Hamburger menu and sidebar functionality
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });

            sidebarOverlay.addEventListener('click', function() {
                this.classList.remove('active');
                sidebar.classList.remove('active');
                hamburger.classList.remove('active');
            });
        </script>
    </main>
@endsection
