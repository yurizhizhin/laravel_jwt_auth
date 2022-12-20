<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\RBAC;

use Illuminate\Support\Facades\App;
use Yurizhizhin\LaravelJwtAuth\DataHandlers\RBAC\RBACDataHandler;
use Yurizhizhin\LaravelJwtAuth\Exceptions\NotPermittedException;
use Yurizhizhin\LaravelJwtAuth\Models\Eloquent\ModelHasRoles;

/**
 * @class JWTValidator
 * @package Yurizhizhin\LaravelJwtAuth
 */
class PermissionValidator
{
    /**
     * @var RBACDataHandler Источник и обработчик данных (ex.: PostgresSQL, mongoDB)
     */
    public RBACDataHandler $dataHandler;

    public function __construct()
    {
        $this->dataHandler = App::make(RBACDataHandler::class, ['dataSource' => new ModelHasRoles()]);
    }

    /**
     * @param string $permission
     * @return bool
     * @throws NotPermittedException
     */
    public function getHasPermission(string $permission, int $userID): bool
    {
        $roles = $this->dataHandler->getModelRoles($userID, true);

        if (!in_array($permission, $this->dataHandler->getPermissions($roles))) {
            throw new NotPermittedException();
        }

        return true;
    }
}