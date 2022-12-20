<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\RBAC;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Yurizhizhin\LaravelJwtAuth\Models\DataHandlers\RBAC\RBACDataHandler;
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
     */
    public function getHasPermission(string $permission): bool
    {
        $roles = $this->dataHandler->getModelRoles(Auth::id(), true);

        return in_array($permission, $this->dataHandler->getPermissions($roles));
    }
}