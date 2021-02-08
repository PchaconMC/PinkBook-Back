<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CategoryService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService){
        $this->middleware('auth:api',['except'=>['unauthorized','search']]);
        $this->guard='api';
        $this->categoryService = $categoryService;
    }
    public function unauthorized(){
        return response()->json(['error'=>'Unauthorized'],401);
    }

    public function show(int $id)
    {

        if (request()->ajax()) {
            if (request()->isMethod("GET")) {
                return $this->categoryService->show($id);
            }
        }
        abort(401);
    }
    public function destroy(int $id)
    {
        if (request()->ajax()) {
            if (request()->isMethod("DELETE")) {
                return $this->categoryService->destroy($id);
            }
        }
        abort(401);
    }
    public function search(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->categoryService->search($request);
            }
        }
        abort(401);
    }
    public function create(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->categoryService->create($request);
            }
        }
        abort(401);
    }
    public function update(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->categoryService->update($request);
            }
        }
        abort(401);
    }
}
