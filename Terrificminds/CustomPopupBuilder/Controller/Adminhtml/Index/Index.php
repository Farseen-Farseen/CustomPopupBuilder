<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
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
        $resultPage->setActiveMenu('Terrificminds_CustomPopupBuilder::custombuilder');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Popup Builder'));

        return $resultPage;
    }
    protected function _isAllowed()
    {
        return true;
    }
}
