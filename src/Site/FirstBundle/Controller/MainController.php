<?php

namespace Site\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteFirstBundle:Main:index.html.twig');
    }
    
//    public function newsAction()
//    {
//        $em = $this->get('doctrine')->getManager();
//        $news= $em ->getRepository('SiteNewsBundle:News')->findAll(); 
//        return $this->render('SiteFirstBundle:Main:index.html.twig', array('news' => $news));
//    }
    
//    public function articleAction($id)
//    {
//        $em = $this->get('doctrine')->getManager();
//        $article = $em->getRepository('SiteNewsBundle:News') -> findOneBy(['id' => $id]);
//        if (is_null($article) || empty($article)) {
//            throw $this->createNotFoundException('Такої новини немає');
//        } else {
//            return $this->render('SiteFirstBundle:Main:index.html.twig', ['article' => $article]); 
//        }
//    }
}
