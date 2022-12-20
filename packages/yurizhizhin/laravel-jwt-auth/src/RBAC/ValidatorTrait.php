<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\RBAC;

use Yurizhizhin\LaravelJwtAuth\Exceptions\NotPermittedException;

/**
 * @class ValidatorTrait
 * @package Yurizhizhin\LaravelJwtAuth\RBAC
 */
trait ValidatorTrait
{
    /**
     * @var PermissionValidator $rbac
     */
    public PermissionValidator $rbac;

    /**
     * @param string $permission
     * @return bool
     * @throws NotPermittedException
     */
    public function getHasPermission(string $permission): bool
    {
        if (!$this->rbac->getHasPermission($permission)) {
            throw new NotPermittedException();
        }

        return true;
    }
}