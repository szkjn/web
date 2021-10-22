@extends('app')

@section('content')

    {{-- border-4 border-blue-400 sm:border-gray-400 md:border-yellow-400 lg:border-pink-400 xl:border-red-500 --}}
    <div class="h-18 border-b-1 border-black bg-green-100 pt-16">
        <div class="flex flex-col space-y-2 lg:space-y-0 lg:flex-row items-center justify-between list-none mx-auto px-4 md:px-8 py-4 max-w-screen-xl 
                        ">

            <div class="flex w-full">
                <div class="w-full lg:w-5/6 mx-auto lg:mx-0 h-8 border border-gray-500">
                    <form method="GET" action="#" class="">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('location'))
                            <input type="hidden" name="location" value="{{ request('location') }}">
                        @endif
                        @if (request('order-by'))
                            <input type="hidden" name="location" value="{{ request('order-by') }}">
                        @endif
                        <input type="text" name="search" placeholder="{{__('Search...')}}" value="{{ request('search') }}"
                            class="pl-3 w-full h-7 bg-rwhite hover:bg-gray-100 duration-300 no-underline">
                    </form>
                </div>

                {{-- <div class="reset-btn">
                    <a href="{{url(app()->getLocale())}}/posts/"
                        class="flex items-center justify-between space-x-2 bg-white rounded-full border-2 border-white px-2 hover:border-gray-700 duration-300">
                        <p class="text-sm text-gray-700">Reset</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </a>
                </div> --}}
            </div>

            <div
                class="flex flex-wrap md:space-y-0 md:flex-nowrap items-center w-full justify-between space-x-0 md:space-x-8">

                <div x-data="{ show:false }" @click.away="show = false"
                    class="bg-white rounded-full w-5/12 lg:w-36 mb-2 md:mb-0 border-2 border-white hover:border-gray-700 duration-300">
                    <div class="text-center">
                        <button @click="show = !show" class="px-2 py-1 w-full">
                            {{ isset($currentCategory) ? $currentCategory->name : __('Category') }}
                        </button>
                    </div>
                    <div x-show="show" style="display:none"
                        class="absolute bg-white border-2 border-gray-700 rounded-xl w-36 px-2 py-2 mt-2 drop-shadow-2xl">
                        <a href="{{url(app()->getLocale())}}/posts/?{{ http_build_query(request()->except('category', 'page')) }}"
                            class="block hover:text-green-600">All</a>

                        @foreach ($categories as $category)
                            <a href="{{url(app()->getLocale())}}/posts/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                class="block hover:text-green-600"> {{ $category->name }}</a>
                        @endforeach

                    </div>
                </div>

                <div x-data="{ show:false }" @click.away="show = false"
                    class="bg-white rounded-full w-5/12 lg:w-36 mb-2 md:mb-0 border-2 border-white hover:border-gray-700 duration-300">
                    <div class="text-center">
                        <button @click="show = !show" class="px-2 py-1 w-full">
                            {{ isset($currentType) ? $currentType->name : __('Type') }}
                        </button>
                    </div>
                    <div x-show="show" style="display:none"
                        class="absolute bg-white border-2 border-gray-700 rounded-xl w-36 px-2 py-2 mt-2 drop-shadow-2xl">
                        <a href="{{url(app()->getLocale())}}/posts/?{{ http_build_query(request()->except('type', 'page')) }}"
                            class="block hover:text-green-600">All</a>

                        @foreach ($types as $type)
                            <a href="{{url(app()->getLocale())}}/posts/?type={{ $type->slug }}&{{ http_build_query(request()->except('type', 'page')) }}"
                                class="block hover:text-green-600"> {{ $type->name }}</a>
                        @endforeach

                    </div>
                </div>

                <div x-data="{ show:false }" @click.away="show = false"
                    class="bg-white rounded-full w-5/12 lg:w-36 border-2 border-white hover:border-gray-700 duration-300">
                    <div class="text-center">
                        <button @click="show = !show" class="px-2 py-1 w-full">
                            {{ isset($currentLocation) ? $currentLocation->location : __('Location') }}
                        </button>
                    </div>
                    <div x-show="show" style="display:none"
                        class="absolute bg-white border-2 border-gray-700 rounded-xl w-36 px-2 py-2 mt-2 drop-shadow-2xl">
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">All</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=North&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">North</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=Center&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">Center</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=West&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">West</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=East&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">East</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=South-West&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">South West</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?location=South-East&{{ http_build_query(request()->except('location', 'page')) }}"
                                class="hover:text-green-600">South East</a></li>
                    </div>
                </div>

                <div x-data="{ show:false }" @click.away="show = false"
                    class="bg-white rounded-full w-5/12 lg:w-36 border-2 border-white hover:border-gray-700 duration-300">
                    <div class="text-center">
                        <button @click="show = !show" class="px-2 py-1 w-full">
                            {{__('Order by')}}
                        </button>
                    </div>

                    <div x-show="show" style="display:none"
                        class="absolute bg-white border-2 border-gray-700 rounded-xl w-36 px-2 py-2 mt-2 drop-shadow-2xl">
                        <li><a href="{{url(app()->getLocale())}}/posts/?order=newest&{{ http_build_query(request()->except('order', 'page')) }}&"
                                class="hover:text-green-600">Newest</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?order=oldest&{{ http_build_query(request()->except('order', 'page')) }}&"
                                class="hover:text-green-600">Oldest</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?order=price-asc&{{ http_build_query(request()->except('order', 'page')) }}&"
                                class="hover:text-green-600 ">Price -</a></li>
                        <li><a href="{{url(app()->getLocale())}}/posts/?order=price-desc&{{ http_build_query(request()->except('order', 'page')) }}&"
                                class="hover:text-green-600">Price +</a></li>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="flex items-center justify-between mx-auto px-4 md:px-8 max-w-screen-xl">
        <div class="flex flex-wrap justify-start my-2 sm:my-4 md:my-8 space-x-2 md:space-x-4">
            <div class="">
                <a href="{{url(app()->getLocale())}}/">
                    <p class="md:text-lg text-green-500 hover:underline duration-300">Home</p>
                </a>
            </div>
            <div class="flex items-center justify-start space-x-2 md:space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{url(app()->getLocale())}}/posts">
                    <p class="md:text-lg text-green-500 hover:underline duration-300">Ads</p>
                </a>
            </div>
            @if (!empty(request()->except('page')))
                @if (!empty(request('category')))
                    <div class="flex items-center justify-start space-x-2 md:space-x-4">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="{{url(app()->getLocale())}}/posts/?category={{ $currentCategory->slug }}">
                            <p class="md:text-lg text-green-500 hover:underline duration-300">
                                {{ $currentCategory->name }}</p>
                        </a>
                    </div>
                @endif

                @if (!empty(request('type')))
                    <div class="flex items-center justify-start space-x-2 md:space-x-4">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="{{url(app()->getLocale())}}/posts/?type={{ $currentType->slug }}">
                            <p class="md:text-lg text-green-500 hover:underline duration-300">
                                {{ $currentType->name }}</p>
                        </a>
                    </div>
                @endif

                @if (!empty(request('location')))
                    <div class="flex items-center justify-start space-x-2 md:space-x-4">
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="{{url(app()->getLocale())}}/posts/?location={{ $currentLocation->location }}">
                            <p class="md:text-lg text-green-500 hover:underline duration-300">
                                {{ $currentLocation->location }}</p>
                        </a>
                    </div>
                @endif

            @endif
        </div>

        <div class="">
            @foreach ($posts as $post)
                @can('edit', $post)
                    <input type="submit" form="multiple_edit_post_form" name="submit_multiple_edit" value="{{__('Edit multiple ads')}}"
                        class="border-4 border-red-500 border-double rounded py-2 text-gray-700 font-mono uppercase cursor-pointer bg-white 
                                hover:bg-red-400 hover:text-white hover:border-white duration-100 
                                w-16 px-2 sm:px-4 sm:w-auto">
                @endcan
            @break
            @endforeach
        </div>

    </div>



    <div class="mx-auto md:my-8 max-w-screen-xl md:px-8">
        <div class="grid md:grid-cols-2 xl:grid-cols-3 border-0 md:border-2 border-gray-200 rounded-lg">

            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                {{-- @if($post->lang == $locale) --}}
                    <article class="{{ (app()->getLocale() == 'en') ? '' : '' }} mt-4 px-4">
                        <div class="overflow-hidden rounded h-64">
                            <img src="{{ $post->picture }}" alt="{{ $post->title }}"
                                class="object-cover h-full w-full">
                        </div>

                        <div class="flex items-start md:items-center justify-between pt-4">
                            <div class="pb-2 font-bold">
                                <h1>
                                    <a href="{{url(app()->getLocale())}}/posts/{{ $post->id }}"
                                        class="text-xl md:text-2xl text-gray-800 hover:text-green-400 hover:underline">
                                        {{ $post->title }}
                                    </a>
                                </h1>
                            </div>
                            <div class="text-xl text-gray-800 pl-4 pb-2">
                                {{ $post->price }}€
                            </div>
                        </div>

                        <div class="flex items-start justify-between pt-4 border-t-2 border-t-gray-100">

                            <div class="w-1/2 md:w-auto text-gray-400">
                                <p>{{__('posted by')}}
                                    {{-- @dd(app()->getLocale()); --}}
                                    <a href='{{url(app()->getLocale())}}/posts/?author={{ $post->author }}'
                                        class="text-black hover:text-green-400">{{ $post->author }}</a>
                                </p>
                                <p class="pb-4">
                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </p>
                            </div>

                            <div class="w-1/2 md:w-auto grid justify-items-end space-y-3 text-gray-400">
                                <div class="">
                                    <a href="{{url(app()->getLocale())}}/posts/?category={{ $post->category->slug }}"
                                        class="border-2 border-grey-200 rounded-full px-2 py-1
                                                                                                hover:text-green-400 hover:border-green-400 duration-300">
                                        {{ $post->category->name }}
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{url(app()->getLocale())}}/posts/?type={{ $post->type->slug }}"
                                        class="border-2 border-grey-200 rounded-full px-2 py-1
                                                                                                hover:text-green-400 hover:border-green-400 duration-300">
                                        {{ $post->type->name }}
                                    </a>
                                </div>
                                <div>
                                    <a href="{{url(app()->getLocale())}}/posts/?location={{ $post->location }}"
                                        class="border-2 border-grey-200 rounded-full px-2 py-1 
                                                                                                hover:text-green-400 hover:border-green-400 duration-300">
                                        {{ $post->location }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 mb-2 sm:my-6 h-24 sm:h-28 overflow-hidden">
                            <div class="description sm:pb-4 sm:text-lg text-gray-800">
                                {!! $post->description !!}<br><br>
                            </div>

                        </div>




                        {{-- CRUD POST --}}
                        @can('edit', $post){{-- authorisation --}}
                            <div
                                class="flex items-center justify-between border-0 border-red-500 border-double px-2 mb-4 text-gray-700 font-mono uppercase cursor-pointer bg-white">

                                <div class="">
                                    {{-- checkbox --}}
                                    <input type="checkbox" name="multiple_edit_post[]" value="{{ $post->id }}"
                                        form="multiple_edit_post_form" class="">
                                    {{-- form multi edit --}}
                                    <form action="{{ route('edit_post', app()->getLocale()) }}" method="POST" id="multiple_edit_post_form"
                                        enctype="multipart/form-data"> 
                                        @csrf
                                    </form>
                                </div>


                                <div class="flex items-center justify-end">
                                    {{-- form single edit or delete --}}
                                    <div class="group hover:bg-red-200 rounded p-2 duration-200">
                                        <form action="{{ route('edit_post', app()->getLocale()) }}" method="POST">
                                            @csrf
                                            <input type="submit" name="edit_post" value="" class="edit group-hover:bg-red-200 duration-200">
                                            <input type='hidden' name="edit" value="{{ $post->id }}">
                                        </form>
                                    </div>

                                @endcan

                                @can('delete', $post){{-- authorisation --}}
                                    <div class="group hover:bg-red-200 rounded p-2 duration-200">
                                        <form action="{{ route('delete_post', app()->getLocale()) }}" method="POST">
                                            @csrf
                                            <input type="submit" name="delete_post" value="" class="trash group-hover:bg-red-200 duration-200">
                                            <input type='hidden' name="deletePost" value="{{ $post->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endcan
                        {{-- fin du CRUD Post --}}      
                    </article>
                    {{-- @endif  --}}
                @endforeach
            @else
                No posts matching your search.
            @endif
        </div>
        <div class="px-4 md:px-0 mt-4 w-full">
            {{ $posts->links() }}
        </div>
        
    </div>


    <div class="nav-bottom flex items-center justify-between mx-auto px-4 md:px-8 my-8 max-w-screen-xl">
        <div class="">
            <a href="{{url(app()->getLocale())}}/">
                <p class="text-lg hover:text-green-500 duration-300">&#8617; Home</p>
            </a>
        </div>
        <div class="">
            <a href="#">
                <p class="text-lg hover:text-green-500 duration-300">&#8593; Top</p>
            </a>
        </div>
    </div>

@endsection
