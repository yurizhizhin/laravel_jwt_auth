<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yurizhizhin\LaravelJwtAuth\Exceptions\InvalidTokenProvidedException;

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
     * Валидация токена
     *
     * @param Request $request
     * @return bool
     * @throws InvalidTokenProvidedException
     */
    public function checkAuthToken(Request $request): bool
    {
        $this->authToken = $request->server->get('HTTP_AUTHORIZATION', false);

        if (!is_string($this->authToken)) {
            throw new InvalidTokenProvidedException();
        }

        $this->authToken = str_replace('Bearer ', '', $this->authToken);

        /** @var JWTValidator $validator */
        $validator = App::make(JWTValidator::class);

        return $validator->validateToken($this->authToken);
    }
}