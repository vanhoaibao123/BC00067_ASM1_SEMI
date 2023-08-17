<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SanPham;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    #[Route('/productdetail', name: 'app_product_detail')]
    public function productdetail(Request $req, EntityManagerInterface $em): Response
    {
        $id = $req->query->get('product_id');
        $sp = $em->find(SanPham::class, $id);
        
        return $this->render('product/detail.html.twig', [
            'data' => $sp,
        ]);
    }
    
}
