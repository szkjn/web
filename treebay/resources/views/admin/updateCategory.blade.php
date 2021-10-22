@can('edit', Auth::user())
@extends('admin/layoutAdmin')


@section('update_category')

    <table>
            <th>Name</th>
            <th>Update Category</th>
            <th>Delete Category</th>
        </tr>
       
        @foreach ($category as $category) 
   
        <form action=" {{ route('update_category', app()->getLocale())}}" method="POST">
            @csrf
            <td>
                <input type="text" name="name" value="{{ $category->name }}" required></td>
                @error('name')
                <p class="text-red-500 font-medium">{{ $message }}</p>
                @enderror
            <td><input type="submit" name="update_category" value="VALIDATE" class="button-addProduct-small">
                <input type='hidden' name="update" value="{{ $category->id }}"></td>
        </form>
        <form action="{{ route('delete_category', app()->getLocale())}}" method="POST">
            @csrf
            <td><input type="submit" name="delete_category" value="" class="trash">
                <input type='hidden' name="delete" value="{{ $category->id }}"></td>
        </form>
    </tr>  
  
    @endforeach
</table>
@endsection
@endcan