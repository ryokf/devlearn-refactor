<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'course_id' => $this->courses->id,
            'course_title' => $this->courses->title,
            'user_id' => $this->users->id,
            'user_username' => $this->users->username,
            'date' => date_format($this->created_at, 'D, j M Y, G:i')
        ];
    }
}
