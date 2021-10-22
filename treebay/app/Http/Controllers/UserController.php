<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin/adminUser', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if($request->input('edit')){
            $id = $request->input('edit');
            $user = User::where('id', $id)->get();
        }else if($request->input('submit_multiple_edit')){
            $multiUserId = $request->get('multiple_edit_user');
            $user = User::whereIn('id', $multiUserId)->get();    
        }   
        
        return view("/admin/updateUser", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', User::class);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'required|boolean'
        ]);

        // $input = $request->input();
        // $rules = [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'is_admin' => 'required|boolean'
        // ];
        // $messages = [
        //     // 'name.required' => 'name requireeeed',
        //     // 'is_admin.required' => 'admin field must be filled !!!!!!!!'
        // ];

        // $validator = Validator::make($input, $rules, $messages);

        // if ($validator->fails()) {
        //     // dd($validator);
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        if($request->input("update")){
            $id = $request->input('update');
            User::where('id',$id)->update($validatedData);
        } else if($request->input("submit_multi_user")){

            for($i=0; $i<count($request->input('name')); $i++){
                
                $updateName = $request->input('name')[$i];
                $multiId = $request->input('multi_update')[$i];
                $updateEmail = $request->input('email')[$i];
                $updateAdmin = $request->input('is_admin')[$i];
                
                User::where('id', $multiId)->update(array('name' => $updateName));
                User::where('id', $multiId)->update(array('email' => $updateEmail));
                User::where('id', $multiId)->update(array('is_admin' => $updateAdmin));
            }
    }
    return view('/admin/adminUser')->with('sucess', 'User update');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteId = $request->input('delete');
        User::where('id', $deleteId)->delete();
        return view('/admin/adminUser')->with('sucess', 'User delete');
    }



    

}
