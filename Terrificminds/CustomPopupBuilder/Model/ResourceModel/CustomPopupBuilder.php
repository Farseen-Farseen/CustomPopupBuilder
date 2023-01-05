<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomPopupBuilder extends AbstractDb
{
    /**
     * table name
     */
    protected const MAIN_TABLE = 'custom_popup_table';
    /**
     * primary id
     */
    protected const ID_FIELD_NAME = 'id';

    /**
     * Construct function
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
