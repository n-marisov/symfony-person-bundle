<?php

namespace Maris\Symfony\Person\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/***
 * Форма с полями персоны.
 */
class PersonFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder
            ->add('surname',TextType::class,[
                "label"=>"person.form.surname",
                "attr"=>[
                    "class"=>"form-control",
                    "placeholder"=>"person.form.surname",
                    "autocomplete"=>"off"
                ],
            ])
            ->add('firstname',TextType::class,[
                "label" => "person.form.firstname",
                "attr"=>[
                    "class"=>"form-control",
                    "placeholder" => "person.form.firstname",
                    "autocomplete"=>"off"
                ],
            ])
            ->add('patronymic',TextType::class,[
                "label"=>'person.form.patronymic',
                "attr"=>[
                    "class"=>"form-control",
                    "placeholder" => 'person.form.patronymic',
                    "autocomplete"=>"off"
                ],
            ])

            ->add('gender',ChoiceType::class,[
                "label"=> 'person.form.gender.title',
                "attr"=>[
                    "class"=>"form-control",
                    "placeholder" => 'person.form.gender.title',
                    "autocomplete"=>"off"
                ],
                "choices"=>[
                    'person.form.gender.items.unknown' => 0,
                    'person.form.gender.items.man' => 1,
                    "person.form.gender.items.girl" => -1
                ],
                "required"=>true,
            ])
            ->add('birthDate',DateType::class,[
                "label"=> 'person.form.birth_date',
                "attr"=>[
                    "class"=>"form-control",
                    "placeholder"=>'person.form.birth_date',
                    "autocomplete"=>"off"
                ],
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ]);
        $builder->addViewTransformer( new PersonViewTransformer() );
    }
}