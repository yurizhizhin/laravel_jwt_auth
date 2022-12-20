<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC;

use Yurizhizhin\LaravelJwtAuth\Models\Dto\AbstractDto;

/**
 * @class RoleHasPermissionsDto
 * @package Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC
 */
class RoleHasPermissionsDto extends AbstractDto
{
    /**
     * @var RolesDto|null
     */
    public ?RolesDto $role;

    /**
     * @var PermissionsDto|null
     */
    public ?PermissionsDto $permission;
}
