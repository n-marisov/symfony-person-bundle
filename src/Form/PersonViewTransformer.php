<?php

namespace Maris\Symfony\Person\Form;

use Maris\Symfony\Person\Entity\Girl;
use Maris\Symfony\Person\Entity\Man;
use Maris\Symfony\Person\Entity\Person;
use Maris\Symfony\Person\Model\Gender;
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
            'gender' => match ($value->getGender()){
                Gender::GIRL => -1,
                Gender::MAN => 1,
                default => 0
            },
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
        return match ( $gender ){
            1 => new Man(),
            -1 => new Girl(),
            default => new Person()
        };
    }
}