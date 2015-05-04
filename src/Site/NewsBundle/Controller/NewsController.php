<?php

namespace Site\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        $news = $em->getRepository('SiteNewsBundle:News') -> findBy([], ['id'=>'DESC']);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate( $news,
                                            $this->get('request') ->query->get('page', 1)/*page number*/,
                                            4/*limit per page*/);
        return $this->render('SiteNewsBundle:News:news.html.twig', ['news' => $pagination]);
    }
    
    public function articleAction($slug)
    {
        $em = $this->get('doctrine')->getManager();
        $article = $em->getRepository('SiteNewsBundle:News') -> findOneBy(['slug' => $slug]);
        //var_dump($article);
        if (is_null($article) || empty($article)) {
            throw $this->createNotFoundException('Запрашиваемая страница перемещена или удалена!');
        } else {
            return $this->render('SiteNewsBundle:News:article.html.twig', ['article' => $article]); 
        }
    }
    
    public function categoryAction($slug)
    {
        $em = $this->get('doctrine')->getManager();
        $cat= $em ->getRepository('SiteNewsBundle:Category')-> findOneBy(['slug' => $slug]); 
        return $this->render('SiteNewsBundle:News:category.html.twig', ['category' => $cat]);
    }
    
    public function categoriesAction()
    {
        $em = $this->get('doctrine')->getManager();
        $category = $em->getRepository('SiteNewsBundle:Category') -> findAll();
        return $this->render('SiteNewsBundle:News:categories.html.twig', ['category' => $category]); 
        
    }
    
    public function tagsAction()
    {
        $em = $this->get('doctrine')->getManager();
        $tag = $em->getRepository('SiteNewsBundle:Tag') -> findAll();
        return $this->render('SiteNewsBundle:News:tags.html.twig', ['tag' => $tag]); 
        
    }
    
    public function tagAction($slug)
    {
        $em = $this->get('doctrine')->getManager();
        $tag = $em->getRepository('SiteNewsBundle:Tag') -> findOneBy(['slug' => $slug]);
        return $this->render('SiteNewsBundle:News:tag.html.twig', ['tag' => $tag]); 
        
    }
    
//    public function listAction()
//    {
//        $em = $this->get('doctrine')->getManager();
//        $news = $em->getRepository('SiteNewsBundle:News') -> findAll();
//        $paginator = $this->get('knp_paginator');
//        $pagination = $paginator->paginate( $news,
//                                            $this->get('request') ->query->get('page', 1)/*page number*/,
//                                            3/*limit per page*/);
//        return $this->render('SiteNewsBundle:News:news.html.twig', ['news' => $pagination]);
//    }   
}
