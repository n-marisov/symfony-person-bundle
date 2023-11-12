<?php

namespace Maris\Symfony\Person\Form;

use Maris\Symfony\Person\Entity\Gender;
use Maris\Symfony\Person\Entity\Person;
use Symfony\Component\Form\DataTransformerInterface;

/***
 * Преобразователь объекта персоны.
 */
class PersonViewTransformer implements DataTransformerInterface
{

    /***
     * @param Person|null $value
     * @return array
     */
    public function transform( mixed $value ):array
    {
        return (empty($value)) ? [] : [
            'surname' => $value->getSurname(),
            'firstname' => $value->getFirstname(),
            'patronymic' => $value->getPatronymic(),
            'gender' => $value->getGender()?->value ?? 0,
            'birthDate' => $value->getBirthDate()
        ];
    }

    /**
     * @param array $value
     * @return Person|null
     */
    public function reverseTransform(mixed $value):?Person
    {
        if(!is_array($value) || !isset($value["surname"]) || !isset($value["firstname"])|| !isset($value["patronymic"]))
            return null;

        return $this->createPersonModel($value["gender"] ?? null)
            ->setSurname($value["surname"])
            ->setFirstname($value["firstname"])
            ->setPatronymic($value["patronymic"])
            ->setBirthDate($value["birthDate"]);
    }

    protected function createPersonModel( $gender ):Person
    {
        return  (new Person())->setGender( Gender::tryFrom( $gender ));
    }
}