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
            "coursePercentage" => [$this->resource['coursePercentage'][0], $this->resource['coursePercentage'][1]],
            "lessonPercentage" => [$this->resource['lessonPercentage'][0], $this->resource['lessonPercentage'][1]],
            "transactionPercentage" => [$this->resource['transactionPercentage'][0],$this->resource['transactionPercentage'][1] ],
            "incomePercentage" => [$this->resource['incomePercentage'][0],$this->resource['incomePercentage'][1] ],
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
