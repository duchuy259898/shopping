<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;


class DucHuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data = category::paginate(1);
        return view('category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
        $this->validate($request,[
            // 'name' => 'required',
            'name' => 'required|unique:category,name',//check xem co trong DB chua
            'slug' => 'required'
        ],[
            'name.required' => 'Tên ID không được để trống',
            'name.unique' => 'Tên danh mục đã có trong CSDL',
            'slug.required' => 'slug không được để trống'
        ]);
        $data = [
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ];
        category::create($data);
        return redirect('/category')->with('success', 'Category created successfully');;
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
    public function edit($id)
    {   
        $model = category::find($id);
        return view('category.edit',compact('model'))->with('success', 'Category edited successfully');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {   
        // dd($request->all());
        category::where(['id'=> $id])->first()->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        return redirect('/category')->with('success', 'Category updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            // Xử lý lỗi: không tìm thấy dòng dữ liệu
            return redirect()->route('category.index')->with('error', 'Category not found');
        }

        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }
}
