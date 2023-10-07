<?php

namespace Maris\Symfony\Person\Traits;

use Maris\Symfony\Person\Entity\Person;

trait PersonAggregateTrait
{
    protected ?Person $person = null;

    /**
     * @return Person|null
     */
    public function getPerson(): ?Person
    {
        return $this->person;
    }

    /**
     * @param Person|null $person
     * @return $this
     */
    public function setPerson(?Person $person): self
    {
        $this->person = $person;
        return $this;
    }


}