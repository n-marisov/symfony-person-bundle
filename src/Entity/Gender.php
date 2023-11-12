<?php

namespace Maris\Symfony\Person\Entity;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Maris\interfaces\Person\Model\GenderInterface;

/**
 * Пол
 */
#[MappedSuperclass]
enum Gender:int implements GenderInterface
{
    case GIRL = 1;
    case MAN = 2;

    public function isMan(): bool
    {
        return $this === self::MAN;
    }

    public function isNotMan(): bool
    {
        return !$this->isMan();
    }

    public function isGirl(): bool
    {
        return $this === self::GIRL;
    }

    public function isNotGirl(): bool
    {
        return !$this->isGirl();
    }

    public function isUnknown(): bool
    {
        return false;
    }

    public function isSuccess(): bool
    {
        return true;
    }
}
