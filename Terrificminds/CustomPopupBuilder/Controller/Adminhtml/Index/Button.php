<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Button extends Action implements HttpGetActionInterface
{
     /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param PageFactory $resultPageFactory
     * @param Action\Context $context
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        /**
        * Set active menu item
        */
        $resultPage->setActiveMenu('Terrificminds_CustomPopupBuilder::custombuilder');
        $resultPage->getConfig()->getTitle()->prepend(__('New Popup'));

        // /**
        //  * Add breadcrumb item
        //  */
        // $resultPage->addBreadcrumb(__('Popups'), __('Popups'));
        // $resultPage->addBreadcrumb(__('Manage Popups'), __('Manage Popups'));

        return $resultPage;
    }
}
