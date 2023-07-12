<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
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
            "course_count" => count($this->resource['course']),
            "lesson_count" => $this->resource['lesson_count'],
            "member_count" => $this->resource['member_count'],
            "income" => $this->resource['income'],
            "course_top_bought" => topCourseResource::collection($this->resource['topBought']),
            "course_top_pass" => topCourseResource::collection($this->resource['topPass']),
            "buyer_count" => $this->resource['buyer_count'],
            "graduate_count" => $this->resource['graduate_count'],
        ];
    }
}
