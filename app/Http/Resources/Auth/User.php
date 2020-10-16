<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\PermissionCollection;
use App\Http\Resources\RoleCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * Class User
 * @package App\Http\Resources\Auth
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => new RoleCollection($this->whenLoaded('roles')),
            'permissions' => new PermissionCollection($this->whenLoaded('permissions')),
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
