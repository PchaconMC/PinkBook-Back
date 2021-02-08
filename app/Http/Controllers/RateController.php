<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Book;
use App\Http\Resources\Rate as RateRes;
use App\Service\RateService;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    public function __construct(RateService $rateService){
        $this->middleware('auth:api',['except'=>['unauthorized','search']]);
        $this->guard='api';
        $this->rateService=$rateService;
    }
    public function unauthorized(){
        return response()->json(['error'=>'Unauthorized'],401);
    }

    public function show(int $id)
    {

        if (request()->ajax()) {
            if (request()->isMethod("GET")) {
                return $this->rateService->show($id);
            }
        }
        abort(401);
    }
    public function destroy(int $id)
    {
        if (request()->ajax()) {
            if (request()->isMethod("DELETE")) {
                return $this->rateService->destroy($id);
            }
        }
        abort(401);
    }
    public function search(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->rateService->search($request);
            }
        }
        abort(401);
    }
    public function create(Request $request)
    {
        if (request()->ajax()) {
            if (request()->isMethod("POST")) {
                return $this->rateService->create($request);
            }
        }
        abort(401);
    }
    public function update(Request $request, int $id)
    {
        if (request()->ajax()) {
            if (request()->isMethod("PUT")) {
                return $this->rateService->update($request,$id);
            }
        }
        abort(401);
    }
}
