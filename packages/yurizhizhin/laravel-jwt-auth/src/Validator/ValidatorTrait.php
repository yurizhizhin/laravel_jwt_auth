<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PHPOpenSourceSaver\JWTAuth\JWT;
use Exception;

/**
 * @class ValidatorTrait
 * @package Yurizhizhin\LaravelJwtAuth
 */
trait ValidatorTrait
{
    /**
     * @var string|bool $authToken
     */
    public string|bool $authToken;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->authToken = $request->server->get('HTTP_AUTHORIZATION', false);

        if (is_string($this->authToken)) {
            $this->authToken = str_replace('Bearer ', '', $this->authToken);
        }
    }

    /**
     * Валидация токена
     *
     * @return void
     * @throws Exception
     */
    public function validateToken(): void
    {
        /** @var JWTValidator $validator */
        $validator = App::make(JWT::class);

        if (!$validator->validateToken($this->authToken)) {
            throw new Exception('Given access token is invalid');
        }
    }
}