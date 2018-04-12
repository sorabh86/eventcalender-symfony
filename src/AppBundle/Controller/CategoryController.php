<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\BrowserKit\Response;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoryController extends Controller {
    /**
     * @Route("/categories", name="category_list")
     */
    public function indexAction(Request $request)
    {  
        // fetch query
        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        // render template
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/create", name="category_create")
     */
    public function createAction(Request $request) {
        $category = new Category;

        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('save', SubmitType::class, array('label' => 'Create Category', 'attr' => array('class' => 'btn btn-secondary')))
            ->getForm();

        // handle request
        $form->handleRequest($request);

        // Check Submit
        if($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            // die($name);

            // get current Date and time
            $now = new \DateTime('now');

            $category->setName($name);
            $category->setCreateDate($now);

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $this->addFlash(
                'notice',
                'Category Saved'
            );

            return $this->redirectToRoute('category_list');
        }

        // render Template
        return $this->render('category/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/category/edit/{id}", name="category_edit")
     */
    public function editAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('category/edit.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/category/delete/{id}", name="category_delete")
     */
    public function deleteAction(Request $request) {
        $content = array();
        return new Response($content);
    }
}
