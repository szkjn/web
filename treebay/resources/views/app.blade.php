<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/appIndex.css">
    <link rel="stylesheet" href="/css/posts.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- @yield('link') --}}
    <title>{{ config('app.name') }}</title>
</head>

<body>

    <header>
        <section class="text-gray-900 text-sm w-full fixed z-50">
            <nav class="bg-gray-900 text-white px-4 py-3 flex items-center justify-between h-16">
                <div class="nav-bar-left flex items-center space-x-4">
                    <ul class="flex items-center font-semibold space-x-8">
                        <li>
                            <a href="{{ url('/', app()->getLocale()) }}">
                                <img src="/images/svg/olivier.svg" alt="Logo Sapin"
                                    class="h-10 hover:opacity-70 duration-300">
                            </a>
                        </li>
                        <a class="" href="{{ route('posts', app()->getLocale()) }}">
                            <li class="border-2 border-white rounded-lg px-4 py-1 font-mono uppercase text-lg
                                hover:text-green-300 hover:border-green-300 duration-300">
                                {{__('Ads')}}
                            </li>
                        </a>
                        <li>
                            <a class="hidden md:flex text-lg hover:text-green-300 duration-300"
                                href="{{ route('about-us', app()->getLocale()) }}">
                                {{__('About')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-bar-right flex items-center space-x-4">
                    <div class="flex items-center space-x-4">
                        <ul class="hidden md:flex items-center font-semibold space-x-8">
                            {{-- switch language --}}
                            <li>
                                <a class="text-lg text-gray-300 hover:text-green-300 duration-300" 
                                href="{{ route( Route::currentRouteName(), 'en')}}">EN</a>
                            </li>
                            <li>
                                <a class="text-lg text-gray-300 hover:text-green-300 duration-300" 
                                href="{{ route( Route::currentRouteName(), 'fr')}}">FR</a>
                            </li>
                            @if (!Auth::check())
                                <li><a class="text-lg hover:text-green-300 duration-300"
                                        href="{{ route('home1', app()->getLocale()) }}">{{__('Account')}}</a></li>
                            @else
                                <li>
                                    <a class="text-lg hover:text-green-300 duration-300" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-lg hover:text-green-300 duration-300" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <a class="text-lg hover:text-green-300 duration-300"
                                            href="{{ route('change_password', app()->getLocale()) }}">{{ Auth::user()->name }}</a>
                                    </a>
                                </li>
                                @can('edit', Auth::user())
                                    <li>
                                        <a class="text-lg hover:text-green-300 duration-300"
                                            href="{{ route('admin', app()->getLocale()) }}">{{__('Admin')}}</a>
                                    </li>
                                @endcan
                                <li>
                                    <a class="text-lg hover:text-green-300 duration-300"
                                        href="{{ route('add_post', app()->getLocale()) }}">{{__('Post your Ad')}}</a>
                                </li>
                                <li>
                                    <a class="text-lg hover:text-green-300 duration-300" href="{{ route('logout', app()->getLocale()) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="menu-wrap">
                <input type="checkbox" class="toggler">
                <div class="hamburger rounded">
                    <div>
                    </div>
                </div>
                <div class="menu">
                    <div>
                        <div>
                            <ul>
                                <li><a href="#" class="text-2xl font-mono uppercase">{{__('Cart')}}</a></li>
                                <li><a href="{{url(app()->getLocale())}}/pages/addPost" class="text-2xl font-mono uppercase">{{__('Post your Ad')}}</a></li>
                                <li><a href="{{url(app()->getLocale())}}/login" class="text-2xl font-mono uppercase">{{__('Account')}}</a></li>
                                <li><a href="{{url(app()->getLocale())}}/pages/about-us" class="text-2xl font-mono uppercase">{{__('About')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </header>


    @yield('content')
    {{-- admin user content --}}
    @yield('admin_content')
    @yield('display_user')
    @yield('update_user')

    {{-- post_content --}}
    {{-- @yield('display_post')
    @yield('update_post') --}}
    @yield('edit_post')
    @yield('add_post')

    {{-- admin category content --}}
    @yield('display_category')
    @yield('update_category')
    @yield('add_category')


    <div class="flex flex-col items-center py-12 md:py-16 bg-green-600 space-y-4">
        <div class="text-2xl md:text-3xl uppercase font-mono text-gray-200 pb-2">All our ads</div>
        <div class="border-b-4 border-gray-200 rounded-full w-32"></div>
        <div class="flex flex-col space-y-8 lg:space-y-0 lg:flex-row items-center text-gray-200 justify-between lg:w-11/12 xl:w-3/4 pt-8 md:pt-16">
            <div class="flex flex-col w-full lg:w-auto">
                <h3 class="text-2xl font-medium pb-4 md:pb-8">Buy a single tree</h3>

                <a href="{{url(app()->getLocale())}}/posts/?type=single-tree" class="md:text-lg hover:underline hover:text-white">All single tree
                    ads</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=Center&type=single-tree"
                    class="md:text-lg hover:underline hover:text-white">Buy
                    a tree in the Center</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=North&type=single-tree"
                    class="md:text-lg hover:underline hover:text-white">Buy a
                    tree in the North</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=East&type=single-tree" class="md:text-lg hover:underline hover:text-white">Buy
                    a
                    tree in the East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-East&type=single-tree"
                    class="md:text-lg hover:underline hover:text-white">Buy a tree in the South-East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-West&type=single-tree"
                    class="md:text-lg hover:underline hover:text-white">Buy a tree in the South-West</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=West&type=single-tree" class="md:text-lg hover:underline hover:text-white">Buy
                    a
                    tree in the West</a>
            </div>
            <div class="flex flex-col w-full lg:w-auto">
                <h3 class="text-2xl font-medium pb-4 md:pb-8">Invest in a parcel of trees</h3>
                <a href="{{url(app()->getLocale())}}/posts/?type=small-bundle" class="md:text-lg hover:underline hover:text-white">All small bundle
                    ads</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=Center&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy
                    a small bundle of trees in the Center</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=North&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy
                    a small bundle of trees in the North</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=East&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy a
                    small bundle of trees in the East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-East&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy a small bundle of trees in the
                    South-East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-West&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy a small bundle of trees in the
                    South-West</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=West&type=small-bundle"
                    class="md:text-lg hover:underline hover:text-white">Buy a
                    small bundle of trees in the West</a>
            </div>
            <div class="flex flex-col w-full lg:w-auto">
                <h3 class="text-2xl font-medium pb-4 md:pb-8">Invest in a forest</h3>
                <a href="{{url(app()->getLocale())}}/posts/?type=medium-bundle" class="md:text-lg hover:underline hover:text-white">All medium
                    bundle
                    ads</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=Center&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the Center</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=North&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the North</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=East&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-East&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the South-East</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=South-West&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the South-West</a>
                <a href="{{url(app()->getLocale())}}/posts/?location=West&type=medium-bundle"
                    class="md:text-lg hover:underline hover:text-white">Invest in a forest in the West</a>
            </div>
        </div>
    </div>

    <footer
        class="w-full bg-gray-900 text-white">
        <div class="px-4 py-8">
            <div class="grid md:flex items-center justify-around py-4">

                <div class="row-start-3 row-end-6 col-start-1 col-span-4 pt-6 md:pt-0 flex flex-col space-y-8 md:space-y-12">
                    <div class="flex justify-center md:justify-start">
                        <div class="flex items-center justify-start">
                            <div class="h-12 w-12 md:h-16 md:w-16 border-2 border-white rounded-full">
                                <img class="h-auto" src="/images/svg/olivier.svg" alt="Oliver Tree Logo">
                            </div>
                            <h1 class="text-4xl md:text-6xl font-mono text-white pl-6">treebay</h1>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4">
                        <p class="text-center md:text-left md:text-2xl font-semibold font-mono uppercase">Follow us</p>
                        <div class="flex items-center justify-center md:justify-start space-x-2">
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/linkedin.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/github.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/instagram-new.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/pinterest.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/reddit.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/whatsapp.png" />
                            </a>
                            <a href="#" class="transform hover:rotate-45 duration-300">
                                <img src="https://img.icons8.com/small/32/ffffff/stackoverflow.png" />
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="text-center md:text-left flex flex-col items-center md:items-start xl:flex-row xl:items-center">
                            <p>Feedback or comments? Get in touch with us at: </p>
                            <a href="#" class="mt-4 xl:mt-0 xl:ml-2 px-2 py-1 w-max font-semibold font-mono border-2 border-white rounded hover:bg-gray-700 duration-300">
                                hello-world (at) treebay.com
                            </a>
                        </div>
                        <br>
                        <p class="text-center md:text-left ">&copy; Copyright {{ date('Y') }}</p>
                    </div>
                </div>

                <div class="row-start-1 row-end-3 flex col-start-1 col-span-3 flex-col text-center">
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="{{url(app()->getLocale())}}/login" class="text-xl font-mono uppercase">{{__('Log in')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="{{url(app()->getLocale())}}/register" class="text-xl font-mono uppercase">{{__('Register')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="#" class="text-xl font-mono uppercase">{{__('Your Cart')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="#" class="text-xl font-mono uppercase">{{__('Vouchers')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="#" class="text-xl font-mono uppercase">{{__('Green Paper')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="#" class="text-xl font-mono uppercase">{{__('Career')}}</a>
                    </div>
                    <div class="transform hover:rotate-6 duration-300">
                        <a href="#" class="text-xl font-mono uppercase">{{__('About')}}</a>
                    </div>
                </div>

                <div class="row-start-1 row-end-3 col-start-4 cold-span-1 flex">
                    <img class="h-64 transform -rotate-12 hover:rotate-12 duration-300" src="/images/svg/sapin-resized.png"
                        alt="Pine Tree Logo">
                </div>

            </div>

        </div>
    </footer>

</body>

</html>
