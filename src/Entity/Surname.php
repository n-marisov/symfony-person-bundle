<?php

namespace Maris\Symfony\Person\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use Maris\interfaces\Person\Model\SurnameInterface;

/**
 * Фамилия.
 * Хранится в БД в верхнем регистре.
 */
#[Embeddable]
class Surname implements SurnameInterface
{
    #[Column(name: 'surname',nullable: true)]
    protected ?string $value = null;


    /**
     * Возвращает фамилию в верхнем регистре.
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