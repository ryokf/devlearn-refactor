<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'photo' => $this->photo,
            'category' => $this->category->name,
            'status' => $this->status,
            'price' => $this->price,
            'is_public' => $this->is_public,
            'member' => count($this->userCourse)
        ];
    }

    // public function toArray($request)
    // {
    //     return [
    //         'data' => $this->transformCollection($this->collection),
    //         'meta' => [
    //             "success" => true,
    //             "message" => "Success get courses lists",
    //             'pagination' => $this->metaData()
    //         ]
    //     ];
    // }

    // private function transformData($data)
    // {
    //     return [
    //         'id' => $data->id,
    //         'title' => $data->title,
    //         'photo' => $data->photo,
    //         'category' => $data->category->name,
    //         'status' => $data->status,
    //         'price' => $data->price,
    //         'is_public' => $data->is_public,
    //         'member' => count($data->userCourse)
    //     ];
    // }

    // private function transformCollection($collection)
    // {
    //     return $collection->transform(function ($data) {
    //         return $this->transformData($data);
    //     });
    // }

    // private function metaData()
    // {
    //     return [
    //         "total" => $this->total(),
    //         "count" => $this->count(),
    //         "per_page" => (int)$this->perPage(),
    //         "current_page" => $this->currentPage(),
    //         "total_pages" => $this->lastPage(),
    //         "links" => [
    //             "next" => $this->nextPageUrl()
    //         ],
    //     ];
    // }
}
