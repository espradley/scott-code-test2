<?php

namespace Gorilla\Contact\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Gorilla\Contact\Model\ContactFactory;

class Post extends Action
{

    protected $_contactFactory;

    /**
     * Result constructor.
     * @param Context $context
     * @param ContactFactory $contactFactory
     */
    public function __construct(
        Context $context,
        ContactFactory $contactFactory
    )
    {
        parent::__construct($context);
        $this->_contactFactory = $contactFactory;
    }

    /**
     * The controller action
     *
     * @return Redirect
     */
    public function execute()
    {
        $post = $this->getRequest()->getPost();
        $model = $this->_contactFactory->create();
        if (!empty($post)) {
            try{
                $model->setFirstName($post['first_name']);
                $model->setLastName($post['last_name']);
                $model->setEmail($post['email']);
                $model->setTime(date("Y-m-d H:i:s"));
                $model->save();

                $this->messageManager->addSuccessMessage(
                    __('Thank you for signing up.')
                );
            } catch (\Magento\Framework\Exception\AlreadyExistsException $e) {
                $this->messageManager->addErrorMessage('You have already signed up with this e-mail address.');
            }
        }

        return $this->resultRedirectFactory->create()->setPath('signup');
    }
}
