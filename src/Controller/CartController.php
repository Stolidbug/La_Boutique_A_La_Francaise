<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mon-panier")
     */
    public function index(Cart $cart): Response
    {
        $cartComplet = [];

        if ($cart->get())
        {
            foreach ($cart->get() as $id =>$quantity) {
                $cartComplet[]= [
                    'product' => $this->entityManager->getRepository(Product::class)->findOneById($id),
                    'quantity'=> $quantity
                ];
            }

        }


        return $this->render('cart/index.html.twig', [
            'cart'=> $cartComplet
        ]);
    }

    /**
     * @Route("cart/add/{id}")
     */
    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);

        return $this->redirectToRoute('app_cart_index');
    }

    /**
     * @Route("cart/remove")
     */
    public function remove(Cart $cart): Response
    {
        $cart->remove();

        return $this->redirectToRoute('app_home_index');
    }

    /**
     * @Route("cart/delete/{id}")
     */
    public function delete(Cart $cart, $id): Response
    {
        $cart->delete($id);

        return $this->redirectToRoute('app_cart_index');
    }

    /**
     * @Route("cart/decrease/{id}")
     */
    public function decrease(Cart $cart, $id): Response
    {
        $cart->decrease($id);

        return $this->redirectToRoute('app_cart_index');
    }
}
