<?php

namespace Shop\MovieBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Shop\MovieBundle\Entity\Movie;
use Shop\MovieBundle\Entity\Review;
use Shop\MovieBundle\Entity\Purchase;
class DefaultController extends Controller
{

	 /**
     * Tworzy nową recenzje
     *
     * @Route("/review/new", name="review_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();

        // pobieramy obiekt filmu
        $movie = $em->getRepository('ShopMovieBundle:Movie')->findOneById($this->get('request')->request->get('movie_id'));
        /*
			Ustawiamy parametry recenzji
        */

        $entity = new Review();
        $entity->setReview($this->get('request')->request->get('review'));
        $entity->setMovie($movie);
        $entity->setGrade(10);

        
        $entity->setUser($this->getUser());
        $movie->addReview($entity);
        $em->persist($entity);
        $em->flush();
        // Zwracamy odpowiedź
        return new Response('Dodałem recenzje');
    }

	 /**
     * Tworzy Nowy zakup
     *
     * @Route("/purchase/new", name="purchase_create")
     * @Method("POST")
     */
    public function createPurchaseAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();

        //pobieranie obiektu filmu
        $movie = $em->getRepository('ShopMovieBundle:Movie')->findOneById($this->get('request')->request->get('movie_id'));
        $entity = new Purchase();
        //ustawianie danych
        $entity->setEmail($this->get('request')->request->get('email'));
        $entity->setMovie($movie);
        $entity->setUser($this->getUser());

        $movie->addPurchase($entity);
        $em->persist($entity);
        $em->flush();
        // Zwracamy odpowiedź
        return new Response('Dodałem zakup');
    }

    /**
     * Pobieranie wszystki zakupów z bazy
     *
     * @Route("/purchase", name="purchase")
     * @Method("GET")
     * @Template("ShopMovieBundle:Purchase:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        // pobieranie wszystkich rekordów
        $entities = $em->getRepository('ShopMovieBundle:Purchase')->findAll();

        return array(
            'entities' => $entities,
        );
    }
}
