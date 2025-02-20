@extends('layouts.app')

@section('content')

@include('pages.components.header')

<section id="product" class="portfolio-section py-16 px-4">
    <div class="container mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">a</h2>
            <p class="text-lg text-indigo-500 font-semibold">Discover our latest projects and success stories</p>
        </div>
        <div class="flex flex-col md:flex-row items-center mb-8">
            <button class="filter-button bg-indigo-500 hover:bg-pink-500 px-4 py-2 mr-2 mb-2 text-white rounded">All</button>
            <button class="filter-button  bg-indigo-500 hover:bg-pink-500 px-4 py-2 mr-2 mb-2 text-white rounded">sensitive skin</button>
            <button class="filter-button  bg-indigo-500 hover:bg-pink-500 px-4 py-2 mr-2 mb-2 text-white rounded">dry skin</button>
            <button class="filter-button  bg-indigo-500 hover:bg-pink-500 px-4 py-2 mr-2 mb-2 text-white rounded">Branding</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-1">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-1.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 1</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">App development</span>
                    </div>
                </a>
            </div>
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-2">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-2.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 2</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">Branding</span>
                    </div>
                </a>
            </div>
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-3">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-3.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 3</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">Web Design,
                            Branding</span>
                    </div>
                </a>
            </div>
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-4">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-4.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 4</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">Web Design,
                            Branding</span>
                    </div>
                </a>
            </div>
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-5">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-5.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 5</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">Web Design,
                            Branding</span>
                    </div>
                </a>
            </div>
            <div class="group portfolio-item relative hover:shadow-lg shadow-md rounded-lg overflow-hidden">
                <a href="/project-6">
                    <img class="w-full h-60 object-cover" src="https://spacema-dev.com/elevate/assets/images/portfolio-6.png" alt="Project 1">
                    <div
                        class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-r from-indigo-500 to-pink-500 opacity-0 transition duration-300 ease-in-out group-hover:opacity-70">
                    </div>
                    <div class="p-4 flex flex-col items-center justify-between relative z-10">
                        <h3 class="text-lg font-medium text-txt group-hover:text-gray-dark">Awesome Project 6</h3>
                        <span class="text-sm font-bold text-pink-500 group-hover:text-indigo-500">Web Design,
                            Branding</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>