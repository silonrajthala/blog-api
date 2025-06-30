<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title'        => $this->title,
            'author_name'  => $this->author->name,
            'category_name'=> $this->category->name,
            'created_at'   => $this->created_at->toDateTimeString(),
        ];
    }
}
