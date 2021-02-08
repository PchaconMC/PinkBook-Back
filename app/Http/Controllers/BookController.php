<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BookService;

class BookController extends Controller
{
    public function __construct(BookService $bookService)
    {
        $this->middleware('auth:api', ['except' => ['unauthorized', 'show', 'search']]);
        $this->guard = 'api';
        $this->bookService = $bookService;
    }
    public function unauthorized()
    {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function show(int $id)
    {

        if (request()->ajax()) {
            if (request()->isMethod("GET")) {
                return $this->bookService->show($id);
            }
        }
        abort(401);
    }
    public function destroy(int $id)
    {
        if (request()->ajax()) {
            if (request()->isMethod("DELETE")) {
                return $this->bookService->destroy($id);
            }
        }
        abort(401);
    }
    public function search(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->bookService->search($request);
            }
        }
        abort(401);
    }
    public function create(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->bookService->create($request);
            }
        }
        abort(401);
    }
    public function update(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->bookService->update($request);
            }
        }
        abort(401);
    }
}
