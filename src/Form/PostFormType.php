<?php

namespace App\Form;

use App\Entity\Post;
use App\Form\Type\CustomCheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('isPrivate', CheckboxType::class)
            ->add('tag', CustomCheckboxType::class, [
                'mapped' => false,
                'choices' => [
                    'one' => 'one',
                    'two' => 'two',
                    'three' => 'three',
                    'four' => 'four',
                ],
                'extra' => [
                    'one' => [
                        'icon' => null,
                        'subtitle' => 'This is the subtext for Choice 1',
                    ],
                    'two' => [
                        'icon' => null,
                        'subtitle' => 'This is the subtext for Choice 1',
                    ],
                    'three' => [
                        'icon' => null,
                        'subtitle' => 'This is the subtext for Choice 3',
                    ],
                    'four' => [
                        'icon' => null,
                        'subtitle' => 'This is the subtext for Choice 3',
                    ],
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
