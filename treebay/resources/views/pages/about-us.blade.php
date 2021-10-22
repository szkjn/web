@extends('app')

@section('title', 'About | ' . config('app.name'))

@section('content')

    <div class="h-16">hello</div>

    <div class="bg-blue-200 pt-12">
        <div class="px-10 py-12 md:py-20 space-y-10">
            <div>
                <h3
                    class="text-2xl sm:text-3xl font-medium text-center text-white font-mono uppercase mx-auto w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                    Who are we ?
                </h3>
                <div class="text-xl sm:text-2xl text-gray-600 pt-4 font-mono text-center">Our philosophy</div>
            </div>
            <div class="border-b-4 border-yellow-300 w-32 mx-auto"></div>
            <p
                class="text-lg sm:text-xl text-center leading-8 max-w-5xl mx-auto md:pt-4 text-gray-600 text-justify w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                We're foresters who love life in the forest and nature is at the heart of what we do.
                But our secret power comes from our mission to bring everyone with us into the forest.
                Because the future needs a balance between the needs of human beings and the needs of nature.
                People need resources like they need wild forests. And with our model, we can ensure both. <br>
            </p>
            <h3
                class="text-2xl sm:text-3xl font-medium text-center text-white font-mono uppercase mx-auto w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                Our roots</h3>
            <p
                class="text-lg sm:text-xl text-center leading-8 max-w-5xl mx-auto text-gray-600 w-1/3 text-justify w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, cupiditate illo. Voluptatem, sequi ipsa
                saepe quia
                perferendis odit, harum ratione impedit architecto rem omnis amet suscipit quibusdam debitis! Rerum id
                consectetur
                perferendis sed ad sint ratione culpa reprehenderit nulla maxime, velit praesentium explicabo, quidem
                voluptatibus
                magni delectus? Ipsam provident sunt soluta sit ducimus nisi velit voluptas sed dolorum commodi. Sint
                molestias quae
                adipisci sunt iste!.
            </p>
        </div>
        <div class="flex justify-end p-5">
            <a href="#top" class="scrollLink bg-black bg-opacity-20 rounded px-2">
                <p class="text-xl text-white hover:underline">&#8593; Top</p>
            </a>
        </div>
    </div>



@endsection
