<?php

namespace Maris\Symfony\Person\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use Maris\interfaces\Person\Model\FirstnameInterface;
use Maris\interfaces\Person\Model\SurnameInterface;

/***
 * Имя.
 * Хранится в БД в верхнем регистре.
 */
#[Embeddable]
class Firstname implements FirstnameInterface
{
    #[Column(name: 'firstname',nullable: true)]
    protected ?string $value = null;


    /**
     * Возвращает имя в верхнем регистре.
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->value;
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }
}