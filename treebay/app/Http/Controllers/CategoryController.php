<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->input('create_category');
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        // $category = slug;
        $category->save();

        $displayCat = Category::all();
        return view('/admin/adminCategory', ['displayCat' => $displayCat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $displayCat = Category::all();
        return view('/admin/adminCategory', [
            'displayCat' => $displayCat,
            // ->withCategory(Category::findOrFail($id))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('edit');
        $category = Category::where('id', $id)->get();
        return view("/admin/updateCategory", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // $input = $request->input();
        // $rules = [
        //     'name' => 'required',
        // ];
        // $messages = [
        //     'name.required' => 'name requireeeed',
        // ];

        // $validator = Validator::make($input, $rules, $messages);

        // if ($validator->fails()) {
        //     // dd($validator);
        //     // return redirect()->back()->withErrors($validator)->withInput();
        // }

        $id = $request->input('update');
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Category::where('id', $id)->update($validatedData);
        $displayCat = Category::all();
        return view('/admin/adminCategory', ['displayCat' => $displayCat]);
    }


    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteId = $request->input('delete');
        Category::where('id', $deleteId)->delete();
        return view('/admin/adminCategory')->with('sucess', 'Category delete');
    }
}
