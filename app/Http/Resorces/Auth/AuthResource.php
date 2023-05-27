<?php

namespace App\Http\Resorces\Auth;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User $resource
 */
class AuthResource extends JsonResource
{
	public function toArray($request)
	{
		return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'token' => $this->resource->createToken('spa')->plainTextToken,
            'stepikID' => $this->resource?->stepik->external_id,
            'knowledge' => $this->resource?->stepik->knowledge,
        ];
	}
}
