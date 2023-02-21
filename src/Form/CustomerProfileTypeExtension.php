<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sylius\Bundle\CustomerBundle\Form\Type\GenderType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Sylius\Bundle\CustomerBundle\Form\Type\CustomerProfileType;
use Symfony\Contracts\Translation\TranslatorInterface;

final class CustomerProfileTypeExtension extends AbstractTypeExtension
{
    public function __construct(private TranslatorInterface $translator)
    {}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('secondary_phone_number', TextType::class, [
                'required' => false,
                'label' => ('sylius.form.customer.secondary_phone_number'),
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [CustomerProfileType::class];
    }
}
