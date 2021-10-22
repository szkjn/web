@can('edit', Auth::user())
@extends('admin/layoutAdmin')

@section('button_add_category')

<a href="{{ route('add_category', app()->getLocale()) }}"><input type="text" name="add_category" value="Add Category" readonly
    class="button-showCategory text-center font-mono uppercase text-xl px-2"></a>

@endsection


@section('display_category')

    <table>
            <th>Id</th> 
            <th>Name</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Update At</th>
            <th>Edit Category</th>
            <th>Delete Category</th>
        </tr>
        @isset($displayCat)
            @foreach ($displayCat as $val)
                
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->slug }}</td>
                    <td>{{ $val->created_at }}</td>
                    <td>{{ $val->update_at }}</td>

                    <form action="{{ route('edit_category', app()->getLocale()) }}" method="POST">
                        @csrf
                        <td><input type="submit" name="edit_category" value="" class="edit">
                        <input type='hidden' name="edit" value="{{ $val->id }}"></td>
                    </form>
                    <form action="{{ route('delete_category', app()->getLocale())}}" method="POST">
                        @csrf
                        <td><input type="submit" name="delete_category" value="" class="trash">
                            <input type='hidden' name="delete" value="{{ $val->id }}"></td>
                    </form>
                </tr>  
            @endforeach
        @endisset
    </table>
@endsection
@endcan