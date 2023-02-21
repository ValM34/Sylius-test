<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_customer")
 */
class Customer extends BaseCustomer
{
  /** @ORM\Column(type="string", nullable=true) */
  private $secondary_phone_number;

  public function getSecondaryPhoneNumber(): ?string
  {
      return $this->secondary_phone_number;
  }

  public function setSecondaryPhoneNumber(string $secondary_phone_number): void
  {
      $this->secondary_phone_number = $secondary_phone_number;
  }
}
