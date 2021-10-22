<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Location;
use App\Models\Search;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $categories = Category::All();
        $search = new Search();
        $posts = $search->searchResults($request);
         return $posts;
    }

}
