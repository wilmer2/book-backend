<?php

namespace App\Containers\Viewer\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ClientsCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class FindByIpCriteria extends Criteria
{

    /**
     * @var int
     */
    private $ip;

    /**
     * ThisUserCriteria constructor.
     *
     * @param $ip
     */
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('ip', $this->ip);
    }
}
