<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ChatBotType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('botName', TextType::class, array('label' => 'Nom'))
            ->add('description', TextareaType::class, array('label' => 'Description'))
            ->add('starterMsg', TextareaType::class, array('label' => 'Message de bienvenue'))
            ->add('closingMsg', TextareaType::class, array('label' => 'Message de cloture '))
            ->add('email', TextType::class, array('label' => 'Email de l\'administrateur'))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ChatBot'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_chatbot';
    }


}
