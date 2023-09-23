<?php

namespace Maris\Symfony\Person\Entity;

use DateTimeImmutable;
use Maris\interfaces\Person\Model\GenderInterface;
use Maris\interfaces\Person\Model\PersonInterface;
use Maris\Symfony\Person\Model\Gender;

/***
 * Общий объект персоны.
 * Персона необязательно должна быть зарегистрирована,
 * поэтому это отдельная таблица.
 */
class Person implements PersonInterface
{
    protected ?int $id = null;
    protected string $surname;
    protected string $firstname;
    protected string $patronymic;
    protected DateTimeImmutable $birthDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @inheritDoc
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @inheritDoc
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @inheritDoc
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * @inheritDoc
     */
    public function getBirthDate(): DateTimeImmutable
    {
        return $this->birthDate;
    }

    /**
     * @inheritDoc
     */
    public function getGender(): GenderInterface
    {
        return Gender::UNKNOWN;
    }

    /**
     * @param string $surname
     * @return $this
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @param string $patronymic
     * @return $this
     */
    public function setPatronymic(string $patronymic): self
    {
        $this->patronymic = $patronymic;
        return $this;
    }

    /**
     * @param DateTimeImmutable $birthDate
     * @return $this
     */
    public function setBirthDate(DateTimeImmutable $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }


}