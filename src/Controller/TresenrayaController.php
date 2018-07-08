<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Juego;


class TresenrayaController extends Controller
{
    public $juego;
    /**
     * @Route("/", name="index")
     */
    public function index()
    {   
        $listado = $this->getDoctrine()->getRepository(Juego::class)->findAll();
        $this->juego['tablero'] = [1,1,1,2,2,2,0,0,0];
        return $this->render('tresenraya/index.html.twig', [
            'controller_name' => 'TresenrayaController',
            'tablero' => $this->juego,
            'listado' => $listado
        ]);
    }

    /**
     * @Route("/nuevo", name="nuevo")
     */
    public function nuevoJuego()
    {   
        $entityManager = $this->getDoctrine()->getManager();
        $juego = new Juego();

        $juego->setJugador(1);
        $juego->setTurnos(9);
        $juego->setEstado("En curso");
        $juego->setGanador(0);
        $juego->setPos1(0);
        $juego->setPos2(0);
        $juego->setPos3(0);
        $juego->setPos4(0);
        $juego->setPos5(0);
        $juego->setPos6(0);
        $juego->setPos7(0);
        $juego->setPos8(0);
        $juego->setPos9(0);
    
        $entityManager->persist($juego);
        $entityManager->flush();
        return $this->redirectToRoute('partida', array('id' => $juego->getId()));
    }

    /**
     * @Route("partida/movimiento/{id}", name="movimiento")
     * @Method({ "POST", "GET" })
     */
    // public function movimiento(Request $request, $id){

    //     $juego = new Juego();
    //     $juego = $this->getDoctrine()->getRepository(Juego::class)->find($id);

    //     $form = $this->createFormBuilder($juego)
    //         ->add(
    //             'pos1',
    //             TextType::class, 
    //                 [
    //                     'attr' =>[
    //                         'class'=>'form-control',
    //                        'id'=>'pos1',
    //                        'value' => $request->query->get('pos1')
    //                     ],
    //                 ]
    //         )
    //         ->add(
    //             'pos2',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos2',
    //                     'value' => $request->query->get('pos2')
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos3',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos3',
    //                     'value' => $request->query->get('pos3')
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos4',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos4',
    //                     'value' => $request->query->get('pos4')
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos5',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos5',
    //                     'value' => $request->query->get('pos5')
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos6',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos5',
    //                     'value' => $request->query->get('pos6')
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos7',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos5'
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos8',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos5'
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'pos9',
    //             TextType::class,
    //             [
    //                 'attr'=>[
    //                     'class'=>'form-control',
    //                     'id' => 'pos5'
    //                 ],
    //             ]
    //         )
    //         ->add(
    //             'save',
    //             SubmitType::class,
    //             [   
    //                 'label' => 'Update',
    //                 'attr'=>['class'=> 'btn btn-primary mt-3']
    //             ]
    //         )
    //         ->getForm();

    //         $form->handleRequest($request);

    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->flush();
    //         $response = new Response('OK');
    //         return $response;
    //         // return $this->redirectToRoute('partida', array('id' => $id));       
    //  }


    public function movimiento(Request $request, $id){
        $juego = new Juego();
        $juego = $this->getDoctrine()->getRepository(Juego::class)->find($id);
        $tablero[0] = $this->obtenerIcono($juego->getPos1());
        $tablero[1] = $this->obtenerIcono($juego->getPos2());
        $tablero[2] = $this->obtenerIcono($juego->getPos3());
        $tablero[3] = $this->obtenerIcono($juego->getPos4());
        $tablero[4] = $this->obtenerIcono($juego->getPos5());
        $tablero[5] = $this->obtenerIcono($juego->getPos6());
        $tablero[6] = $this->obtenerIcono($juego->getPos7());
        $tablero[7] = $this->obtenerIcono($juego->getPos8());
        $tablero[8] = $this->obtenerIcono($juego->getPos9());
    
        $form = $this->createFormBuilder($juego)
            ->add(
                'pos1',
                TextType::class, 
                    [
                        'attr' =>[
                            'class'=>'form-control',
                           'id'=>'pos1',
                        ],
                    ]
            )
            ->add(
                'pos2',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos2'
                    ],
                ]
            )
            ->add(
                'pos3',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos3'
                    ],
                ]
            )
            ->add(
                'pos4',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos4'
                    ],
                ]
            )
            ->add(
                'pos5',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos5'
                    ],
                ]
            )
            ->add(
                'pos6',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos5'
                    ],
                ]
            )
            ->add(
                'pos7',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos5'
                    ],
                ]
            )
            ->add(
                'pos8',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos5'
                    ],
                ]
            )
            ->add(
                'pos9',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'pos5'
                    ],
                ]
            )
            ->add(
                'save',
                SubmitType::class,
                [   
                    'label' => 'Update',
                    'attr'=>['class'=> 'btn btn-primary mt-3']
                ]
            )
            ->getForm();

            $form->handleRequest($request);

            if( $form->isSubmitted() && $form->isValid() ){
                $juego = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($juego);
                $entityManager->flush();
                return $this->redirectToRoute('partida', array('id' => $id));
            }

            return $this->render('/tresenraya/partida.htlm.twig', array(
                    'form' => $form->createView(),
                    'juego' => $juego,
                    'tablero'=> $tablero
                )
            );
    }

    /**
     * @Route("/partida/{id}", name="partida")
     * @Method({ "POST", "GET" })
     */
    public function partida(Request $request, $id){
        $movimientos = 0;
        $juego = new Juego();
        $juego = $this->getDoctrine()->getRepository(Juego::class)->find($id);
        $tablero[0] = $this->obtenerIcono($juego->getPos1());
        $tablero[1] = $this->obtenerIcono($juego->getPos2());
        $tablero[2] = $this->obtenerIcono($juego->getPos3());
        $tablero[3] = $this->obtenerIcono($juego->getPos4());
        $tablero[4] = $this->obtenerIcono($juego->getPos5());
        $tablero[5] = $this->obtenerIcono($juego->getPos6());
        $tablero[6] = $this->obtenerIcono($juego->getPos7());
        $tablero[7] = $this->obtenerIcono($juego->getPos8());
        $tablero[8] = $this->obtenerIcono($juego->getPos9());
        foreach ($tablero as $movimiento){
            if ($movimiento != 0){
                $movimientos ++;
            }
        }
        
        $form = $this->createFormBuilder($juego)
            ->add(
                'pos1',
                TextType::class, 
                    [
                        'attr' =>[
                            'class'=>'form-control',
                        ],
                    ]
            )
            ->add(
                'pos2',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos3',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos4',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos5',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos6',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos7',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos8',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'pos9',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                ]
            )
            ->add(
                'turnos',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                    ],
                    
                ]
            )
            ->add(
                'jugador',
                TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control',
                        'id' => 'jugador'
                    ],
                ]
            )
            ->add(
                'save',
                SubmitType::class,
                [   
                    'label' => 'Update',
                    'attr'=>['class'=> 'btn btn-primary mt-3']
                ]
            )
            ->getForm();

            $form->handleRequest($request);

            if( $form->isSubmitted() && $form->isValid() ){
                $form = $form->getData();
                // if ( $form->jugador == 1){
                //     $form->jugador = 2;
                // }else{
                //     $form->jugador  = 1;
                // }
                // $juego = $form;

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($form);
                $entityManager->flush();

                return $this->redirectToRoute('partida', array('id' => $id));
            }

            return $this->render('/tresenraya/partida.htlm.twig', array(
                    'form' => $form->createView(),
                    'juego' => $juego,
                    'tablero'=> $tablero
                )
            );
    }

    


    public function obtenerIcono($posicion){
        switch ($posicion){
            case 1:
                $posicion = 'fa fa-times';
                break;

            case 2:
                $posicion = 'fa fa-circle-o';
                break;

            default:
            $posicion = '';
        }
       return $posicion;
    }

  
}
