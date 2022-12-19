<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Validator;

use Illuminate\Support\Facades\App;
use PHPOpenSourceSaver\JWTAuth\JWT;

/**
 * @class ValidatorTrait
 * @package Yurizhizhin\LaravelJwtAuth
 */
trait ValidatorTrait
{
    /**
     * Валидация токена
     *
     * @param string $token
     * @return bool
     */
    public function validateToken(string $token): bool
    {
        /** @var JWTValidator $validator */
        $validator = App::make(JWT::class);

        return $validator->validateToken($token);
    }
}