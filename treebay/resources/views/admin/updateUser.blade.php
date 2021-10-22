@can('edit', Auth::user())
@extends('admin/layoutAdmin')

@section('update_user')

@if ($user->count() == 1)
<table>
    <th>Name</th>
    <th>Email</th>
    <th>Admin</th>
    <th>Validate</th>
    <th>Delete User</th>
</tr>
    @foreach ($user as $user) 
   
        <form action=" {{ route('update_user', app()->getLocale())}}" method="POST">
            @csrf
            <td>
                <input type="text" name="name" value="{{ $user->name }}" required>
                @error('name')
                    <p class="text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </td>
            <td>
                <input type="text" name="email" value="{{ $user->email }}" required>
                @error('email')
                    <p class="text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </td>
            <td>
                <input type="text" name="is_admin" value="{{ $user->is_admin }}" required>
                @error('is_admin')
                    <p class="text-red-500 font-medium">{{ $message }}</p>
                @enderror
            </td>
            <td><input type="submit" name="update_user" value="VALIDATE" class="button-addProduct-small">
                <input type='hidden' name="update" value="{{ $user->id }}"></td>
        </form>
        <form action="{{ route('delete_user', app()->getLocale())}}" method="POST">
            @csrf
            <td><input type="submit" name="delete_user" value="" class="trash">
                <input type='hidden' name="delete" value="{{ $user->id }}"></td>
        </form>
    </tr>  
  
    @endforeach
</table>

@elseif ($user->count() > 1)
<table>
    <th>Name</th>
    <th>Email</th>
    <th>Admin</th>
    <th>Delete User</th>
</tr>
    @foreach ($user as $user) 
    
        <td><input type="text" form="update_multi_user" name="name[]" value="{{ $user->name }}" required></td>
        <td><input type="text" form="update_multi_user"name="email[]" value="{{ $user->email }}" required></td>
        <td><input type="text" form="update_multi_user" name="is_admin[]" value="{{ $user->is_admin }}" required></td>
        {{-- input contain multi value --}}
        <input type='hidden' form="update_multi_user" name="multi_update[]" value="{{ $user->id }}">
    

    <form action="{{ route('delete_user', app()->getLocale())}}" method="POST">
        @csrf
        <td><input type="submit" name="delete_user" value="" class="trash">
            <input type='hidden' name="delete" value="{{ $user->id }}"></td>
    </form>
    </tr>  
    @endforeach
    <form action=" {{ route('update_user', app()->getLocale())}}" method="POST" enctype="multipart/form-data" id="update_multi_user">
        @csrf
        <td><input type="submit"  name="submit_multi_user" value="VALIDATE" class="button-addProduct-small"></td>
    </form>
    
</table>
@endif
@endsection
@endcan