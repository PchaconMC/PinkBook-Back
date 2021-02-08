<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserRes;
use App\Http\Resources\Category as CategoryRes;


class Book extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "image" => $this->image,
            "isbn" => $this->isbn,
            "author" => $this->author,
            "summary" => $this->summary,
            "averach" => $this->averach,
            "rates_count" => $this->rates_count,
            "price" => $this->price,
            "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y H:i'),
            "user" => new UserRes($this->user),
            "category" => new CategoryRes($this->category)
        ];
    }
}
