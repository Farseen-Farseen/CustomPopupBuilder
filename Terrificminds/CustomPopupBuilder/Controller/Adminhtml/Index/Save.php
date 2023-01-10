<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Redirect;
use Terrificminds\CustomPopupBuilder\Api\PopupRepositoryInterface;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface;

class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var Session
     */
    protected Session $adminSession;

    /**
     * @var PopupRepositoryInterface
     */
    protected PopupRepositoryInterface $popupRepository;

    /**
     * @var PopupInterface
     */
    protected PopupInterface $popupInterface;

    public function __construct(
        Context $context,
        Session $adminSession,
        PopupRepositoryInterface $popupRepository,
        PopupInterface $popupInterface
    ) {
        parent::__construct($context);
        $this->adminSession = $adminSession;
        $this->popupRepository = $popupRepository;
        $this->popupInterface = $popupInterface;
    }

    /**
     * Save Resource data action
     *
     * @return Redirect
     *
     * phpcs:disable Generic.Files.LineLength.TooLong
     * phpcs:disable Magento2.Files.LineLength.MaxExceeded
     */
    public function execute(): Redirect
    {
        $data = $this->getRequest()->getPostValue();
        
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $resource_id = $this->getRequest()->getParam('id');
           
            if ($resource_id) {
                $this->popupRepository->getById($resource_id);
            }
            $resources = $this->popupInterface->setData($data);

            try {
                $this->popupRepository->save($resources);
                $this->messageManager->addSuccessMessage(__('The resource data has been saved.'));
                $this->adminSession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['id' => $this->popupInterface->getId(), '_current' => true]);
                    }
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException | \RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
