<?php

declare(strict_types=1);

namespace Terrificminds\CustomPopupBuilder\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PopupInterface extends ExtensibleDataInterface
{
   /**
   *  Id
   *
   * @return int|null
   */
   public function getId();
   /**
   * Set  id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
    /**
      * Title
      *
      * @return string|null
      */
      public function getTitle(): string;

      /**
       * Set title
       *
       * @param string $title
       * @return $this
       */
      public function setTitle(string $title);
      /**
        * Storeview
        *
        * @return string|null
        */
    public function getStoreView():string;

    /**
     * Set StoreView
     *
     * @param string $storeview
     * @return $this
     */
  public function setStoreView(string $storeview);
  /**
        * CustomerGroup
        *
        * @return string|null
        */
        public function getCustomerGroup(): string;

        /**
         * Set CustomerGroup
         *
         * @param string $customer_group
         * @return $this
         */
      public function setCustomerGroup(string $customer_group);
      /**
        * Content Heading
        *
        * @return string|null
        */
        public function getContentHeading(): string;

        /**
         * Set Customer Heading
         *
         * @param string $content_heading
         * @return $this
         */
      public function setContentHeading(string $content_heading);
      /**
        * Content
        *
        * @return string|null
        */
        public function getContent(): string;

        /**
         * Set Content
         *
         * @param string $content
         * @return $this
         */
      public function setContent(string $content);
    /**
     * Get created at timestamp
     *
     * @return int
     */
    public function getCreationTime(): int;

    /**
     * Set created at timestamp
     *
     * @param int $creation_time
     *
     * @return $this
     */
    public function setCreationTime(int $creation_time);

    /**
     * Get Updated at timestamp
     *
     * @return int
     */
    public function getUpdateTime(): int;

    /**
     * Set Updated at timestamp
     *
     * @param int $update_time
     *
     * @return $this
     */
    public function setUpdateTime(int $update_time);
    /**
        * Status
        *
        * @return string|null
        */
        public function getStatus(): string;

        /**
         * Set Status
         *
         * @param string $is_active
         * @return $this
         */
      public function setStatus(string $is_active);
    /**
        * From date
        *
        * @return string|null
        */
        public function getFromDate();

        /**
         * Set From Date
         *
         * @param string $from_date
         * @return $this
         */
      public function setFromDate($from_date);
       /**
        * To date
        *
        * @return string|null
        */
        public function getToDate();

        /**
         * Set To Date
         *
         * @param string $to_date
         * @return $this
         */
      public function setToDate($to_date);
      /**
        * Priority
        *
        * @return string|null
        */
        public function getPriority(): string;

        /**
         * Set Priority
         *
         * @param string $priority
         * @return $this
         */
      public function setPriority(string $priority);
}
