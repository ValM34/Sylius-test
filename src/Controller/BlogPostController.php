<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\BlogPostType;
use App\Entity\Blog\BlogPost;
use App\Repository\Blog\BlogPostRepository;
use App\Service\Blog\BlogPostServiceInterface;

class BlogPostController extends AbstractController
{
  public function __construct(private BlogPostRepository $blogPostRepository, private BlogPostServiceInterface $blogPostService)
  {}
  
  #[Route('{_locale}/blog/post', name: 'app_blog_post', methods: 'GET')]
  public function index(Request $request, BlogPost $blogPost): Response
  {
    $form = $this->createForm(BlogPostType::class, $blogPost);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid() && $this->getUser()){
      // Il faudra que je fasse en sorte que seuls les admins puissent écrire un nouvel article.
      // D'ailleurs je ferai aussi en sorte que la page de création d'article ne soit pas accessible si on n'est pas admin

      // Comme le formulaire est validé, je vais maintenant entammer la création d'un nouvel article de blog
      // Il faut donc maintenant que je vérifie si mon objet BlogPost est déjà "nourri"

      dump($blogPost);

      $this->blogPostRepository->save($blogPost);

      $this->blogPostService->create($blogPost);

      // Mon objet BlogPost est bien nourri par le formulaire, je peux donc le persist + le flush.
      $this->entityManager->persist($blogPost);
      $this->entityManager->flush();
    }

    return $this->render('blog_post/index.html.twig', [
      'controller_name' => 'BlogPostController',
      'blogPostForm' => $form->createView()
    ]);
  }
}
