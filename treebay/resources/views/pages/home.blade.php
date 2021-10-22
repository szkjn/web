@extends('app')

@section('content')

    <div class="info-block-container" id="top">
        <div>
            <div class="text-on-image px-4 py-16 text-white w-auto bg-no-repeat bg-cover bg-fixed"
                style="background-image: url('https://bit.ly/3wi6X2F')">
                <div class="flex items-center justify-start px-2 sm:px-8 md:px-12 lg:px-20 pt-8 md:pt-12 lg:pt-20 xl:pt-36 pb-12">
                    <div class="h-12 w-12 sm:h-16 sm:w-16 border-2 border-white rounded-full">
                        <img class="h-auto" src="/images/svg/olivier.svg" alt="Logo Sapin">
                        {{-- <p class="text-center -mt-5">treebay</p> --}}
                    </div>
                    <h1 class="text-5xl sm:text-6xl font-mono text-white pl-2 sm:pl-6">treebay</h1>

                </div>

                <h2 class="title text-2xl lg:text-4xl font-mono uppercase px-4 sm:px-8 md:px-12 lg:px-20 pb-10 w-5/6 sm:w-3/4 lg:w-2/3">The first secondary market for trees and
                    forest parcels</h2>
                <div class="subtitle font-medium text-xl lg:text-2xl px-4 sm:px-8 md:px-12 lg:px-20 pb-20 sm:pb-32 md:pb-44 lg:pb-56 xl:pb-80 leading-10">
                    <a href="#learn-more"
                        class="font-medium text-xl lg:text-2xl underline scrollLink hover:text-green-300 duration-300">Learn more</a>
                    about our
                    passion for sustainable forestry. <br>
                    <div class="pt-4">
                        <a href="#take-part"
                            class="font-medium text-xl lg:text-2xl underline scrollLink hover:text-green-300 duration-300">Take part
                            now</a>.
                    </div>

                </div>
            </div>
        </div>

        <div class="bg-green-300">
            <div class="px-10 py-12 md:py-20 space-y-10">
                <h3 class="text-xl font-medium text-center text-white mx-auto w-full font-mono uppercase">Who we are</h3>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-center text-white font-mono uppercase mx-auto w-full md:w-2/3 lg:w-1/2 xl:w-1/3">a
                        community-driven market place</h3>
                    <div class="text-xl sm:text-2xl text-gray-600 pt-4 font-mono text-center">For everyone, by everyone</div>
                </div>
                <div class="border-b-4 border-yellow-300 w-32 mx-auto"></div>
                <p class="text-lg sm:text-xl text-center leading-8 max-w-5xl mx-auto md:pt-4 text-gray-600 text-justify w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                    We have put in place what we think is the ideal place for buyers and investors to meet and share
                    their love for Mother Nature. <a href="{{url(app()->getLocale())}}/register"
                        class="text-lg sm:text-xl font-medium underline hover:text-white duration-300">Take part and
                        join us</a>
                    in our journey towards making the world a better place
                    by incentivising <strong class="text-lg sm:text-xl">mindfull forestation</strong> and generalise green
                    attitude.<br>
                </p>
                <h3 class="text-2xl sm:text-3xl font-medium text-center text-white font-mono uppercase mx-auto w-full md:w-2/3 lg:w-1/2 xl:w-1/3">Join our
                    community<br>&<br>
                    Help us maintain our forests</h3>
                <p class="text-lg sm:text-xl text-center leading-8 max-w-5xl mx-auto text-gray-600 w-1/3 text-justify w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                    <a href="{{url(app()->getLocale())}}/register" class="text-lg sm:text-xl font-medium underline hover:text-white duration-300">
                        Sign up now
                    </a>
                    and create an account to post your very own ads and let the community profit from what you have to offer
                    !
                    Browse through a variety of items: from a
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(1)->slug }}&"
                        class="text-lg sm:text-xl underline hover:text-white duration-300">single tree</a> to
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(2)->slug }}&"
                        class="text-lg sm:text-xl underline hover:text-white duration-300">small bundles</a>... up until
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(3)->slug }}&"
                        class="text-lg sm:text-xl underline hover:text-white duration-300">large scale investments</a>.
                    There's an opportunity for everyone to get involved in <strong class="text-lg sm:text-xl">Green Economy</strong>
                    and
                    <strong class="text-lg sm:text-xl">invest into our Future</strong>.
                </p>
            </div>
            <div class="flex justify-end p-5">
                <a href="#top" class="scrollLink bg-black bg-opacity-20 rounded px-2">
                    <p class="text-xl text-white hover:underline">&#8593; Top</p>
                </a>
            </div>
        </div>

        <div class="bg-yellow-200 h-auto" id="take-part">
            <div class="flex flex-col items-center justify-center w-full py-10 mx-auto">
                <div class="text-green-600 uppercase text-xl font-mono md:pt-10">what we offer</div>
                <div class="text-center text-2xl sm:text-3xl text-gray-600 font-medium px-4 pt-8 pb-2">A wide variety of ads that suit every needs</div>
                <div class="text-center text-xl sm:text-2xl text-gray-600 px-4 pb-12">From beginners to advanced investors</div>
                <div class="border-b-4 border-green-600 rounded-full w-32"></div>
            </div>
            <div class="flex flex-col space-y-8 md:space-y-0 md:flex-row items-center justify-evenly w-full mx-auto md:pt-12 lg:pt-20 pb-10">
                <div class="w-3/4 sm:w-1/2 md:w-3/12 lg:w-80 h-96 lg:h-auto bg-white px-2 py-4 lg:p-8 rounded-3xl hover:bg-green-100 duration-300">
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(1)->slug }}&">
                        <div class="h-52 w-52 md:h-40 md:w-40 lg:h-60 lg:w-60 mx-auto rounded-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url('/images/thumbnails/sitka-spruce-small.jpg')">
                        </div>
                        <div class="text-center text-xl lg:text-2xl text-gray-800 font-mono py-5">Buy <br> a single tree</div>
                        <div class="text-center text-base lg:text-lg text-gray-800">Your first eco-investment<br>From 15€ to 50€</div>
                    </a>
                </div>
                <div class="w-3/4 sm:w-1/2 md:w-3/12 lg:w-80 h-96 lg:h-auto bg-white px-2 py-4 lg:p-8 rounded-3xl hover:bg-green-100 duration-300">
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(2)->slug }}&">
                        <div class="h-52 w-52 md:h-40 md:w-40 lg:h-60 lg:w-60 mx-auto rounded-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url('/images/thumbnails/nature-bundle-small.jpg')">
                        </div>
                        <div class="text-center text-xl lg:text-2xl text-gray-800 font-mono py-5">Buy <br> a parcel of trees</div>
                        <div class="text-center text-base lg:text-lg text-gray-700">Our best bundle offers<br>From 800€ to 75K€</div>
                    </a>
                </div>
                <div class="w-3/4 sm:w-1/2 md:w-3/12 lg:w-80 h-96 lg:h-auto bg-white px-2 py-4 lg:p-8 rounded-3xl hover:bg-green-100 duration-300">
                    <a href="{{app()->getLocale()}}/posts/?type={{ App\Models\Type::find(3)->slug }}&">
                        <div class="h-52 w-52 md:h-40 md:w-40 lg:h-60 lg:w-60 mx-auto rounded-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url('/images/thumbnails/bercé-forest-oak-pack-small.jpg')">
                        </div>
                        <div class="text-center text-xl lg:text-2xl text-gray-800 font-mono py-5">Invest <br> on a large scale</div>
                        <div class="text-center text-base lg:text-lg text-gray-700">Patrimonial Investments<br>From 75K€</div>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center w-full py-4 lg:py-10 mx-auto pb-8">
                <button class="group bg-green-600 rounded-full px-5 py-2 w-48 hover:bg-green-200 duration-300">
                    <a href="{{url(app()->getLocale())}}/posts/" class="text-xl text-white group-hover:text-gray-700 duration-300">See all offers</a>
                </button>
            </div>
            <div class="flex justify-end p-5">
                <a href="#top" class="scrollLink bg-black bg-opacity-20 rounded px-2">
                    <p class="text-xl text-white hover:underline">&#8593; Top</p>
                </a>
            </div>
        </div>

        <div class="bg-gray-300" id="learn-more">
            <div class="px-10 py-12 md:py-20 space-y-8 md:space-y-10">
                <h3 class="text-xl font-medium text-center text-white font-mono mx-auto w-full uppercase">What we believe in</h3>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-medium text-center text-green-600 font-mono uppercase mx-auto w-full lg:w-1/3">Why protect
                        our biodiversity ?</h3>
                    <div class="text-xl sm:text-2xl text-gray-600 pt-4 text-center font-mono">Let's act for climate change</div>
                </div>
                <div class="border-b-4 border-yellow-300 w-32 mx-auto"></div>
                <p class="text-lg sm:text-xl text-center leading-8 sm:leading-10 max-w-5xl mx-auto text-gray-600 pt-10">
                    <strong class="text-xl sm:text-2xl">80%</strong> of the world's original forests have been destroyed. We're
                    physically putting
                    them back. As well as growing forests, for every tree we cut in them, we plant three more.
                    <strong class="text-xl sm:text-2xl">21%</strong> of greenhouse gas emissions comes from producing plastic, steel, &
                    cement.
                    We reduce this with high-quality sustainable timber.
                </p>
                <h4 class="text-xl sm:text-2xl uppercase font-medium text-green-600 text-center font-mono">There are serious threats facing the
                    world's
                    forests today.</h4>
                <p class="text-lg sm:text-xl text-center leading-8 sm:leading-10 max-w-5xl mx-auto text-gray-600">
                    <strong class="text-xl sm:text-2xl">11%</strong> of the global greenhouse emissions driving climate change are from
                    deforestation. Our verified carbon capture calculations show the work our trees are doing to reduce
                    that.
                    <strong class="text-xl sm:text-2xl">60%</strong> of the planet's land-living animals have been wiped out since
                    1970. Forests
                    are home to 80% of those left. So we're creating vital homes for biodiversity.
                </p>
                <h3 class="text-2xl sm:text-3xl text-center text-white font-mono uppercase">Where to start ?</h3>
                <p class="text-lg sm:text-xl text-center leading-8 sm:leading-10 max-w-5xl mx-auto text-gray-600">
                    <strong class="text-lg uppercase text-green-600">Choose your tree :</strong> buy your tree at
                    our online
                    treeShop and create a personal space
                    to follow it from. <br>
                    <strong class="text-lg uppercase text-green-600">Love your tree :</strong> over your tree’s
                    long life,
                    you
                    can visit it,
                    introduce it to your family and track its growth and value. <br>
                    <strong class="text-lg uppercase text-green-600">Harvest</strong> the value of your
                    trees We'll eventually cut your tree for sustainable timber - a vital resource. 100% of the profit
                    goes to you!
                </p>
            </div>
            <div class="flex justify-end p-5">
                <a href="#top" class="scrollLink bg-black bg-opacity-20 rounded px-2">
                    <p class="text-xl text-white hover:underline">&#8593; Top</p>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="">
        <div class="text-on-image px-4 py-4 text-white w-full bg-no-repeat bg-cover"
            style="background-image: url('/images/full-size/forest-banner2.jpg')">
            <h2 class="text-4xl font-bold leading-10 p-20 pt-20 leading-12">Be part of our ecological journey</h2>

            <h4 class="font-medium text-2xl pl-20 pb-80 leading-10">We buy and nurture forests and land to convert to
                sustainable forests. <br>
                Our foresters look after your trees, while you check in on them via our website.</h4>
            <div class="flex justify-end p-5">
                <a href="#top" class="scrollLink bg-black bg-opacity-20 rounded px-2">
                    <p class="text-xl text-white hover:underline">&#8593; Top</p>
                </a>
            </div>
        </div>
    </div> --}}

    <script>
        $(document).ready(function() {
            $("a.scrollLink").click(function(event) {
                event.preventDefault();
                $("html, body").animate({
                    scrollTop: $($(this).attr("href")).offset().top
                }, 500);
            });
        });
    </script>

@endsection
