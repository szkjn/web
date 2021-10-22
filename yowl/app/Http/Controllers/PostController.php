<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Scraper;
use Illuminate\Support\Carbon;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin',['except' =>['indexApi','show','destroy','getById','getByUserId','store',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        return Post::orderBy('votes', 'DESC')->get();
    }

    public function index()
    {
        return view('posts.index');
    }

    public function getById($id)
    {
        return Post::find($id);
    }

    public function getByUserId()
    {
        return Post::all()->where('user_id', 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $newPost = new Post;
        $pathToImage = time().'-'.$request->title.'-'.$request->imageName;
        $request->image->move('images', $pathToImage);
        
        
        $newPost->user_id = $request->user_id;
        $newPost->category_id = $request->category_id;
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->votes = $request->votes;
        $newPost->url = $request->url;
        
        

        if ($request->url) {
            // $newPost->url = scrape($request->toto['url']);
            // $newScraper = new Scraper;
            // $url = $newScraper->scrape($request->toto['url']);
            // $path = '../../public/images/';


           //  $newPost->picture = $path;
        } else {
            $newPost->picture = $pathToImage;
        }

        $newPost->save();

        return $newPost;

        // return view('posts.store')->with($newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::where('category_id', '=' , $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingPost = Post::find($id);

        if ($existingPost) {
            $existingPost->votes = $request->post['votes'];
            $existingPost->save();
            return $existingPost;
        }
        return "Post not found.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();
    }
}
