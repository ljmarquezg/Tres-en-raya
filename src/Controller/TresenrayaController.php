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
        return $this->render('tresenraya/index.html.twig', [
            'listado' => $listado,  
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
     * @Route("/partida/reiniciar/{id}", name="movimiento")
     * @Method({ "POST", "GET" })
     */
    public function reiniciar(Request $request, $id){

        $juego = $this->getDoctrine()->getRepository(Juego::class)->find($id);
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

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($juego);
        $entityManager->flush();
        return $this->redirectToRoute('partida', array('id' => $juego->getId()));
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
            // ->add(
            //     'update',
            //     SubmitType::class
            // )
            ->getForm();

            $form->handleRequest($request);

            $response = $this->verificar($juego->getId());
                switch ($response['mensaje']){
                    case "En curso":
                        $mensaje = $response['mensaje'];
                        $juego->setEstado('En curso');
                        $juego->setGanador(0);
                    break;

                    case "Empate":
                        $mensaje = $response['mensaje'];
                        $juego->setEstado('Empate');
                        $juego->setGanador(3);
                    break;

                    case "Game Over":
                        $mensaje = "Ganador Jugador".$response['ganador'];
                        $juego->setEstado('El ganador es: '.$response['ganador']);
                        $juego->setGanador($response['ganador']);
                        break;

                    default:
                        $mensaje = 'En curso';
                        $juego->setEstado('En curso');
                        $juego->setGanador(0);
                    break;
                }

                if( $form->isSubmitted() && $form->isValid() ){
                    $form = $form->getData();
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->flush();
                    return $this->redirectToRoute('partida', array(
                        'id' => $id,
                    ));
                }
                return $this->render('/tresenraya/partida.htlm.twig', array(
                    'form' => $form->createView(),
                    'juego' => $juego,
                    'tablero'=> $tablero,
                    'estado' => $mensaje,
                    'linea' => $response['linea']
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

    public function verificar($id){
        $status['mensaje'] = "En curso";
        $status['ganador'] = 0;
        $status['linea'] = "";
        $juego = $this->getDoctrine()->getRepository(Juego::class)->find($id);
        $tablero  = [ $juego->getPos1(), $juego->getPos2(),  $juego->getPos3(), 
                      $juego->getPos4(), $juego->getPos5(), $juego->getPos6(), 
                      $juego->getPos7(), $juego->getPos8(), $juego->getPos9()
                     ];  
        if ($status['mensaje'] == "En curso" && $juego->getTurnos() == 0){
            $status['mensaje'] = 'Empate';
            $status['ganador'] = 'Empate';
        }
        /**
         * Verificar filas;
        */
        for($i=0; $i < 9; $i= $i+3){
            if (($tablero[$i] == 1 || $tablero[$i] == 2) && $tablero[$i] == $tablero[$i+1] &&  $tablero[$i+1] == $tablero[$i+2] ){
                $status['linea'] = 'Fila'.$i;
                $status['mensaje'] = 'Game Over';
                $status['ganador'] = $tablero[$i];
            }
        }
        /**
         * Verificar columnas;
        */
        for($i=0; $i < 3; $i++){
            if (($tablero[$i] == 1 || $tablero[$i] == 2) && $tablero[$i] == $tablero[$i+3] &&  $tablero[$i+3] == $tablero[$i+6] ){
                $status['linea'] = 'Columna'.$i;
                $status['mensaje'] = 'Game Over';
                $status['ganador'] = $tablero[$i];
            }
        }
       /**
         * Verificar Diagonales
         */
        if ( ($tablero[0] == 1 || $tablero[0] == 2) && $tablero[0] == $tablero[4] &&  $tablero[4] == $tablero[8] ){
            $status['linea'] = 'Diagonal1';
            $status['mensaje'] = 'Game Over';
            $status['ganador'] = $tablero[0];
        }else if ( ($tablero[2] == 1 || $tablero[2] == 2) && $tablero[2] == $tablero[4] &&  $tablero[4] == $tablero[6] ){
            $status['linea'] = 'Diagonal2';
            $status['mensaje'] = 'Game Over';
            $status['ganador'] = $tablero[2];
        };
        return $status;
    }

}
