<?php
namespace App\Form;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'El título es obligatorio']),
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('content', TextareaType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'El contenido es obligatorio']),
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('image', FileType::class, [
                'label' => 'Imagen',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new NotBlank(['message' => 'La imagen es obligatoria']),
                    new File([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Por favor sube una imagen válida (JPEG o PNG)',
                    ])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('Send', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3']
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}