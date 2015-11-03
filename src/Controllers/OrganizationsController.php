<?php

namespace Controllers;

use Entity\Organization;
use Layer\Manager\OrganizationManager;

class OrganizationsController
{
    private $manager;
    private $loader;
    private $twig;

    public function __construct($connector)
    {
        $this->manager = new OrganizationManager($connector);
        $this->loader = new \Twig_Loader_Filesystem('../src/Views/templates/');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => false,
        ));
    }

    public function indexAction()
    {
        $organizationsData = $this->manager->findAll();
        return $this->twig->render('organizations.html.twig', ['organizations' => $organizationsData]);
    }

    public function newAction()
    {
        if (isset($_POST['nameOrganization'])) {
        
            $organization = new Organization();
            $organization->setNameOrganization($_POST['nameOrganization']);
            $organization->setCode($_POST['code']);
            $organization->setAddress($_POST['address']);
            $organization->setDirector($_POST['director']);
            $organization->setPhone($_POST['phone']);
            $organization->setDescription($_POST['description']);

            $this->manager->insert($organization);

            return $this->indexAction();
        }
        return $this->twig->render('organizations_form.html.twig',
            [
                'nameOrganization' => '',
                'code' => '',
                'address' => '',
                'director' => '',
                'phone' => '',
                'description' => ''
            ]
        );
    }

    public function editAction()
    {
        if (isset($_POST['nameOrganization'])) {
            $organization = new Organization();
            $organization->setNameOrganization($_POST['nameOrganization']);
            $organization->setAddress($_POST['address']);
            $organization->setCode($_POST['code']);
            $organization->setDirector($_POST['director']);
            $organization->setPhone($_POST['phone']);
            $organization->setDescription($_POST['description']);

            $this->manager->update((int)$_GET['id'], $organization);

            return $this->indexAction();
        }

        $organizationsData = $this->manager->find((int)$_GET['id'])[0];

        return $this->twig->render('organizations_edit.html.twig',
            [
                'nameOrganization' => $organizationsData['nameOrganization'],
                'address' => $organizationsData['address'],
                'code' => $organizationsData['code'],
                'director' => $organizationsData['director'],
                'phone' => $organizationsData['phone'],
                'description' => $organizationsData['description'],
                'id' => $_GET['id']
            ]
        );
    }

    public function deleteAction()
    {
        if (isset($_POST['id'])) {
            $this->manager->remove((int)$_POST['id']);
            return $this->indexAction();
        }
        $organizationsData = $this->manager->find((int)$_GET['id'])[0];
        return $this->twig->render('organizations_delete.html.twig',
            [
                'nameOrganization' => $organizationsData['nameOrganization'],
                'address' => $organizationsData['address'],
                'organization_id' => $_GET['id']
            ]
        );
    }
}