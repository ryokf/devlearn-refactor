<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class topCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "category" => $this->category->name,
            "status" => $this->status,
            "member" => count($this->userCourse),
            "member_pass" => count($this->certificates)
        ];
    }
}
