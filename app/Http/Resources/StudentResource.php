<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID' => $this->ID,
            'FullName' => $this->FullName,
            'Parent_ID' => $this->Parent_ID,
            'Image' => $this->Image,
            'grade' => $this->grade,
            'class' => $this->class,
            'Supervisor_ID' => $this->Supervisor_ID,
        ];
    }
}
