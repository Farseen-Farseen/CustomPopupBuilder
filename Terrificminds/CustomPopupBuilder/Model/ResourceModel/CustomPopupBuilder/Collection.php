<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Model\ResourceModel\CustomPopupBuilder;

use Terrificminds\CustomPopupBuilder\Model\Popup;
use Terrificminds\CustomPopupBuilder\Model\ResourceModel\CustomPopupBuilder as PopupResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init(
            Popup::class,
            PopupResourceModel::class
        );
    }
}
