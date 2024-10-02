<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy tất cả dữ liệu cần thiết từ model
        $genres = Genre::all();

        // Nếu yêu cầu là AJAX, trả về JSON
        if ($request->wantsJson()) {
            return response()->json([
                'draw' => intval($request->get('draw')), // Thêm draw để DataTable biết là có yêu cầu mới
                'recordsTotal' => $genres->count(), // Tổng số bản ghi
                'recordsFiltered' => $genres->count(), // Tổng số bản ghi đã lọc (có thể thay đổi nếu có bộ lọc)
                'data' => $genres, // Dữ liệu
            ]);
        }

        // Nếu không phải yêu cầu AJAX, trả về view
        return view('admin.genre.index', compact('genres'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return response()->json([
            'status' => 'success',
            'data' => $genre,
        ]);
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
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Tìm thể loại theo ID
        $genre = Genre::findOrFail($id);

        // Cập nhật thông tin thể loại
        $genre->name = $request->input('name');
        $genre->description = $request->input('description');
        $genre->save();

        // Trả về phản hồi JSON
        return response()->json(['status' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::query()->findOrFail($id);
        // Xóa thể loại
        $genre->delete();
        // Trả về phản hồi JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Xóa thành công'
        ]);
    }

}
