<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model
{
    use HasFactory;

    public function searchResults($request){

        $search = $request->search;

        if(empty($search)){

            $results = Post::orderBy('created_at', 'desc')->paginate(10); 
        }
        else
        { 
            $searchedCat = $request->category;
            $maxPrice = $request->maxprice;
            $minPrice = $request->minprice;
    
            if($searchedCat == "All categories" && empty($minPrice) && empty($maxPrice)){

                    $results = Post::where('title','like','%'.$search.'%')->orderBy('created_at', 'desc')->paginate(10); 

            }elseif((!empty($minPrice) || !empty($maxPrice)) && $searchedCat == "All categories"){

                    $results = $this-> searchByPrice($minPrice,$maxPrice,$search);
               
            }elseif((!empty($minPrice) || !empty($maxPrice)) && $searchedCat !== "All categories"){

               $results = $this-> searchByCategoryAndPrice($minPrice,$maxPrice,$searchedCat,$search);
                
            }elseif($searchedCat !== "All categories" && empty($minPrice) && empty($maxPrice)){

                $results = $this->searchByCategory($search,$searchedCat);
                
            }
        }
        
        return $results;
        
    }


    public function searchByCategory($search,$searchedCat){

        $posts = Post::where([['title','like','%'.$search.'%'],['category_id',$searchedCat]])->orderBy('created_at', 'desc')->paginate(10); 

             return $posts;
    }


    public function searchByPrice($minPrice,$maxPrice,$search){

        if(!empty($minPrice) && empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->where([['title','like','%'.$search.'%'],['price', ">=" ,$minPrice,]])
            ->orderBy('created_at','desc')
            ->paginate(10);

        }elseif(empty($minPrice) && !empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->where([['title','like','%'.$search.'%'],['price', "<=" ,$maxPrice,]])
            ->orderBy('created_at','desc')
            ->paginate(10);

        }elseif(!empty($minPrice) && !empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->whereBetween('price',[$minPrice,$maxPrice])
            ->where('title','like','%'.$search.'%')
            ->orderBy('created_at','desc')
            ->paginate(10);
        }

        return $posts;

    }


    public function searchByCategoryAndPrice($minPrice,$maxPrice,$searchedCat,$search){

        if(!empty($minPrice) && empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->where([['title','like','%'.$search.'%'],['price', ">=" ,$minPrice],['category_id',$searchedCat]])
            ->orderBy('created_at','desc')
            ->paginate(10);

        }elseif(empty($minPrice) && !empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->where([['title','like','%'.$search.'%'],['price', "<=" ,$maxPrice],['category_id',$searchedCat]])
            ->orderBy('created_at','desc')
            ->paginate(10);

        }elseif(!empty($minPrice) && !empty($maxPrice)){

            $posts = DB::table('ads')
            ->select('*')
            ->whereBetween('price',[$minPrice,$maxPrice])
            ->where([['title','like','%'.$search.'%'],['category_id',$searchedCat]])
            ->orderBy('created_at','desc')
            ->paginate(10);

        }

       
        return $posts;

    }

}
