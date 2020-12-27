<?php

declare(strict_types=1);

use Enjoys\Patterns\Singleton;

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Class SingletonCase2
 */
class SingletonCase2 extends Singleton
{

    /**
     * @var mixed
     */
    private $param;

    /**
     * @param mixed $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }
}
