<?php
/**
 * @category    Rahulsingh
 * @package     Rahulsingh_CategoryFilter
 * @copyright   Copyright (c) 2025 Rahulsingh
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @author      Rahul Singh <rahulsingh.solutions@gmail.com>
 */

declare(strict_types=1);

namespace Rahulsingh\CategoryFilter\Ui\DataProvider\Product;

use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider as MagentoProductDataProvider;
use Magento\Framework\Api\Filter;

class ProductDataProvider extends MagentoProductDataProvider
{
    /**
     * Adds a filter to the collection based on the specified field.
     *
     * @param Filter $filter The filter object containing field and value to apply.
     * @return void
     */
    public function addFilter(Filter $filter): void
    {
        if ($filter->getField() == 'category_id') {
            // Special handling for the category filter
            $this->getCollection()->addCategoriesFilter(['in' => $filter->getValue()]);
        } else {
            parent::addFilter($filter);
        }
    }
}
