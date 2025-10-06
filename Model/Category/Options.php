<?php
/**
 * @category    Rahulsingh
 * @package     Rahulsingh_CategoryFilter
 * @copyright   Copyright (c) 2025 Rahulsingh
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @author      Rahul Singh <rahulsingh.solutions@gmail.com>
 */

declare(strict_types=1);

namespace Rahulsingh\CategoryFilter\Model\Category;

use Magento\Framework\Option\ArrayInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class Options implements ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $categoryCollectionFactory;

    /**
     * @param CollectionFactory $categoryCollectionFactory
     */
    public function __construct(
        CollectionFactory $categoryCollectionFactory
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
    }

    /**
     * Return options array
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $collection = $this->categoryCollectionFactory->create()
            ->addAttributeToSelect('name')
            ->addAttributeToFilter('is_active', 1)
            ->load();

        $options = [];
        $options[] = ['label' => __('-- Please Select a Category --'), 'value' => ''];

        foreach ($collection as $category) {
            $options[] = [
                'label' => $category->getName(),
                'value' => $category->getId(),
            ];
        }

        return $options;
    }
}
