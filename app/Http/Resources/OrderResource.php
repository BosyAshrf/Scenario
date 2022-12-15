<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'name' => $this->name,
            'details' => $this->details,
            'customer_id' => new CustomerResource($this->customer()->first()),
            'notes' => $this->notes,
            'status' => $this->status(),
            'created_at' => $this->created_at->format('m/d/Y'),
        ];
    }
}
