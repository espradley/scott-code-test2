<?php
/**
 * Contact Form Module
 *
 * @package Gorilla_Contact
 * @author Scott Johnson
 *
 */

namespace Gorilla\Contact\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
