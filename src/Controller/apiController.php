<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Bien;
use App\Entity\Localite;
use App\Entity\TypeBien;
use App\Entity\Client;
use App\Entity\Reservation;

/**
 * Brand controller.
 *
 * @Route("/api")
 */
class apiController extends Controller
{
    /**
     * Lists all Biens.
     *
     * @FOSRest\Get("/allBiens")
     *
     * @return array
     */
    public function getBiensAction()
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);
        $biens = $repository->findall();

        if (empty($biens)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        foreach ($biens as $key => $value) {
            foreach ($value->getImages() as $key1 => $images) {
                $images->setImage(base64_encode(stream_get_contents($images->getImage())));
            }
        }

        $data = $this->get('jms_serializer')->serialize($biens, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

    /**
     * Lister un bien.
     *
     * @FOSRest\Get("/bien/{id}")
     *
     * @return array
     */
    public function getBienAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);
        $biens = $repository->find($id);

        if (empty($biens)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        foreach ($biens->getImages() as $key => $image) {
            $image->setImage(base64_encode(stream_get_contents($image->getImage())));
        }

        $data = $this->get('jms_serializer')->serialize($biens, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

    /**
     * Ajouter réservation.
     *
     * @FOSRest\GET("/alllocalite")
     *
     * @return array
     */
    public function localiteAction()
    {
        $repository = $this->getDoctrine()->getRepository(Localite::class);
        $localite = $repository->findall();

        if (empty($localite)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        $data = $this->get('jms_serializer')->serialize($localite, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

    /**
     * Ajouter réservation.
     *
     * @FOSRest\GET("/alltype")
     *
     * @return array
     */
    public function typeAction()
    {
        $repository = $this->getDoctrine()->getRepository(TypeBien::class);
        $types = $repository->findall();

        if (empty($types)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        $data = $this->get('jms_serializer')->serialize($types, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

    /**
     * Lists all Biens.
     *
     * @FOSRest\Post("/search")
     *
     * @return array
     */
    public function serchAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);
        $biens = $repository->search($request->get("localite"), $request->get("type"), $request->get("budget"));

        if (empty($biens)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        // foreach ($biens as $key => $value) {
        //     foreach ($value->getImages() as $key1 => $images) {
        //         $images->setImage(base64_encode(stream_get_contents($images->getImage())));
        //     }
        // }

        $data = $this->get('jms_serializer')->serialize($biens, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

    /**
     * Lists all Biens.
     *
     * @FOSRest\Post("/addreservation/{idBien}")
     *
     * @return array
     */
    public function addReservationAction(Request $request, $idBien)
    {
        	$em = $this->getDoctrine();

        $bien = $em->getRepository(Bien::class)->find($idBien);

        $data = $request->getContent();
        $client = $this->get('jms_serializer')->deserialize($data, "App\Entity\Client", 'json');
        $em->getManager()->persist($client);

        if (empty($client || !$bien)) {
            return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
        }

        $reservation = new Reservation();
        $reservation->setBien($bien)
        ->setClient($client)
        ->setEtat(1)
        ->setDatereservation(new \DateTime());

        $em->getManager()->persist($reservation);
        $em->getManager()->flush();

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => null,
        );

        return new JsonResponse($response, Response::HTTP_CREATED);

    }


    /**
     * Lists all Biens.
     *
     * @FOSRest\Get("/biensType/{idBien}/{idLocalite}")
     *
     * @return array
     */
    public function getBiensTypeAction($idBien, $idLocalite)
    {
        $repository = $this->getDoctrine()->getRepository(Bien::class);
        $biens = $repository->bienType($idBien, $idLocalite);

        if (empty($biens)) {
            $reponse = array(
                'code' => 1,
                'Message' => 'Pas de resultat',
                'error' => null,
                'result' => null,
            );

            return new JsonResponse($reponse, Response::HTTP_NOT_FOUND);
        }

        foreach ($biens as $key => $value) {
            foreach ($value->getImages() as $key1 => $images) {
                $images->setImage(base64_encode(stream_get_contents($images->getImage())));
            }
        }

        $data = $this->get('jms_serializer')->serialize($biens, 'json');

        $response = array(
            'code' => 0,
            'Message' => 'success',
            'error' => null,
            'result' => json_decode($data),
        );

        return new JsonResponse($response, 201);
    }

}
