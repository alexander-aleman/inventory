<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryInStorePickup\Model;

use Magento\Framework\Api\SortOrder;
use Magento\InventoryInStorePickupApi\Api\Data\SearchRequest\FilterSetInterface;
use Magento\InventoryInStorePickupApi\Api\Data\SearchRequest\DistanceFilterInterface;
use Magento\InventoryInStorePickupApi\Api\Data\SearchRequestInterface;
use Magento\InventorySalesApi\Api\Data\SalesChannelInterface;

/**
 * @inheritdoc
 */
class SearchRequest implements SearchRequestInterface
{
    /**
     * @var string
     */
    private $scopeCode;

    /**
     * @var string
     */
    private $scopeType;

    /**
     * @var DistanceFilterInterface|null
     */
    private $distanceFilter;

    /**
     * @var FilterSetInterface|null
     */
    private $filterSet;

    /**
     * @var SortOrder|null
     */
    private $sortOrders;

    /**
     * @var int|null
     */
    private $pageSize;

    /**
     * @var int
     */
    private $currentPage;

    /**
     * @param string $scopeCode
     * @param string $scopeType
     * @param DistanceFilterInterface|null $distanceFilter
     * @param FilterSetInterface|null $filterSet
     * @param array|null $sortOrders
     * @param int|null $pageSize
     * @param int $currentPage
     */
    public function __construct(
        string $scopeCode,
        string $scopeType = SalesChannelInterface::TYPE_WEBSITE,
        ?DistanceFilterInterface $distanceFilter = null,
        ?FilterSetInterface $filterSet = null,
        ?array $sortOrders = null,
        ?int $pageSize = null,
        int $currentPage = 1
    ) {
        $this->scopeCode = $scopeCode;
        $this->scopeType = $scopeType;
        $this->distanceFilter = $distanceFilter;
        $this->filterSet = $filterSet;
        $this->sortOrders = $sortOrders;
        $this->pageSize = $pageSize;
        $this->currentPage = $currentPage;
    }

    /**
     * @inheritdoc
     */
    public function getDistanceFilter(): ?DistanceFilterInterface
    {
        return $this->distanceFilter;
    }

    /**
     * @inheritdoc
     */
    public function getFilterSet(): ?FilterSetInterface
    {
        return $this->filterSet;
    }

    /**
     * @inheritdoc
     */
    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    /**
     * @inheritdoc
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @inheritdoc
     */
    public function getScopeType(): string
    {
        return $this->scopeType;
    }

    /**
     * @inheritdoc
     */
    public function getScopeCode(): string
    {
        return $this->scopeCode;
    }

    /**
     * @inheritdoc
     */
    public function getSort(): ?array
    {
        return $this->sortOrders;
    }
}
