<?php

namespace Vaimo\Quote\Api;
/**
 * Interface QuoteRepositoryInterface
 * @package Vaimo\Quote\Api
 */
interface QuoteRepositoryInterface
{

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\QuoteInterface $quote
     * @return mixed
     */
    public function delete(\Vaimo\Quote\Api\Data\QuoteInterface $quote);

    /**
     * @param Data\QuoteInterface $quote
     * @return mixed
     */
    public function save(\Vaimo\Quote\Api\Data\QuoteInterface $quote);
}