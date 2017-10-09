<?php

namespace gestionefinanziaria\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

class FatturaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $fattura = $options['data']['Fattura'];
        $elencoDitteSelect = $options['data']['elencoDitteSelect'];
                
        $builder
                ->add('numFattura', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\NotNull(),
                    //new Assert\Type(array('type' => 'integer',
                    //    'message' => 'The value {{ value }} is not a valid {{ type }}.',))
                    )
                ))
                ->add('descrizione', TextareaType::class, array(
                    'required' => true,
                    'constraints' => new Assert\NotBlank(),
                ))
               ->add('ditta1', ChoiceType::class, array(
                    'choices' => $elencoDitteSelect,
                ))
                ->add('ditta2', ChoiceType::class, array(
                    'choices' => $elencoDitteSelect,
                ))

                ->add('dataFattura', ChoiceType::class, array(
                    'choices' => array(
                        'Maybe' => null,
                        'Yes' => true,
                        'No' => false,
                    ),
                ))
        //->add('ditta1', ChoiceType::class, array('ditta' => array('Admin' => '1', 'User' => '2')))
        ;
    }

    public function getName() {
        return 'fattura';
    }

}
