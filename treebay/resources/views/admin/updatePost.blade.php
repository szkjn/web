@extends('admin/layoutAdmin')

@section('update_post')

@if ($editPost->count() == 1)
    <table>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Edit User</th>
            <th>Delete User</th>
        </tr>
        
        @foreach ($editPost as $post) 
   
        <form action=" {{ route('update_post', app()->getLocale())}}" method="POST">
            @csrf
            <td><input type="text" name="title" value="{{ $post->title }}" required></td>
            <td><input type="text" name="price" value="{{ $post->price }}" required></td>
            <td><input type="text" name="description" value="{{ $post->description }}" required></td>
            <td><input type="text" name="picture" value="{{ $post->picture }}" required></td>
            <td><input type="submit" name="update_post" value="VALIDATE" class="button-addProduct-small">
                <input type='hidden' name="updatePost" value="{{ $post->id }}"></td>
        </form>
        <form action="{{ route('delete_post', app()->getLocale())}}" method="POST">
            @csrf
            <td><input type="submit" name="delete_post" value="" class="trash">
                <input type='hidden' name="deletePost" value="{{ $post->id }}"></td>
        </form>
    </tr>  
  
    @endforeach
    </table>

@elseif ($editPost->count() > 1)
    <table>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
        <th>Picture</th>
        <th>Delete User</th>
    </tr>

    @foreach ($editPost as $post) 
   
   
        <td><input type="text" form="update_multi_post" name="title[]" value="{{ $post->title }}" required></td>
        <td><input type="text" form="update_multi_post" name="price[]" value="{{ $post->price }}" required></td>
        <td><input type="text" form="update_multi_post" name="description[]" value="{{ $post->description }}" required></td>
        <td><input type="text" form="update_multi_post" name="picture[]" value="{{ $post->picture }}" required></td>
        {{-- input contain multi value --}}
        <input type='hidden' form="update_multi_post" name="multi_update[]" value="{{ $post->id }}">

    <form action="{{ route('delete_post', app()->getLocale())}}" method="POST">
        @csrf
        <td><input type="submit" name="delete_post" value="" class="trash">
            <input type='hidden' name="deletePost" value="{{ $post->id }}"></td>
    </form>
</tr>  
@endforeach
</table>

<form action=" {{ route('update_post', app()->getLocale())}}" method="POST" enctype="multipart/form-data" id="update_multi_post">
    @csrf
    <td><input type="submit"  name="submit_multi_post" value="VALIDATE" class="button-addProduct-small"></td>
</form>

@endif

@endsection