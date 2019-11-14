<?php

	namespace Vaimo\Quote\Model\ResourceModel\Quote;

    use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
    use Vaimo\Quote\Model\Quote;
    use Vaimo\Quote\Model\ResourceModel\Quote as GridResource;

    class Collection extends AbstractCollection
    {
        protected function _construct()
        {
            $this->_init(Quote::class, GridResource::class);
        }
    }