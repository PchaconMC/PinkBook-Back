<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserRes;
use Carbon\Carbon;

class Rate extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "description"=>$this->description,
            "rate"=>$this->rate,
            "user"=>new UserRes($this->user),
            "created_at"=> Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d-m-Y H:i'),
            "book_id"=>$this->book_id,
        ];
    }
}
