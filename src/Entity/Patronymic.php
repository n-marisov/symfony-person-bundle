<?php

namespace Maris\Symfony\Person\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use Maris\interfaces\Person\Model\PatronymicInterface;
use Maris\interfaces\Person\Model\SurnameInterface;

/**
 * Отчество.
 * Хранится в БД в верхнем регистре.
 */
#[Embeddable]
class Patronymic implements PatronymicInterface
{
    #[Column(name: 'patronymic',nullable: true)]
    protected ?string $value = null;


    /**
     * Возвращает отчество в верхнем регистре.
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