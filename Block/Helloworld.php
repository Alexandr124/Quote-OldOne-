<?php
namespace Vaimo\Quote\Block;

use Magento\Framework\View\Element\Template;

class Helloworld extends \Magento\Framework\View\Element\Template
{
    protected $helper;
    protected $anotherhelper;
    protected $_categoryFactory;

    /**
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus
     * @param \Magento\Catalog\Model\Product\Visibility $productVisibility
     */

    public function __construct(
        \Vaimo\Helloworld\Helper\Data $helper,
        \Vaimo\Helloworld\Helper\Data $anotherhelper,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Framework\View\Element\Template\Context $context,

        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\Api\SearchCriteriaInterface $criteria,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,

        array$data =[]){
        parent::__construct($context, $data);
        $this->helper = $helper;
        $this->anotherhelper = $anotherhelper;
        $this->_categoryFactory = $categoryFactory;

        $this->productRepository = $productRepository;
        $this->searchCriteria = $criteria;
        $this->filterGroup = $filterGroup;
        $this->filterGroup2 = $filterGroup;

        $this->filterBuilder = $filterBuilder;
        $this->productStatus = $productStatus;
        $this->productVisibility = $productVisibility;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;

        $this->getProductData();
    }


    /**
     * Testing
     */


    public function getHelloWorldTxt()
    {
//        return 'Hello world! I guess I\'m block';

        return $this->helper->sayHello();

    }

    public function sayHello()
    {
        return $this->anotherhelper->sayHello();
    }

    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }

    public function getCategoryProducts($categoryId)
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('*');
        return $products;
    }



    /**
     * Getting product list using repository
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
//    public function getProductData()
//    {
//
//        $this->filterGroup->setFilters([
//            $this->filterBuilder
//                ->setField('status')
//                ->setConditionType('in')
//                ->setValue($this->productStatus->getVisibleStatusIds())
//                ->create(),
//            $this->filterBuilder
//                ->setField('visibility')
//                ->setConditionType('in')
//                ->setValue($this->productVisibility->getVisibleInSiteIds())
//                ->create(),
//            $this->filterBuilder
//                ->setField('price')
//                ->setConditionType('eq')
//                ->setValue(8.0000)
//                ->create(),
//        ]);
//
//        $this->searchCriteria->setFilterGroups([$this->filterGroup]);
//        $products = $this->productRepository->getList($this->searchCriteria);
//        $productItems = $products->getItems();
//
//        return $productItems;
//    }


    /**
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
        public function getProductData()
    {

        $this->filterGroup->setFilters([
            $this->filterBuilder
                ->setField('status')
                ->setConditionType('in')
                ->setValue($this->productStatus->getVisibleStatusIds())
                ->create(),
            $this->filterBuilder
                ->setField('visibility')
                ->setConditionType('in')
                ->setValue($this->productVisibility->getVisibleInSiteIds())
                ->create(),
            $this->filterBuilder
                ->setField('name')
                ->setConditionType('eq')
                ->setValue('iPhone 7 Case (White)')
                ->create()
        ]);

        $this->filterGroup2->setFilters([

            $this->filterBuilder
                ->setField('price')
                ->setConditionType('eq')
                ->setValue(5.0000)
                ->create()

        ]);

        $this->searchCriteria->setFilterGroups([$this->filterGroup2, $this->filterGroup]);
        $products = $this->productRepository->getList($this->searchCriteria);
        $productItems = $products->getItems();

        return $productItems;
    }

}


