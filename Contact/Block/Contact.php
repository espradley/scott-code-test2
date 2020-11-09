<?php

namespace Gorilla\Contact\Block;

class Contact extends \Magento\Framework\View\Element\Template
{
    /**
     * @inheritdoc
     */
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Sign Up'));
        return $this;
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('signup/index/post', ['_secure' => true]);
    }
}
