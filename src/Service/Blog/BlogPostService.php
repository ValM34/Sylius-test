<?php

namespace App\Service\Blog;

use \DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class BlogPostService implements BlogPostServiceInterface
{
  private $entityManager;
  private $request;

  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
    $this->request = new Request();
  }

  public function create($variable)
  {
    dump($variable);
    $this->entityManager->persist($variable);
    $this->entityManager->flush();
    dd("Ca a marché !");
  }
}
