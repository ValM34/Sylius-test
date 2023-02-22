<?php

namespace App\Entity\Blog;

use App\Repository\BlogCommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use App\Entity\Customer\Customer;

/**
 * BlogComment
 *
 * @ORM\Table(name="blog_comment")
 * @ORM\Entity(repositoryClass="Repository/BlogCommentRepository")
 */
class BlogComment implements ResourceInterface
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column()
   */
  private ?int $id = null;

  /**
   * @ORM\ManyToOne(inversedBy="blog_comments")
   * @ORM\JoinColumn(nullable=false, onDelete="CASCADE", name="id_customer")
   */
  private ?Customer $customer;

  /**
   * @ORM\ManyToOne(inversedBy="blog_comments")
   * @ORM\JoinColumn(nullable=false, onDelete="CASCADE", name="id_blog_post")
   */
  private ?BlogPost $blogPost;

  /**
   * @ORM\Column()
   */
  private ?bool $status;

  /**
   * @ORM\Column()
   */
  private ?\DateTimeImmutable $updated_at = null;

  /**
   * @ORM\Column()
   */
  private ?\DateTimeImmutable $created_at = null;

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
    return $this->customer = $customer;
  }

  public function getBlogPost(): ?BlogPost
  {
    return $this->blogPost;
  }

  public function setBlogPost($blogPost): self
  {
    return $this->blogPost = $blogPost;
  }

  public function getStatus(): ?bool
  {
    return $this->status;
  }

  public function setStatus($status): self
  {
    return $this->status = $status;
  }

  public function getUpdatedAt(): ?\DateTimeImmutable
  {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at): self
  {
    return $this->updated_at = $updated_at;
  }

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->created_at;
  }

  public function setCreatedAt($created_at): self
  {
    return $this->created_at = $created_at;
  }
}
