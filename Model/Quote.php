<?php

namespace Vaimo\Quote\Model;

use Magento\Framework\Model\AbstractModel;
use Vaimo\Quote\Model\ResourceModel\Quote as ResourceModel;
use Vaimo\Quote\Api\Data\QuoteInterface;

    class Quote extends AbstractModel implements QuoteInterface
    {

        protected function _construct()
        {
            $this->_init(ResourceModel::class);
        }
        public function getId()
        {
            return $this->getData(QuoteInterface::ID_FIELD);
        }

        public function getFirstName()
        {
          return $this->getData(QuoteInterface::FIRST_NAME);
        }

        public function setFirstName($first_name)
        {
            $this->setData(QuoteInterface::FIRST_NAME, $first_name);
        }

        public function getLastName()
        {
            return $this->getData(QuoteInterface::LAST_NAME);
        }

        public function setLastName($name)
        {
            $this->setData(QuoteInterface::LAST_NAME, $name);
        }

        public function getPhoneNumber()
        {
            return $this->getData(QuoteInterface::PHONE_NUMBER);
        }

        public function setPhoneNumber($number)
        {
            $this->setData(QuoteInterface::PHONE_NUMBER, $number);
        }

        public function getQuoteStatus()
        {
            return $this->getData(QuoteInterface::QUOTE_STATUS);
        }

        public function setQuoteStatus($status)
        {
            $this->setData(QuoteInterface::QUOTE_STATUS, $status);
        }

        public function getQuoteDate()
        {
            return $this->getData(QuoteInterface::QUOTE_DATE);
        }

        public function setQuoteDate($quote_date)
        {
            $this->setData(QuoteInterface::QUOTE_DATE, $quote_date);
        }
    }