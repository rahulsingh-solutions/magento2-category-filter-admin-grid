<?php
/**
 * @category    Rahulsingh
 * @package     Rahulsingh_CategoryFilter
 * @copyright   Copyright (c) 2025 Rahulsingh
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @author      Rahul Singh <rahulsingh.solutions@gmail.com>
 */

declare(strict_types=1);

namespace Rahulsingh\CategoryFilter\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\CategoryRepository;

class Category extends Column
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepository;

    /**
     * @var CategoryRepository
     */
    protected CategoryRepository $categoryRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param ProductRepositoryInterface $productRepository
     * @param CategoryRepository $categoryRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface           $context,
        UiComponentFactory         $uiComponentFactory,
        ProductRepositoryInterface $productRepository,
        CategoryRepository         $categoryRepository,
        array                      $components = [],
        array                      $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                try {
                    $product = $this->productRepository->getById($item['entity_id']);
                    $categoryIds = $product->getCategoryIds();
                    $categoryNames = [];

                    foreach ($categoryIds as $categoryId) {
                        $category = $this->categoryRepository->get($categoryId);
                        $categoryNames[] = $category->getName();
                    }

                    // Display category names separated by a comma
                    $item[$fieldName] = implode(', ', $categoryNames);
                } catch (\Exception $e) {
                    $item[$fieldName] = __('N/A');
                }
            }
        }

        return $dataSource;
    }
}
