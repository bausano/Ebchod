<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Application\Helper\Messenger;

class IndexController extends AbstractActionController
{

    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        return parent::onDispatch($e);
    }

    public function indexAction()
    {
        return [
        ];
    }
    
    /*************************************************************************\
     | Private functions                                                          |
    \*************************************************************************/
    
    // nÁVRH:
    /*private function getTable( $table ) {
        switch( $table ) {
            case 'message':
                return $this->getServiceLocator()->get('Application\Database\MessageTable');
            default:
                // throw exception
        }
    }*/
    /**
     * Returns an isntance of message table
     * @return Application\Model\MessageTable 
     */
    private function getMessageTable()
    {
        return $this->getServiceLocator()->get('Application\Database\MessageTable');
    }
    
    /**
     * Returns an isntance of post table
     * @return Application\Model\PostTable 
     */
}

