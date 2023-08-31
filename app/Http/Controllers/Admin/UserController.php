<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data = user::paginate(1);
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $this->validate($request,[
            // 'name' => 'required',
            'name' => 'required',//check xem co trong DB chua
            'email' => 'required|email|unique:users,email',//check xem co trong DB chua
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ],[
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'confirm_password.required' => 'Mật khẩu không được để trống',
            'confirm_password.same' => 'Nhập lại mật khẩu không trùng với mật khẩu ở trên',
        ]);
        $password = bcrypt($request->password);
        $confirm_password = bcrypt($request->confirm_password);
        $request->merge([
            'password' => $password,
            'confirm_password' => $confirm_password,
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        user::create($data);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {   
    //     $model = user::find($id);
    //     return view('user.edit',compact('model'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,$id)
    // {   
    //     // dd($request->all());
    //     user::where(['id'=> $id])->first()->update([
    //         'name' => $request->input('name'),
    //         'slug' => $request->input('slug'),
    //     ]);
    //     return redirect('/duchuy/user');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($id)
    {
        user::find($id)->delete();
        return redirect()->route('user.index');
    }
}
