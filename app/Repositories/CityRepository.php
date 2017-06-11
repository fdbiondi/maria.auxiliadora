<?php

namespace App\Repositories;

use App\Entities\City;

class CityRepository extends BaseRepository
{
    protected $table = "cities";
    protected $column = "name";

    /**
     * @return \App\Entities\Entity
     */
    public function getModel()
    {
        return new City();
    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return [];
    }

}