<?php

namespace gestionefinanziaria\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints as Assert;
// Da aggiungere se ridefinisci un tipo di campo del form
use Symfony\Component\OptionsResolver\OptionsResolver;

class FatturaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
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
                // in attr setto direttamente la proprietà del css, volendo potrei associargli un css
                // con 'attr' => array('class' => 'myclass')
                ->add('descrizione', TextType::class, [
                    'label'       => 'Oggetto ',
                    'label_attr' => array('class' => 'CUSTOM_LABEL_CLASS'),
                    'attr' => array('style' => 'width: 90%'),
                    'required' => true,
                    'constraints' => new Assert\NotBlank(),
                ])
                        
                // aggiungo tendina ditta1 - contiene elenco oggetti ditta
                // scelgo di visualizzare la descrizione tramite 'choice_label' => 'denominazione',
                // per impostare il valore di default della tendina:
                // 'choice_value' => 'id_ditta', indica quale valore considerare come indice
                // 'attr' => array('class' => 'id_ditta'), indica
                // 'data' => $options['data']->getDitta1(), recupera il valore da impostare come default
                ->add('ditta1', ChoiceType::class, array(
                    'label'       => 'Emessa da ',
                    'label_attr' => array('class' => 'CUSTOM_LABEL_CLASS'),
                    'choices' => $options['elenco'],
                    'choice_label' => 'denominazione',
                    'choice_value' => 'id_ditta',
                    'attr' => array('class' => 'id_ditta'),
                    'data' => $options['data']->getDitta1(),
                ))

                // aggiungo tendina ditta2 - contiene elenco oggetti ditta
                // scelgo di visualizzare la descrizione tramite 'choice_label' => 'denominazione',
                ->add('ditta2', ChoiceType::class, array(
                    'label'       => 'Cliente ',
                    'label_attr' => array('class' => 'CUSTOM_LABEL_CLASS'),
                    'choices' => $options['elenco'],
                    'choice_label' => 'denominazione',
                    'choice_value' => 'id_ditta',
                    'attr' => array('class' => 'id_ditta'),
                    'data' => $options['data']->getDitta2(),
                 ))

                ->add('dataFattura', DateType::class, array(
                    'widget' => 'single_text',
                    // this is actually the default format for single_text
                    'format' => 'yyyy-MM-dd',
                ))
        ;
    }

    public function getName() {
        return 'fattura';
    }

    // Funzione per recepire quanto passato come options vedi in routes.php:
    // $fatturaForm = $app['form.factory']->create(FatturaType::class, $fattura, array('elenco' => $elencoDitteSelect));
    public function configureOptions(OptionsResolver $resolver)
{
    $resolver
        ->setDefault('elenco', null)
        ->setRequired('elenco')
        ->setAllowedTypes('elenco', array('array'))   
    ;
}
   

}
