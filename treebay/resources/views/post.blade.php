@extends('app')

@section('content')




    <div class="pt-16">
    </div>

    <div class="flex flex-wrap items-center justify-start my-2 sm:my-4 md:my-8 mx-auto px-4 md:px-8 max-w-screen-xl space-x-2 md:space-x-4">
        <div class="">
            <a href="{{url(app()->getLocale())}}/">
                <p class="text-lg text-green-500 hover:underline duration-300">Home</p>
            </a>
        </div>
        <div class="flex items-center justify-start space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{url(app()->getLocale())}}/posts">
                <p class="text-lg text-green-500 hover:underline duration-300">Ads</p>
            </a>
        </div>

        <div class="flex items-center justify-start space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{url(app()->getLocale())}}/posts/?category={{ $post->category->slug }}">
                <p class="text-lg text-green-500 hover:underline duration-300">
                    {{ $post->category->name }}</p>
            </a>
        </div>


        <div class="flex items-center justify-start space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{url(app()->getLocale())}}/posts/?type={{ $post->type->slug }}">
                <p class="text-lg text-green-500 hover:underline duration-300">
                    {{ $post->type->name }}</p>
            </a>
        </div>

        <div class="flex items-center justify-start space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{url(app()->getLocale())}}/posts/?location={{ $post->location }}">
                <p class="text-lg text-green-500 hover:underline duration-300">
                    {{ $post->location }}</p>
            </a>
        </div>
    </div>

    <div class="main-container mx-auto grid max-w-screen-xl bg-gray-100 rounded-xl p-4 filter drop-shadow-lg z-10">
        <div class="flex items-start justify-between">
            <div class="w-2/3 mr-2">

                <div class="overflow-hidden rounded-xl h-auto filter drop-shadow-xl">
                    <img src="{{ $post->picture }}" alt="{{ $post->title }}" class="w-full object-cover">
                </div>


                <div class="mt-4 p-4 text-lg">
                    <p class="text-xl text-gray-800">
                        {!! $post->description !!}
                    </p>
                </div>


            </div>
            <div class="ml-2 p-4 w-1/3 h-auto">

                <div class="flex items-center justify-between pb-8 text-gray-700">
                    <div class="font-bold text-3xl">
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <div class="text-3xl">
                        <h5>{{ $post->price }}€</h5>
                    </div>
                </div>

                <div class="pb-8">
                    <div class="text-gray-400">
                        <div class="flex items-center justify-start space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <p class="text-lg">posted by</p>
                            <a href="{{url(app()->getLocale())}}/posts/?author={{ $post->author }}"
                                class="text-gray-800 text-lg hover:text-green-400">{{ $post->author }}</a>

                        </div>
                        <div class="flex items-center justify-start space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-lg">
                                {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
                            </p>
                        </div>

                    </div>
                </div>

                <div class="text-gray-400 flex flex-col space-y-2 pb-8">
                    <div class="flex items-center justify-start space-x-2">
                        <img src="https://img.icons8.com/windows/32/000000/tree.png" / class="opacity-40 w-6">
                        <a href="{{url(app()->getLocale())}}/posts/?category={{ $post->category->slug }}" class="border-2 border-grey-200 rounded-full px-2
                                                            text-lg hover:text-green-400 hover:border-green-400">
                            {{ $post->category->name }}
                        </a>
                    </div>
                    <div class="flex items-center justify-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <a href="{{url(app()->getLocale())}}/posts/?type={{ $post->type->slug }}" class="border-2 border-grey-200 rounded-full px-2
                                                    text-lg hover:text-green-400 hover:border-green-400">
                            {{ $post->type->name }}
                        </a>
                    </div>
                    <div class="flex items-center justify-start space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <a href="#" class="border-2 border-grey-200 rounded-full px-2
                                                            text-lg hover:text-green-400 hover:border-green-400">
                            {{ $post->location }}
                        </a>
                    </div>
                </div>

                <div class="flex items-center justify-between text-white pb-10">
                    <div class="flex items-center justify-start space-x-2">
                        <a href="#"
                            class="group rounded hover:text-green-400 hover:border-green-400 duration-300 bg-green-400 hover:bg-white flex items-center justify-start px-4 py-2 space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform group-hover:rotate-12"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="text-lg font-semibold">
                                Add to cart
                            </p>
                        </a>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8 text-red-500 cursor-pointer transform hover:h-12 hover:w-12 hover:rotate-12 duration-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>

                <div class="text-gray-500">
                    <p class="text-xl pb-4">
                        You may also like :
                    </p>
                    @for ($i = 1; $i < 6; $i++)
                        <a href="{{url(app()->getLocale())}}/posts/{{ $post->id }}" class="text-lg text-green-400 hover:underline duration-300">
                            {{ $post->title }}
                        </a> <br>
                        {{-- {{$post->all()->where('category_id', $post->category->id)}} --}}
                    @endfor


                </div>

            </div>
        </div>
        </article>
    </div>

    <div class="nav-bottom flex items-center justify-between mx-auto my-8 max-w-screen-xl">
        <div>
            <a href="{{url(app()->getLocale())}}/posts">
                <p class="text-lg text-gray-800 hover:text-green-400">&#8617; All Ads</p>
            </a>
        </div>
        <div>
            <a href="#">
                <p class="text-lg text-gray-800 hover:text-green-400">&#8593; {{__('Top of the page')}}</p>
            </a>
        </div>
    </div>

@endsection
