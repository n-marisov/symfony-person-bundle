<?php

namespace Maris\Symfony\Person\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Maris\interfaces\Person\Model\FirstnameInterface;
use Maris\interfaces\Person\Model\GenderInterface;
use Maris\interfaces\Person\Model\PatronymicInterface;
use Maris\interfaces\Person\Model\PersonInterface;
use Maris\interfaces\Person\Model\SurnameInterface;

/***
 * Общий объект персоны.
 * Персона необязательно должна быть зарегистрирована,
 * поэтому это отдельная таблица.
 * Персоне запрещается менять пол поэтому каждый пол персоны отдельная сущность.
 */

#[Entity]
#[Table(name: 'persons',options: ['charset'=>"utf8mb4"])]
class Person implements PersonInterface
{
    /***
     * Идентификатор персоны.
     * @var int|null
     */
    #[Id,GeneratedValue,Column(options: ['unsigned'])]
    protected readonly ?int $id;

    /***
     * Фамилия.
     * @var SurnameInterface|null
     */
    #[Embedded(Surname::class, columnPrefix: false)]
    protected ?SurnameInterface $surname = null;

    /**
     * Имя.
     * @var FirstnameInterface|null
     */
    #[Embedded(Firstname::class,columnPrefix: false)]
    protected ?FirstnameInterface $firstname = null;

    /**
     * Отчество.
     * @var PatronymicInterface|null
     */
    #[Embedded(Patronymic::class,columnPrefix: false)]
    protected ?PatronymicInterface $patronymic = null;

    /***
     * Дата рождения.
     * @var DateTimeInterface|null
     */
    #[Column(name: 'birth',type: 'date_immutable')]
    protected ?DateTimeInterface $birthDate = null;

    #[Column(name: 'gender',type: 'smallint',enumType: Gender::class)]
    protected Gender $gender;

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
    public function getGender(): Gender
    {
        return $this->gender;
    }

    /**
     * @inheritDoc
     */
    public function getSurname(): ?SurnameInterface
    {
        return $this->surnameExists() ? $this->surname : null;
    }

    /**
     * @inheritDoc
     */
    public function getFirstname(): ?FirstnameInterface
    {
        return $this->firstnameExists() ? $this->firstname : null;
    }

    /**
     * @inheritDoc
     */
    public function getPatronymic(): ?PatronymicInterface
    {
        return $this->patronymicExists() ? $this->patronymic : null;
    }

    /**
     * @inheritDoc
     */
    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param SurnameInterface|null $surname
     * @return $this
     */
    public function setSurname(?SurnameInterface $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @param FirstnameInterface|null $firstname
     * @return $this
     */
    public function setFirstname(?FirstnameInterface $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @param PatronymicInterface|null $patronymic
     * @return $this
     */
    public function setPatronymic(?PatronymicInterface $patronymic): self
    {
        $this->patronymic = $patronymic;
        return $this;
    }

    /**
     * @param DateTimeInterface|null $birthDate
     * @return $this
     */
    public function setBirthDate(?DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @param Gender $gender
     * @return $this
     */
    public function setGender(Gender $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function surnameExists(): bool
    {
        return !($this->surname?->isNull() ?? true);
    }

    /**
     * @inheritDoc
     */
    public function firstnameExists(): bool
    {
        return !($this->firstname?->isNull() ?? true);
    }

    /**
     * Указывает что пол определен.
     * @inheritDoc
     */
    public function genderExists(): bool
    {
        return $this->getGender()->isSuccess();
    }

    /**
     * @inheritDoc
     */
    public function patronymicExists(): bool
    {
        return !($this->patronymic?->isNull() ?? true);
    }

    /**
     * @inheritDoc
     */
    public function birthDateExists(): bool
    {
        return !is_null( $this->birthDate );
    }

    /**
     * @inheritDoc
     */
    public function isStrict(): bool
    {
        return $this->surnameExists()
            && $this->firstnameExists()
            && $this->patronymicExists()
            && $this->birthDateExists();
    }
}