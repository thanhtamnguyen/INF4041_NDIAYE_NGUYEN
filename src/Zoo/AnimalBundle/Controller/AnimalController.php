<?php

namespace Zoo\AnimalBundle\Controller;

use Zoo\AnimalBundle\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AnimalController extends Controller
{
    public function listAction()
    {   /*
        * Get all animals from DB
        * Return list into list.html.twig
        */
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AnimalBundle:Animal');

        $listAnimals = $repository->findAll();

        return $this->render('AnimalBundle:AnimalView:list.html.twig',
                        array('listAnimals' => $listAnimals));
    }
    
    public function showAction($id)
    {   /*
        * Get one animal from DB with its $id
        * Return it into show.html.twig
        */
        $animal = $this
            ->getDoctrine()
            ->getRepository('AnimalBundle:Animal')
            ->find($id);
        return $this->render('AnimalBundle:AnimalView:detail.html.twig',
                        array('animal' => $animal));
    }
    
    public function addAction()
    {   $request = $this->getRequest();
        $animal = new Animal();

        // Family, Species, Class as ArrayCollection later
        $formBuilder = $this
            ->get('form.factory')
            ->createBuilder('form', $animal)
            ->add('name',    'text')
            ->add('species', 'text', array('required' => false))
            ->add('family',  'text', array('required' => false))
            ->add('class',   'text', array('required' => false))
            ->add('weight',  'number', array('required' => false))
            ->add('height',  'number', array('required' => false))
            ->add('age',     'integer', array('required' => false))
            ->add('save',    'submit');
     
        $form = $formBuilder->getForm();
        
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this
                ->getDoctrine()
                ->getManager();
            $em->persist($animal);
            $em->flush();

            $request
                ->getSession()
                ->getFlashBag()
                ->add('notice', 'Animal enregistré.');

            // On redirige vers la page de visualisation de l'annonce nouvellement créée
            return $this->redirect(
                $this->generateUrl('animal_show', 
                                   array('id' => $animal->getId()))
            );
        }
     
     
        return $this->render('AnimalBundle:AnimalView:add.html.twig',
             array('form' => $form->createView()));
    }
    
    public function editAction($id)
    {
        $request = $this->getRequest();
        $animal = $this->getDoctrine()
            ->getManager()
            ->getRepository('AnimalBundle:Animal')
            ->find($id);
        
        if (!$animal) {
            throw $this->createNotFoundException('No animal found for id '.$id);
        }
        else{
            // Family, Species, Class as ArrayCollection later
            $formBuilder = $this
                ->get('form.factory')
                ->createBuilder('form', $animal)
                ->add('name',    'text')
                ->add('species', 'text')
                ->add('family',  'text')
                ->add('class',   'text')
                ->add('weight',  'number')
                ->add('height',  'number')
                ->add('age',     'integer')
                ->add('save',    'submit');

            $form = $formBuilder->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($animal);
                $em->flush();

                $request
                    ->getSession()
                    ->getFlashBag()
                    ->add('notice', 'Animal enregistré.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirect(
                    $this->generateUrl('animal_show', 
                                       array('id' => $animal->getId()))
                );
            }

            return $this->render('AnimalBundle:AnimalView:edit.html.twig',
                 array('form' => $form->createView()));
        }
    }
    
    public function removeAnimalAction($id)
    {
        /*
        * Remove Animal
        */
        $em = $this
            ->getDoctrine()
            ->getEntityManager();
        $animal = $em
            ->getRepository('AnimalBundle:Animal')
            ->find($id);
        $em->remove($animal);
        $em->flush();

        return $this->redirect($this->generateUrl('animal_list'));
    }
}
