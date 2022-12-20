<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\DataHandlers\RBAC;

use Yurizhizhin\LaravelJwtAuth\Models\DataHandlers\AbstractDataHandler;
use Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC\ModelHasRolesDto;
use Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC\RoleHasPermissionsDto;

/**
 * @class RBACDataHandler
 * @package App\DataHandlers\RBAC
 */
class RBACDataHandler extends AbstractDataHandler implements RBACDataHandlerInterface
{
    /**
     * {@inheritDoc}
     */
    public function getModelRoles(int $userID, bool $raw = false): array
    {
        /** @var ModelHasRolesDto[] $rolesDto */
        $rolesDto = $this->dataSource->getModelRoles($userID);

        $result = [];

        foreach ($rolesDto as $dto) {
            if ($raw) {
                $result[] = (int)$dto->role_id;
            } else {
                $result[] = "{$dto->role->service_id}_{$dto->role_id}";
            }
        }

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function getPermissions(array $roleID): array
    {
        /** @var RoleHasPermissionsDto[] $permissionsDto */
        $permissionsDto = $this->dataSource->getPermissions($roleID);

        $result = [];

        foreach ($permissionsDto as $dto) {
            $result[] = $dto->permission->name;
        }

        return $result;
    }
}