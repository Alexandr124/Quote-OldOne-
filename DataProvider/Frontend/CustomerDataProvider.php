<?php

namespace Vaimo\Quote\DataProvider\Frontend;

use Magento\Customer\Model\SessionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

use Vaimo\Quote\Model\ResourceModel\Quote\CollectionFactory;
use Vaimo\Quote\Model\QuoteFactory;

class CustomerDataProvider extends AbstractDataProvider
{
    private $funnyOrderFactory;
    private $sessionFactory;
    public function __construct(SessionFactory $sessionFactory,
                                QuoteFactory $funnyOrderFactory,
                                CollectionFactory $collectionFactory ,
                                \Magento\Framework\Stdlib\DateTime\DateTime $date,
                                $name,
                                $primaryFieldName,
                                $requestFieldName,
                                array $meta = [],
                                array $data = []
    ) {
        $this->sessionFactory    = $sessionFactory;
        $this->funnyOrderFactory = $funnyOrderFactory;
        $this->date = $date;
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if ($this->sessionFactory->create()->getCustomer()) {
            $name  = $this->sessionFactory->create()->getCustomer()->getFirstname();
            $surname  = $this->sessionFactory->create()->getCustomer()->getLastname();
            $date = $this->date->gmtDate('Y-m-d');

            $model = $this->funnyOrderFactory->create();
            $model->setFirstName($name);
            $model->setLastName($surname);
            $model->setQuoteDate($date);

            return [$model->getId() => $model->getData()];
        }
        return [0 =>['hello'=>'chose please date and time']];
    }
}