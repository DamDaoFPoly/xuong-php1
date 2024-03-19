<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::table('categories')->orderByDesc('id')->paginate(5); //
        // $data = DB::table('categories')->latest('id')->paginate(5);
        return view('categories.index', compact('data'));
        // return view('categories.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = [
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('categories')->insert($data);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $category = DB::table('categories')->where('id', $id)->find();
        $category = DB::table('categories')->find($id);
        return view('categories.show', compact('category'));

        // dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = DB::table('categories')->find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = DB::table('categories')->findOr($id, function () {
            abort(404);// abot hàm sâu ra lỗi
        });
        $data = [
            'name' => $request->name,
            'updated_at' => now(),
        ];


        DB::table('categories')
        ->where('id', $category->id)
        // ->where('name',)
        ->update($data);

        return back(); // quay lại trang update đấy dùng back()
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('categories')->delete($id);
        return redirect()->route('categories.index');
    }
}
