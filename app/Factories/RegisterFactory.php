<?php

namespace App\Factories;

use App\Http\DTOs\RegisterDTO;
use App\Http\Requests\RegisterRequest;

class RegisterFactory
{
    public static function fromRequest(RegisterRequest $request): RegisterDTO
    {
        $dto = new RegisterDTO();

        $dto->email = $request->get('email');
        $dto->password = $request->get('password');
        $dto->name = $request->get('name');

        return $dto;
    }
}
