<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @class ModelHasRoles
 * @package App\Models\Eloquent
 */
class Roles extends Model implements DataSourceInterface
{
    /**
     * @var string $table
     */
    protected $table = 'roles';
}
