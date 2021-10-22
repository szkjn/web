@extends('admin/layoutAdmin')


@section('add_category')

    <table>
            <th>Name</th>
            <th>Slug</th>
            <th>Add Category</th>

        </tr>
   
        <form action=" {{ route('function_add_category', app()->getLocale())}}" method="POST">
            @csrf
            <td><input type="text" name="name" value=""></td>
            <td><input type="text" name="slug" value=""></td>
            <td><input type="submit" name="add_category" value="VALIDATE" class="button-addProduct-small">
                {{-- <input type='hidden' name="add" value="{{ $category->id }}"; ?></td> --}}
        </form>
      
    </tr>  

</table>
@endsection