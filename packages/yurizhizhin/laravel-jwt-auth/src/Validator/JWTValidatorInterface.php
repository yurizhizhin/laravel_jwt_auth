<?php
declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Validator;

/**
 * @class JWTValidatorInterface
 * @package Yurizhizhin\LaravelJwtAuth\Validator
 */
interface JWTValidatorInterface
{
    /**
     * Валидация токена
     *
     * @param string $token
     * @return bool
     */
    public function validateToken(string $token): bool;
}