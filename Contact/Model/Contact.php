<?php
namespace Gorilla\Contact\Model;

class Contact extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Gorilla\Contact\Model\ResourceModel\Contact');
    }
}
