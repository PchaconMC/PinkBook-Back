<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Category as CategoryRes;

class CategoryService
{
    public function __construct()
    {
    }

    public function show(int $id)
    {

        try {
            $category = Category::findOrFail($id);
            return new CategoryRes($category);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Categoría no encontrada!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function destroy(int $id)
    {
        try {

            $category = Category::findOrFail($id);
            $category->user_id = auth()->user()->id;
            $category->deleted_at = now();
            $category->save();

            return response()->json(["message" => __(":app : La Categoría se ha eliminado!!", ["app" => env('APP_NAME')])]);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function search(Request $request)
    {
        try {

            $filter = $request->filter;
            $categorys = Category::where('name', 'ilike', '%' . $filter . '%')
                ->orderBy('name', 'ASC')
                ->withCount("books")
                ->get();

            return CategoryRes::collection($categorys);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function create(Request $request)
    {
        try {

            $category = new Category();
            $category->name = $request->name;
            $category->image = "storage/img/category/noportada.png";
            $category->description = $request->description;
            $category->user_id = auth()->user()->id;
            $category->created_at = now();
            $category->save();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'image_' . $category->id . '.' . $extension;
                $path = storage_path('app/public/img/category/');
                $file->move($path, $fileName);

                $category->image = 'storage/img/category/' . $fileName;
                $category->save();
            }


            return new CategoryRes($category);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function update(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);


            $category->name = $request->name;
            $category->description = $request->description;
            $category->user_id = auth()->user()->id;
            $category->updated_at = now();


            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'image_' . $category->id . '.' . $extension;
                $path = storage_path('app/public/img/category/');
                $file->move($path, $fileName);

                $category->image = 'storage/img/category/' . $fileName;
            }

            $category->save();


            return new CategoryRes($category);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
}
