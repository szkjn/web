@extends('app')

@section('edit_post')

  <div class="pt-24 pb-2 flex justify-center">
    <div class="flex w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 justify-start">
      <p class="font-mono uppercase text-3xl">
        {{__('Edit your Ad')}}
      </p>
    </div>
  </div>


     
  
   
{{--   
  <form action="{{ route('delete_post')}}" method="POST">
      @csrf
      <td><input type="submit" name="delete_post" value="" class="trash">
          <input type='hidden' name="deletePost" value="{{ $post->id }}"></td>
  </form> --}}
 

@if ($editPost->count() == 1)
  @foreach ($editPost as $post) 
  
  <div class="flex justify-center">
    <form action=" {{ route('update_post', app()->getLocale())}}" method="POST" enctype="multipart/form-data"
      class="flex flex-col space-y-8 w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 mb-12 px-8 border-4 border-gray-700 rounded">
      @csrf
      <div class="flex flex-col">
        <label for="titleAdd" class="text-xl">{{__('Titre')}}</label>
        <input type="text" id="titleAdd" name="title" value="{{ $post->title }}" placeholder="Red Oak"
          class="pl-2 border-2 border-gray-300 rounded h-8 text-lg" required>
      </div>
      <div class="flex flex-col">
        <label for="priceAdd" class="text-xl">{{__('Price')}}</label>
        <input type="text" id="priceAdd" name="price" placeholder="€" value="{{ $post->price }}" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg" required>
      </div>
      <div class="flex flex-col">
        <label for="areaAdd" class="text-xl">{{__('Surface Area')}}</label>
        <input type="text" id="areaAdd" name="area" placeholder="Ha" value="{{ $post->surface_area }}" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg" required>
      </div>
      <div class="flex flex-col">
        <label for="descriptionAdd" class="text-xl">{{__('Description')}}</label>
        <textarea type="text" id="descriptionAdd" name="description"
          class="pl-2 border-2 border-gray-300 rounded" required>{{ $post->description }}</textarea>
      </div>
      
      <div class="flex flex-col">
        <label for="locationAdd" class="text-xl">{{__('Location')}}</label>
        <input type="text" id="locationAdd" name="location" placeholder="" value="{{ $post->location }}" required>
      </div>
      
     

      <div class="flex items-center justify-start space-x-4">
        <input type="text" name="picture" value="{{ $post->picture }}" class="test-lg">
        {{-- <label for="avatar" class="text-xl">Upload a picture :</label>
        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"
          class="text-lg"> --}}
      </div>

      <div class="flex flex-col">
          @foreach($disCat as $category)
          <div class="flex items-center justify-start space-x-2">
            <input type="radio" id="catAdd" name="choice_category" value="{{$category->id}}">
            <label for="catAdd" class="text-xl">{{$category->name}}</label>
          </div>
          @endforeach
      </div>

      <div class="pb-8">
        <input type="submit" name="submit_update_post" value="VALIDATE"
        class="h-12 w-full border-2 border-green-300 rounded-xl bg-white text-xl text-green-400 font-mono font-semibold
        hover:bg-green-300 hover:text-white hover:border-0 cursor-pointer duration-300">
        <input type='hidden' name="updatePost" value="{{ $post->id }}">
      </div>
    </form>
  </div>
  @endforeach




{{-- Multi ads --}}

@elseif ($editPost->count() > 1)

  @foreach ($editPost as $post) 

  <div class="flex justify-center">
    <div class="flex flex-col space-y-8 w-1/3 mb-12 px-8 border-4 border-gray-700 rounded">
      <div class="flex flex-col">
        <label for="titleAdd" class="text-xl">Title</label>
        <input type="text" id="titleAdd" form="update_multi_post" name="title[]" value="{{ $post->title }}" placeholder="Red Oak"
          class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="priceAdd" class="text-xl">Price</label>
        <input type="text" id="priceAdd" form="update_multi_post" name="price[]" placeholder="€" value="{{ $post->price }}" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="areaAdd" class="text-xl">Surface Area</label>
        <input type="text" id="areaAdd"  form="update_multi_post" name="area[]" placeholder="Ha" value="{{ $post->surface_area }}" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="descriptionAdd" class="text-xl">Description</label>
        <textarea type="text" id="descriptionAdd" form="update_multi_post" name="description[]"
          class="pl-2 border-2 border-gray-300 rounded">{{ $post->description }}</textarea>
      </div>
      
      <div class="flex flex-col">
        <label for="locationAdd" class="text-xl">Location</label>
        <input type="text" id="locationAdd" name="location[]" placeholder="" value="{{ $post->location }}">
      </div>

      <div class="flex items-center justify-start space-x-4">
        <input type="text" form="update_multi_post" name="picture[]" value="{{ $post->picture }}" class="test-lg">
        {{-- <label for="avatar" class="text-xl">Upload a picture :</label>
        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"
          class="text-lg"> --}}
      </div>

      <div class="flex flex-col">
          @foreach($disCat as $category)
          <div class="flex items-center justify-start space-x-2">
            <input type="radio" id="catAdd" name="choice_category[]" value="{{$category->id}}">
            <label for="catAdd" class="text-xl">{{$category->name}}</label>
          </div>
          @endforeach
      </div>
      <input type='hidden' form="update_multi_post" name="multi_update[]" value="{{ $post->id }}">
    </div>
  </div>
  
  @endforeach
  
    <form action=" {{ route('update_post', app()->getLocale())}}" method="POST" enctype="multipart/form-data" id="update_multi_post">
      @csrf
        <div class="pb-8">
          <input type="submit" name="submit_multi_update" value="VALIDATE"
          class="h-12 w-full border-2 border-green-300 rounded-xl bg-white text-xl text-green-400 font-mono font-semibold
          hover:bg-green-300 hover:text-white hover:border-0 cursor-pointer duration-300">
        </div>
    </form>

@endif
   
@endsection