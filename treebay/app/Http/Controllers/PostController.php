<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
Use App;

use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Type;


class PostController extends Controller
{
    protected $orderQuery;

    public function index()
    {
        $this->setOrder();
        $posts = $this->orderQuery;

        // $posts = Post::latest('created_at');
        $categories = Category::all();
        $types = Type::all();
        $locations = ['North', 'Center', 'West', 'East', 'South West', 'Sourth East'];
        $locale = App::getLocale();

        return view('posts', [
            'posts' => $posts->filter(request(['search', 'category', 'type', 'author', 'location']))->paginate(6)->withQueryString(),
            'categories' => $categories,
            'types' => $types,
            'locations' => $locations,
            'locale' => $locale,
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'currentType' => Type::firstWhere('slug', request('type')),
            'currentLocation' => Post::firstWhere('location', request('location')),
        ]);
    }

    public function show(Post $post)
    {
        // dd($post);
        return view('post', [
            'post' => $post
        ]);
    }

    public function displayPost()
    {
        $disPost = Post::all();
        return view('admin/adminPost', ['disPost' => $disPost]);
    }

    public function edit(Request $request){
        $this->authorize('edit', Post::class);
        if($request->input('edit')){
            $id = $request->input('edit');
            $editPost = Post::where('id', $id)->get();
        }else if($request->input('submit_multiple_edit')){
            $multiPostId = $request->get('multiple_edit_post');
            $editPost = Post::whereIn('id', $multiPostId)->get();    
        } 
            $disCat = Category::all();
            return view("/pages/editPost", compact('editPost', 'disCat'));
    }


    public function update(Request $request)
    {

        // $input = $request->input();
        // $rules = [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'is_admin' => 'required|boolean'
        // ];
        // $messages = [
        //     'name.required' => 'name requireeeed',
        //     'is_admin.required' => 'admin field must be filled !!!!!!!!'
        // ];

 

        // $validator = Validator::make($input, $rules, $messages);

 

        // if ($validator->fails()) {
        //     // dd($validator);
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $this->authorize('update', Post::class);
        $validatedData = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'picture' => 'required',
            'location' => 'required',
            'category_id' => 'required'
        ]);

        if($request->input('submit_update_post')){
            $id = $request->input('updatePost');
          
            
            Post::where('id', $id)->update($validatedData);
        }else if($request->input('submit_multi_update')){
           
           
            for($i=0; $i<count($request->input('title')); $i++){
                  
                $updateName = $request->input('title')[$i];
                $multiId = $request->input('multi_update')[$i];
                $updatePrice = $request->input('price')[$i];
                $updateDescription = $request->input('description')[$i];
                $updatePicture = $request->input('picture')[$i];
                $updateLocation = $request->input('location')[$i];
                $updateCategory = $request->input('choice_category')[$i];
                
                Post::where('id', $multiId)->update(array('title' => $updateName));
                Post::where('id', $multiId)->update(array('price' => $updatePrice));
                Post::where('id', $multiId)->update(array('description' => $updateDescription));
                Post::where('id', $multiId)->update(array('picture' => $updatePicture));
                Post::where('id', $multiId)->update(array('location' => $updateLocation));
                Post::where('id', $multiId)->update(array('category_id' => $updateCategory));
            }
        }

        return view('/pages/home')->with('sucess', 'Post update');
    }

    public function create(Request $request){
        $request->input('create_post');
        $post = new Post;
        if($post->surface_area >0 && $post->surface_area <= 5){
            $post->type_id = 2;
        }else if($post->surface_area < 5){
            $post->type_id = 3;
        }else{
            $post->type_id = 1;
        }
        
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->description = $request->input('description');
        $post->user_id = Auth::user()->id;
        $post->author = Auth::user()->name;
        $post->location = $request->get('loc');
        $post->surface_area = $request->input('area');
        $post->lang = $request->input('lang');
        $fileName = $post->title. '.' . $request->file('avatar')->extension();
        $post->picture = '/storage/'.$request->file('avatar')->storeAs('postImg', $fileName);
        $post->category_id = $request->input('choice_category');
        $post->save();

        // $post
        $image = Image::make(public_path("$post->picture"))->fit(500, 220);
        $image->save();
        
        return view('pages/home'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteId = $request->input('deletePost');
        $post = Post::where('id', $deleteId)->get();
        // foreach($post as $post){
        //     $imagePath = $post->picture;
        // }
        // Storage::delete($imagePath); 
        Post::where('id', $deleteId)->delete();
      
        return view('pages/home')->with('sucess', 'Post delete');
    }

    public function setOrder() {
        if (request(['order'][0]) == 'oldest') {
            $this->orderQuery = Post::orderBy('created_at', 'asc');
            return $this->orderQuery;
        } elseif (request(['order'][0]) == 'price-asc') {
            $this->orderQuery = Post::orderBy('price', 'asc');
            return $this->orderQuery;
        } elseif (request(['order'][0]) == 'price-desc') {
            $this->orderQuery = Post::orderBy('price', 'desc');
            return $this->orderQuery;
        } else {
            $this->orderQuery = Post::orderBy('created_at', 'desc');
            return $this->orderQuery;
        }
    }

    
  

}
