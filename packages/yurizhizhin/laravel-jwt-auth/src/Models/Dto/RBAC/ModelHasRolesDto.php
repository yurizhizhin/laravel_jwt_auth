<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC;

use Yurizhizhin\LaravelJwtAuth\Models\Dto\AbstractDto;

/**
 * @class ModelHasRolesDto
 * @package Yurizhizhin\LaravelJwtAuth\Models\Dto\RBAC
 */
class ModelHasRolesDto extends AbstractDto
{
    /**
     * @var int|null
     */
    public ?int $role_id;

    /**
     * @var string|null
     */
    public ?string $model_type;

    /**
     * @var int|null
     */
    public ?int $model_id;

    /**
     * @var RolesDto|null
     */
    public ?RolesDto $role;
}
