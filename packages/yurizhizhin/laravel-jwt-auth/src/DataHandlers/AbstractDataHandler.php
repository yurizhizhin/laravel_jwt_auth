<?php declare(strict_types=1);

namespace Yurizhizhin\LaravelJwtAuth\DataHandlers;

use Yurizhizhin\LaravelJwtAuth\Models\Eloquent\DataSourceInterface;

/**
 * @class AbstractDataHandler
 * @package App\DataHandlers
 */
abstract class AbstractDataHandler
{
    /**
     * // TODO dataSource из конфига
     *
     * @var DataSourceInterface $dataSource Источник данных
     */
    public DataSourceInterface $dataSource;

    /**
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }
}