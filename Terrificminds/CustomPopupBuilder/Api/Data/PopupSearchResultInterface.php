<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface PopupSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface[]
     */
    public function getItems();

    /**
     * @param \Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
