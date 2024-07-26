<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'date_birth' => $this->date_birth,
            'phone_number' => $this->phone_number,
            'faculty' => [
                'id' => $this->faculty->id,
                'name' => $this->faculty->name,
            ],

        ];
    }
}
