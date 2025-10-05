<?php

namespace App\Form;

use App\Entity\Reserva;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fecha_hora', null, [
                'widget' => 'single_text',
                'label' => 'Fecha y Hora de la Reserva', // Texto personalizado
            ])
            ->add('num_comensales', null, [
                'label' => 'Número de Comensales', // Texto personalizado
            ])
            //no pedimos el usuario, lo asignamos automaticamente
            /*->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'label' => 'Cliente',
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reserva::class,
        ]);
    }
}
