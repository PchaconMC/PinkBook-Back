<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\Book as BookRes;


class BookService
{
    public function __construct()
    {
    }

    public function show(int $id)
    {

        try {
            $book = Book::findOrFail($id);

            $book = Book::where('id', $id)
            ->withCount("rates")
            ->get()
            ->first();

            return new BookRes($book);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Libro no encontrado!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function destroy(int $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->user_id = auth()->user()->id;
            $book->deleted_at = now();
            $book->save();

            return response()->json(["message" => __(":app : El Libro se ha eliminado!!", ["app" => env('APP_NAME')])]);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Libro no encontrado!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function search(Request $request)
    {
        try {

            $filter = $request->filter;
            $category_id = $request->category_id;
            $books = Book::where(function ($query) use ($filter) {
                $query->where('title', 'ilike', '%' . $filter . '%')
                    ->orWhere('isbn', 'ilike', '%' . $filter . '%')
                    ->orWhere('author', 'ilike', '%' . $filter . '%');
            })
                ->when($request->category_id, function ($query) use ($category_id) {
                    return $query->where('category_id', $category_id);
                })
                ->with("user", "category")
                ->withCount("rates")
                ->paginate($request->per_page);

            return BookRes::collection($books);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: error al ejecutar la consulta!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function create(Request $request)
    {
        try {
            //error_log('$request->title:  '.$request->title);



            $book = new Book();
            $book->title = $request->title;
            $book->image = "storage/img/book/noportada.png";
            $book->isbn = $request->isbn;
            $book->author = $request->author;
            $book->summary = $request->summary;
            $book->averach = $request->averach;
            $book->price = $request->price;
            $book->category_id = $request->category_id;
            $book->user_id = auth()->user()->id;
            $book->created_at = now();
            $book->save();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'image_' . $book->id . '.' . $extension;
                $path = storage_path('app/public/img/book/');
                error_log('ruta:: ' . $path);
                $file->move($path, $fileName);

                $book->image = 'storage/img/book/' . $fileName;
                $book->save();
            }


            return new BookRes($book);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function update(Request $request)
    {
        try {
            $book = Book::findOrFail($request->id);


            $book->title = $request->title;
            $book->isbn = $request->isbn;
            $book->author = $request->author;
            $book->summary = $request->summary;
            $book->averach = $request->averach;
            $book->price = $request->price;
            $book->category_id = $request->category_id;
            $book->user_id = auth()->user()->id;
            $book->updated_at = now();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'image_' . $book->id . '.' . $extension;
                $path = storage_path('app/public/img/book/');
                $file->move($path, $fileName);

                $book->image = 'storage/img/book/' . $fileName;
            }
            $book->save();


            return new BookRes($book);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
}
