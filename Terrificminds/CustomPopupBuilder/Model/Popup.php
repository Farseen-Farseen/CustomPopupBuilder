<?php

declare(strict_types=1);

namespace  Terrificminds\CustomPopupBuilder\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Terrificminds\CustomPopupBuilder\Api\Data\PopupInterface;

class Popup extends AbstractExtensibleModel implements PopupInterface
{
    /**
     * @var string
     */
    public const CACHE_TAG = 'custom_popup_builder';

    /**
     * DB table column keys 
     */
    private const ID = "id";
    private const TITLE = "title";
    private const STOREVIEW = "storeview";
    private const CUSTOMER_GROUP = "customer_group";
    private const CONTENT_HEADING = "content_heading";
    private const CONTENT = "content";
    private const CREATION_TIME = "creation_time";
    private const UPDATE_TIME = "update_time";
    private const IS_ACTIVE = "is_active";
    private const FROM_DATE = "from_date";
    private const TO_DATE = "to_date";
    private const PRIORITY = "priority";


    /**
     * phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\CustomPopupBuilder::class);
    }

     /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($id): PopupInterface
    {
        return $this->setData(self::ID);
    }
    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle(string $title): PopupInterface
    {
        return $this->setData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function getStoreView(): string
    {
        return $this->getData(self::STOREVIEW);
    }

    /**
     * @inheritDoc
     */
    public function setStoreView(string $storeview): PopupInterface
    {
        return $this->setData(self::STOREVIEW);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerGroup(): string
    {
        return $this->getData(self::CUSTOMER_GROUP);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerGroup(string $customer_group): PopupInterface
    {
        return $this->setData(self::CUSTOMER_GROUP);
    }

    /**
     * @inheritDoc
     */
    public function getContentHeading(): string
    {
        return $this->getData(self::CONTENT_HEADING);
    }

    /**
     * @inheritDoc
     */
    public function setContentHeading(string $content_heading): PopupInterface
    {
        return $this->setData(self::CONTENT_HEADING);
    }
     /**
     * @inheritDoc
     */
    public function getContent(): string
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function setContent(string $content): PopupInterface
    {
        return $this->setData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function getCreationTime(): int
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setCreationTime(int $creation_time): PopupInterface
    {
        return $this->setData(self::CREATION_TIME);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateTime(): int
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @inheritDoc
     */
    public function setUpdateTime(int $update_time): PopupInterface
    {
        return $this->setData(self::UPDATE_TIME);
    }
     /**
     * @inheritDoc
     */
    public function getStatus(): string
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setStatus(string $is_active): PopupInterface
    {
        return $this->setData(self::IS_ACTIVE);
    }
      /**
     * @inheritDoc
     */
    public function getFromDate()
    {
        return $this->getData(self::FROM_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setFromDate($from_date): PopupInterface
    {
        return $this->setData(self::FROM_DATE);
    }
     /**
     * @inheritDoc
     */
    public function getToDate()
    {
        return $this->getData(self::TO_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setToDate($to_date): PopupInterface
    {
        return $this->setData(self::TO_DATE);
    }
    /**
     * @inheritDoc
     */
    public function getPriority(): string
    {
        return $this->getData(self::PRIORITY);
    }

    /**
     * @inheritDoc
     */
    public function setPriority(string $priority): PopupInterface
    {
        return $this->setData(self::PRIORITY);
    }
}
