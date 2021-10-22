@can('edit', Auth::user())
@extends('app')

@section('admin_content')


    <body class="h-screen bg-gray-700">

        <div {{-- id="admin-content" --}} class="pt-24 pb-2 flex justify-center">
            <div class="{{-- title-admin --}} flex w-2/3 justify-start">
                <p class="text-gray-200 font-mono uppercase text-3xl">
                    Admin
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                    connected
                </p>
            </div>
        </div>

        <!-- Here is where the main content starts -->
        <div class="w-10/12 mx-auto my-8 p-8">

            <!-- Filter area to sort the results by values -->
            <section id="{{-- management --}}">
                <div class="{{-- menu-buttons --}} flex w-full items-center justify-between">
                    <div>
                        <a href="{{ route('admin_user', app()->getLocale()) }}">
                            <input type="text" name="displaying_user" value="Show users" readonly
                                class="button-showUser text-center font-mono uppercase text-xl px-2">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('add_post', app()->getLocale()) }}"><input type="text" name="add_post" value="Add Post" readonly
                            class="button-showCategory text-center font-mono uppercase text-xl px-2"></a>
                    </div>
                    <div>
                        <a href="{{ route('display_category', app()->getLocale()) }}">
                            <input type="text" name="displaying_category" value="Show categories" readonly
                                class="button-showProduct text-center font-mono uppercase text-xl px-2">
                        </a>
                    </div>
                    <div>
                        @yield('button_add_post')
                        @yield('button_add_category')
                        @yield('button_mutiple_edit_user')
                    </div>
                </div>
            </section>

            <section id="displaying_data"></section>
        </div>
    @endsection

@endcan
