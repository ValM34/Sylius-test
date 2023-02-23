<?php

namespace App\Entity\Blog;

use App\Repository\BlogPostRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use App\Entity\Customer\Customer;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="Repository/BlogPostRepository")
 */
class BlogPost implements ResourceInterface
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column()
   */
  private ?int $id;

  /**
   * @ORM\ManyToOne(inversedBy="blog_posts")
   * @ORM\JoinColumn(nullable=false, onDelete="CASCADE", name="id_customer")
   */
  private ?Customer $customer;

  /**
   * @ORM\Column(length=150, unique=true)
   */
  private ?string $title;

  /**
   * @ORM\Column(length=150)
   */
  private ?string $chapo;

  /**
   * @ORM\Column(length=15000)
   */
  private ?string $content;

  /**
   * @ORM\Column(length=200)
   */
  private ?string $img_src;

  /**
   * @ORM\Column()
   */
  private ?bool $published = false;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getCustomer(): ?Customer
  {
    return $this->customer;
  }

  public function setCustomer($customer): self
  {
    $this->customer = $customer;

    return $this;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  public function getChapo(): ?string
  {
    return $this->chapo;
  }

  public function setChapo($chapo): self
  {
    $this->chapo = $chapo;

    return $this;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent($content): self
  {
    $this->content = $content;

    return $this;
  }

  public function getImgSrc(): ?string
  {
    return $this->img_src;
  }

  public function setImgSrc($img_src): self
  {
    $this->img_src = $img_src;

    return $this;
  }

  public function getPublished(): ?bool
  {
    return $this->published;
  }

  public function setPublished($published): self
  {
    $this->published = $published;

    return $this;
  }
}
