<?php

namespace AppBundle\Configurator;

use Doctrine\ORM\EntityManager;

use AppBundle\Form\UserAdminType;
use Idk\LegoBundle\AdminList\FilterType\ORM;
use Idk\LegoBundle\AdminList\Configurator\AbstractDoctrineORMAdminListConfigurator;
use Doctrine\ORM\QueryBuilder;

/**
 * The admin list configurator for User
 */
class UserConfigurator extends AbstractDoctrineORMAdminListConfigurator
{
    /**
     * @param EntityManager $em        The entity manager
     * @param AclHelper     $aclHelper The acl helper
     */
    public function __construct($container)
    {
        parent::__construct($container);
        $this->setAdminType(new UserAdminType());
        /* 
        Ne pas utilisé de fonction 'add*' ici
        Use:
            buildFilters()
            buildFields()
            buildExportFields()
            showFields()
            showSubLists()
            showOnglets()
            editFormFields()
            newFormFields()
            formFields()
            buildItemActions()
            buildListActions()
            buildBulkActions()
            buildRupteurs()
            buildHtml()
        */
    }

    /**
     * Configure the visible columns
     */
    public function buildFields()
    {
        $this->addField('username');
    }



        /**
     * Configure the visible field in show
     */
    public function showFields()
    {
        $this->addShowGroup(6); //groupe de 6 colonnes (col-md-6)
    }


        /**
     * Configure the ordrer and group of form
     */
    public function formFields()
    {
    }

    /**
     * Build filters for admin list
     */
    public function buildFilters()
    {
    }

    /**
     * Get bundle name
     *
     * @return string
     */
    public function getBundleName()
    {
        return 'AppBundle';
    }

    /**
     * Get entity name
     *
     * @return string
     */
    public function getEntityName()
    {
        return 'User';
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return 'Gestion des user';
    }

    /* //avec variable template = 'show|list|add|edit'
    public function getScriptTemplate(){
      return 'AppBundle:User:_script.html.twig';
    }
    */
}
