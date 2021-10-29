<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\ImageEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
            )
            ->add(
                'file',
                FileType::class,
                [
                    'label' => 'Image',
                    'constraints' => [
                        new File([
                            'mimeTypes' => ImageEntity::$allowedMimeTypes,
                            'mimeTypesMessage' => 'Please upload a valid image file',
                        ])
                    ],
                ]
            )
            ->add(
                'submit',
                SubmitType::class
            );
    }
}
