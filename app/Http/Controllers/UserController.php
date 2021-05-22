<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
           'users' => User::All()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {   // all data
        $data = $request->all();
        // chceck image
        if($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'), $image);
        } else {
            $image = 'avatar.png';
        }
        // concat first name + last name
        $data['name'] = $request->firstname . ' ' . $request->lastname;
        // create image
        $data['image'] = $image;
        // hash pasword
        $data['password'] = bcrypt($request->password);
        // craete user
        User::create($data);
        // redirect
        return redirect()->route('users.index')->with('success',  'Employee created');
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
    public function edit($id)
    {
        return view('admin.user.edit', [
            'user' => User::findOrFail($id)
        ]);
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
        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'department_id' => 'required',
            'role_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png,svg',
            'start_from' => 'required',
            'designation'=> 'required'
        ]);

        $data = $request->all();
        $user = User::findOrFail($id);
        // check user photo
        if($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'), $image);
        } else {
            $image = $user->image;
        }
        // check user password
        if($request->password) {
            $password = $request->password;
        } else {
            $password = $user->password;
        }

        $data['image'] = $image;
        $data['password'] =  bcrypt($password);
        $user->update($data);
        return redirect()->route('users.index')->with('success',  'Employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success',  'Employee deleted');
    }
}
