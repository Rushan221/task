<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'=>(string)$this->id,
            'type'=>'Company Category',
            'data'=>[
                'title'=>$this->title,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at,
            ]
        ];
    }
}
