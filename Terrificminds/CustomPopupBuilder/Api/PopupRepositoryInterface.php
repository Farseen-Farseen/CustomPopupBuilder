<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface;

interface PopupRepositoryInterface
{
    /**
     * @param int $id
     * @return \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface $popup
     * @return \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface
     */
    public function save(PopupInterface $popup);

    /**
     * @param \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface $popup
     * @return void
     */
    public function delete(PopupInterface $popup);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Terrificminds\CustomPopupBuilder\Api\Data\PopupSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
