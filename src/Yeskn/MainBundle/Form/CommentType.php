<?php

/**
 * This file is part of project wpcraft.
 *
 * Author: Jake
 * Create: 2018-09-16 13:52:23
 */

namespace Yeskn\MainBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Yeskn\MainBundle\Entity\Comment;
use Yeskn\MainBundle\Entity\Post;
use Yeskn\MainBundle\Entity\User;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'nickname',
            'choice_value' => 'id',
            'label' => '作者',
            'required' => true
        ]);

        $builder->add('content', TextareaType::class, [
            'label' => '内容',
            'required' => true,
        ]);

        $builder->add('post', EntityType::class, [
            'class' => Post::class,
            'required' => true,
            'choice_label' => 'title',
            'choice_value' => 'id',
            'label' => '所属文章',
            'multiple' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class
        ]);
    }
}