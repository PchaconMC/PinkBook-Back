<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Book;
use App\Http\Resources\Rate as RateRes;
use Illuminate\Support\Facades\DB;

class RateService
{
    public function __construct()
    {
    }
    public function show(int $id)
    {

        try {
            $rate = Rate::findOrFail($id);
            return new RateRes($rate);
        } catch (\Exception $exception) {
            return response()->json(["message" => __(":app: Puntuación no encontrada!!", ["app" => env('APP_NAME')])]);
        }
    }
    public function destroy(int $id)
    {
        try {

            $rate = Rate::findOrFail($id);
            $rate->user_id = auth()->user()->id;
            $rate->deleted_at = now();
            $rate->save();

            $avgRate = Rate::select(DB::raw('AVG(rate) AS rate'))
                ->where('book_id', $rate->book_id)
                ->get()
                ->first();
            $book = Book::findOrFail($rate->book_id);
            $book->averach = $avgRate->rate;
            $book->save();

            return response()->json(["message" => __(":app : La Puntuación se ha eliminado!!", ["app" => env('APP_NAME')])]);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function search(Request $request)
    {
        try {

            $rates = Rate::where('book_id', $request->book_id)
                ->orderBy('created_at', 'DESC')
                ->get();

            return RateRes::collection($rates);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function create(Request $request)
    {
        try {
            $rate = new Rate();
            $rate->description = $request->description;
            $rate->rate = $request->rate;
            $rate->book_id = $request->book_id;
            $rate->user_id = auth()->user()->id;
            $rate->created_at = now();
            $rate->save();

            $avgRate = Rate::select(DB::raw('AVG(rate) AS rate'))
                ->where('book_id', $rate->book_id)
                ->get()
                ->first();
            $book = Book::findOrFail($rate->book_id);
            $book->averach = $avgRate->rate;
            $book->save();

            return new RateRes($rate);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
    public function update(Request $request, int $id)
    {
        try {
            $rate = Rate::findOrFail($id);


            $rate->description = $request->description;
            $rate->rate = $request->rate;
            $rate->user_id = auth()->user()->id;
            $rate->updated_at = now();
            $rate->save();

            $avgRate = Rate::select(DB::raw('AVG(rate) AS rate'))
                ->where('book_id', $rate->book_id)
                ->get()
                ->first();
            $book = Book::findOrFail($rate->book_id);
            $book->averach = $avgRate->rate;
            $book->save();


            return new RateRes($rate);
        } catch (\Exception $exception) {
            return response()->json(["error" => json_encode($exception)]);
        }
    }
}
