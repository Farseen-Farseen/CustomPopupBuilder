<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface;
use Terrificminds\CustomPopupBuilder\Api\PopupRepositoryInterface;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupSearchResultInterface;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupSearchResultInterfaceFactory;
use Terrificminds\CustomPopupBuilder\Model\ResourceModel\CustomPopupBuilder\CollectionFactory as PopupCollectionFactory;
use Terrificminds\CustomPopupBuilder\Model\ResourceModel\CustomPopupBuilder\Collection;
use Terrificminds\CustomPopupBuilder\Model\ResourceModel\CustomPopupBuilder as PopupResourceModel;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PopupRepository implements PopupRepositoryInterface
{
    /**
    * @var PopupFactory
    */
    private PopupFactory $popupFactory;

    /**
     * @var PopupCollectionFactory
     */
    private PopupCollectionFactory $popupCollectionFactory;

    /**
     * @var PopupSearchResultInterfaceFactory
     */
    private PopupSearchResultInterfaceFactory $popupSearchResultInterfaceFactory;

    /**
     * @var PopupResourceModel
     */
    private PopupResourceModel $popupResourceModel;

    public function __construct(
        PopupFactory $popupFactory,
        PopupCollectionFactory $popupCollectionFactory,
        PopupSearchResultInterfaceFactory $popupSearchResultInterfaceFactory,
        PopupResourceModel $popupResourceModel
    ) {
        $this->popupFactory = $popupFactory;
        $this->popupCollectionFactory = $popupCollectionFactory;
        $this->popupSearchResultInterfaceFactory = $popupSearchResultInterfaceFactory;
        $this->popupResourceModel = $popupResourceModel;
    }

    /**
     * @inheritDoc
     * @throws NoSuchEntityException
     */
    public function getById($id): PopupInterface
    {
        $popup = $this->popupCollectionFactory->create()->addFieldToFilter('id', $id)->getFirstItem();
        if (! $popup->getId()) {
            throw new NoSuchEntityException(__('Unable to find record with ID "%1"', $id));
        }
        return $popup;
    }

    /**
     * @inheritDoc
     * @throws CouldNotSaveException
     */
    public function save(PopupInterface $resources): PopupInterface
    {
        try {
            if ($resources->hasDataChanges()) {
                // Clear out updated_at field so the MySQL default value (CURRENT_TIMESTAMP) is used.
                $resources->setData('update_time', null);
            }
            $this->popupResourceModel->save($resources);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $resources;
    }

    /**
     * @inheritDoc
     * @throws CouldNotDeleteException
     */
    public function delete(PopupInterface $resources)
    {
        try {
            $this->popupResourceModel->delete($resources);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): PopupSearchResultInterface
    {
        $collection = $this->popupCollectionFactory->create();
        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    /**
     * phpcs:disable Generic.Files.LineLength.TooLong
     * phpcs:disable Magento2.Files.LineLength.MaxExceeded
     */
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection): PopupSearchResultInterface
    {
        $searchResults = $this->popupSearchResultInterfaceFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
