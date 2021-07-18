<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            // ->add('account_number')
            // ->add('open_date')
            // ->add('close_date')
            ->add('content')
            ->add('deadline')
            ->add('active', null, [
                'label' => 'Terminé',
            ])
            // ->add('user')
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-dark text-white'],
                'row_attr' => ['class' => 'text-center']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
