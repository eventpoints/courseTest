<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomCheckboxType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'multiple' => true,
            'expanded' => true,
            'extra' => [],
        ]);
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $subtexts = [];
        foreach ($options['extra'] as $value => $label) {
            if (isset($options['extra'][$value])) {
                $subtexts[$value] = $options['extra'][$value];
            }
        }
        $view->vars['extra'] = $subtexts;
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'custom_checkbox';
    }
}
