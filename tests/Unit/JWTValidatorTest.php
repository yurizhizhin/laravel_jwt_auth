<?php declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Yurizhizhin\LaravelJwtAuth\Validator\JWTValidator;

/**
 * @class JWTValidatorTest
 * @package
 */
class JWTValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTkyLjE2OC4xLjE1My9hdXRoL3JlZ2lzdGVyIiwiaWF0IjoxNjcxNDQzODcyLCJleHAiOjE5OTkwNDg2NzMsIm5iZiI6MTY3MTQ0Mzg3MywianRpIjoiTFdpSTFsUUQ2eHNxSVp3byIsInN1YiI6IjMwNzkiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3Iiwicm9sZXMiOltdLCJhdWQiOiJjdXJyZW5jeSJ9.h5B7kjq66tINcCorz4jtj9-YJeHmeFD2yhhd2WnF6O0';

        /** @var JWTValidator $validator */
        $validator = App::make(JWTValidator::class);

        $validator->validateToken($token);
    }
}
