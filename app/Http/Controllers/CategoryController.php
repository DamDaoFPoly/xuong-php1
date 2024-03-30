<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = \request()->keyword;

        // $data = DB::table('categories')
        //     ->when(!empty($keyword), function (Builder $query) use ($keyword) {
        //         /*$query->where('id', 'like', "%$keyword%")
        //             ->orWhere('name', 'like', "%$keyword%")
        //             ->orWhere('created_at', 'like', "%$keyword%")
        //             ->orWhere('updated_at', 'like', "%$keyword%");*/

        //         // $query->whereAll(['id', 'name', 'created_at', 'updated_at'], 'like', "%$keyword%");
        //         $query->whereAny(['id', 'name', 'created_at', 'updated_at'], 'like', "%$keyword%"); // dùng 
        //     })
        //     ->latest('id')->paginate();
        // orderByDesc('id')->paginate(5); // paginate(5) phân trang
        // $data = DB::table('categories')->latest('id')->paginate(5); ->latest('id') sắp xếp từ trên xuống theo id giống orderByDesc
        // return view('categories.index', compact('data'));
        // return view('categories.index',['data'=>$data]);



        //inloqruent
        $data = Category::query()
            ->when(!empty($keyword), function (Builder $query) use ($keyword) {
                $query->whereAny(['id', 'name', 'created_at', 'updated_at'], 'like', "%$keyword%");
            })
            ->latest('id')->paginate(5);

        return view('categories.index', compact('data'));
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
        // $data = [
        //     'name' => $request->name,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ];
        // DB::table('categories')->insert($data);

        // return redirect()->route('categories.index');

        // inloquent
        Category::query()->create($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        //cánh 1 $category = DB::table('categories')->where('id', $id)->find();
        // $category = DB::table('categories')->find($id);
        // return view('categories.show', compact('category'));

        // dd($category);
        $category = Category::query()->findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // $category = DB::table('categories')->findOr($id, function () {
        //     abort(404);
        // });

        // return view('categories.edit', compact('category'));

        //inloquent
        $category = Category::query()->findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $category = DB::table('categories')->findOr($id, function () {
        //     abort(404); // abot hàm sâu ra lỗi
        // });
        // $data = [
        //     'name' => $request->name,
        //     'updated_at' => now(),
        // ];


        // DB::table('categories')
        //     ->where('id', $category->id)
        //     // ->where('name',)
        //     ->update($data);

        // return back(); // quay lại trang update đấy dùng back()

        //inloquent
        $category = Category::query()->findOrFail($id);

        $category->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // DB::table('categories')->delete($id);
        // return redirect()->route('categories.index');

        //INLOQUENT
        Category::destroy($id);

        return redirect()->route('categories.index');
    }
}
