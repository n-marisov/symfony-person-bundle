<?php

namespace Maris\Symfony\Person\Traits;

use Maris\Symfony\Person\Entity\Person;

trait PersonAggregateNotNullTrait
{
    protected Person $person;

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     * @return $this
     */
    public function setPerson(Person $person): self
    {
        $this->person = $person;
        return $this;
    }


}