<?php

namespace Maris\Symfony\Person\Entity;

use Maris\interfaces\Person\Model\GenderInterface;
use Maris\Symfony\Person\Model\Gender;

class Girl extends Person
{
    public function getGender(): GenderInterface
    {
        return Gender::GIRL;
    }
}