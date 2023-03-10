<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['sanitize_html'=>true, 'label'=>'Email', 'attr'=>['placeholder'=>'Entrer votre email...']])
            ->add('phone', TelType::class, ['label'=>'Téléphone', 'attr'=>['placeholder'=>'Entrer votre numéro de téléphone...']])
            ->add('comment', TextAreaType::class, ['label'=>'Message', 'attr'=>['placeholder'=>'Entrer votre message...','rows'=>6]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
