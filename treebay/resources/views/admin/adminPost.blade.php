@extends('admin/layoutAdmin')

@section('button_add_post')

    <a href="{{ route('add_post', app()->getLocale()) }}"><input type="text" name="add_post" value="Add Post" readonly
            class="button-showCategory text-center font-mono uppercase text-xl px-2"></a>
@endsection

@section('button_mutiple_edit_user')
    <input type="submit" form="multiple_edit_post_form" name="submit_multiple_edit" value="Edit multiple ads"
        class="button-showProduct">

@endsection


@section('display_post')

    <table class="w-10/12 mx-auto filter drop-shadow-2xl py-8 mb-16 ">
        <tr>
            <th class="w-2/12">Title</th>
            <th class="w-1/12">Price</th>
            <th>Description</th>
            <th>Picture</th>
            <th class="w-1/12">Edit</th>
            <th class="w-1/12">Delete</th>
        </tr>
        @isset($disPost)
            @foreach ($disPost as $val)
                <td><input type="checkbox" name="multiple_edit_post[]" value="{{ $val->id }}"
                        form="multiple_edit_post_form"></td>
                <td>{{ $val->id }}</td>
                <td>{{ $val->title }}</td>
                <td>{{ $val->price }}</td>
                <td>{{ $val->description }}</td>
                <td>{{ $val->picture }}</td>

                <form action="{{ route('edit_post', app()->getLocale()) }}" method="POST">
                    @csrf
                    <td><input type="submit" name="edit_post" value="" class="edit">
                        <input type='hidden' name="edit" value="{{ $val->id }}">
                    </td>
                </form>
                <form action="{{ route('delete_post', app()->getLocale()) }}" method="POST">
                    @csrf
                    <td><input type="submit" name="delete_post" value="" class="trash">
                        <input type='hidden' name="deletePost" value="{{ $val->id }}">
                    </td>
                </form>
                </tr>
            @endforeach
        @endisset
    </table>
    <form action="{{ route('edit_post', app()->getLocale()) }}" method="POST" id="multiple_edit_post_form" enctype="multipart/form-data">
        @csrf
    </form>
@endsection
