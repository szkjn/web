@can('edit', Auth::user())
@extends('admin/layoutAdmin')

@section('button_mutiple_edit_user')
    
        <input type="submit" form="multiple_edit_user_form" name="submit_multiple_edit" value="Edit multiple Users" readonly
        class="button-showProduct text-center font-mono uppercase text-xl px-2">

@endsection

@section('display_user')

    <table class="w-10/12 mx-auto">

            <th class="w-1/12"></th>
            <th class="w-1/12">Id</th> 
            <th class="w-2/12">Name</th>
            <th class="w-2/12">Email</th>
            <th class="w-2/12">Password</th>
            <th class="w-1/12">Admin</th>
            <th class="w-1/12">Edit User</th>
            <th class="w-1/12">Delete User</th>
        </tr>
        @isset($displayUser)
            @foreach ($displayUser as $val)
                <td><input type="checkbox" name="multiple_edit_user[]"  value ="{{ $val->id }}" form="multiple_edit_user_form"></td>
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->password }}</td>
                    <td>{{ $val->is_admin }}</td>

                    <form action="{{ route('edit_user', app()->getLocale()) }}" method="POST">
                        @csrf
                        <td><input type="submit" name="edit_user" value="" class="edit">
                        <input type='hidden' name="edit" value="{{ $val->id }}"></td>
                    </form>
                    <form action="{{ route('delete_user', app()->getLocale())}}" method="POST">
                        @csrf
                        <td><input type="submit" name="delete_user" value="" class="trash">
                            <input type='hidden' name="delete" value="{{ $val->id }}"></td>
                    </form>
                </tr>  
            @endforeach
        @endisset
    </table>
    <form action="{{ route('edit_user', app()->getLocale()) }}" method="POST" id="multiple_edit_user_form" enctype="multipart/form-data">
        @csrf
    </form>
@endsection
@endcan