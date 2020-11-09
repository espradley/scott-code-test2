<?php
namespace Gorilla\Contact\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Contact extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('gorilla_contact', 'entity_id');
    }
}
