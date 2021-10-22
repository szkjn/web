@extends('app')

@section('add_post')

  <div class="pt-24 pb-2 flex justify-center">
    <div class="flex w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 justify-start">
      <p class="font-mono uppercase text-3xl">
        {{__('Post your Ad')}}
      </p>
    </div>
  </div>

  <div class="flex justify-center">
    <form action=" {{ route('create_post', app()->getLocale())}}" method="POST" enctype="multipart/form-data" 
      class="flex flex-col space-y-8 w-11/12 sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 mb-12 px-8 border-4 border-gray-700 rounded">
      <input type="hidden" name="lang" value="{{App::getLocale()}}">
      @csrf
      <div class="flex flex-col">
        <label for="titleAdd" class="text-xl">{{__('Title')}}</label>
        <input type="text" id="titleAdd" name="title" value="" placeholder="Red Oak"
          class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="priceAdd" class="text-xl">{{__('Price')}}</label>
        <input type="text" id="priceAdd" name="price" placeholder="€" value="" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="areaAdd" class="text-xl">{{__('Surface Area')}}</label>
        <input type="text" id="areaAdd" name="area" placeholder="Ha" value="" 
        class="pl-2 border-2 border-gray-300 rounded h-8 text-lg">
      </div>
      <div class="flex flex-col">
        <label for="descriptionAdd" class="text-xl">{{__('Description')}}</label>
        <textarea type="text" id="descriptionAdd" name="description" value="" rows="4" cols="10"
          class="pl-2 border-2 border-gray-300 rounded"></textarea>
      </div>
      
  
      <div class="flex flex-col bg-gray-300">
        <select name="loc" id="" class="h-8 border-2 border-gray-300 rounded bg-white hover:bg-gray-100">
          <option value="" class="h-8" disabled selected>{{__('Location')}}</option>
          @foreach ($location as $loc)
            <option value="{{ $loc }}" class="h-8">{{ $loc }}</option>
          @endforeach
        </select>
      </div>

      <div class="flex items-center justify-start space-x-4">
        <label for="avatar" class="text-xl">{{__('Upload a picture')}}:</label>
        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg"
          class="text-lg">
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
        <input type="submit" name="create_post" value="POST" 
        class="h-12 w-full border-2 border-green-300 rounded-xl bg-white text-xl text-green-400 font-mono font-semibold
        hover:bg-green-300 hover:text-white hover:border-0 cursor-pointer duration-300">
      </div>

    </form>
  </div>
   
@endsection