@extends('layouts.app')

@section('content')

@include('pages.components.header')

<div class="relative w-full h-[320px]" id="home">
    <div class="absolute inset-0 opacity-70">
        <img src="/images/aura1.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />
    </div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
        <div class="w-full px-6">
            <h1 class="text-gray-700 font-medium text-4xl md:text-5xl leading-tight mb-2">Jinnion Beauty</h1>
            <p class="font-regular text-xl mb-8 mt-4">Where Confidence Meets Creation.</p>
            <a  href="{{ url('/contact')}}"
                class="px-6 py-3 bg-pink-300 text-white font-medium rounded-full hover:bg-pink-400 transition duration-200">
                Contact Us
            </a>
        </div>
    </div>
</div>




<section class="py-10" id="services">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/images/logo1.jpg" alt="logos" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">About our brands</h3>
                    <p class="text-gray-700 text-base">At Jinnion Beauty, we craft brands that celebrate confidence and
                        individuality.
                        From clean skincare and bold cosmetics to nourishing haircare, our products are designed to meet
                        diverse beauty
                        needs. Discover innovation, inclusivity, and self-expression with every Jinnion brand.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/images/delivery.jpg" alt="delivery" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Our delivery</h3>
                    <p class="text-gray-700 text-base">At Jinnion Beauty, we ensure your favorite products reach you
                        quickly and
                        securely. We offer reliable shipping options with tracking updates to keep you informed every
                        step of the way.

                        Enjoy fast, hassle-free delivery straight to your doorstep—because beauty shouldn’t wait.</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="/images/team1.jpg" alt="team" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-2">Meet the Team</h3>
                    <p class="text-gray-700 text-base">At Jinnion Beauty, our passionate team blends creativity and
                        expertise to craft products that inspire confidence. Driven by innovation and inclusivity, we’re
                        dedicated to making your beauty journey extraordinary.
                    <details>
                        <summary>Read More</summary>
                        <p>Our jowar flour is also
                            a good source of protein and fiber, making it a healthy choice for your family.</p>
                    </details>
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>


<section class="bg-gray-100" id="aboutus">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">About Us</h2>
                <p class="mt-4 text-gray-600 text-lg">
                    At Jinnion Beauty, we’re passionate about creating high-quality products that empower you to express
                    your unique beauty. From skincare to cosmetics, each product is designed with inclusivity,
                    innovation, and self-confidence in mind.

                    We believe that beauty is personal, and we’re here to celebrate every individual’s journey with
                    products that inspire, uplift, and deliver results.

                    Join us as we redefine beauty, one product at a time.</p>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="/images/team2.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>


<section class="text-gray-700 body-font mt-10">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
        Why Us?
    </div>
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="/images/icon3.jpg"
                            class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Moisturize</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="./images/icon2.jpg" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">UV light protect</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="./images/icon1.jpg" class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Vegan</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="/images/icon4.jpg"
                            class="w-32 mb-3">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Expertise in Industry</h2>
                </div>
            </div>

        </div>
    </div>
</section>


