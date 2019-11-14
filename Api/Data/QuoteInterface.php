<?php


namespace Vaimo\Quote\Api\Data;

/**
 * Interface QuoteInterface
 * @package Vaimo\Quote\Api\Data
 */
interface QuoteInterface
{
    /**
     *table name in my database
     */
    const TABLE_NAME                = 'vaimo_quote';
    /**
     *
     */
    const ID_FIELD                  = 'id';
    /**
     *
     */
    const FIRST_NAME                = 'first_name';
    /**
     *
     */
    const LAST_NAME                 = 'last_name';
    /**
     *
     */
    const PHONE_NUMBER              = 'phone_number';
    /**
     *
     */
    const QUOTE_DATE                = 'quote_date';
    /**
     *
     */
    const QUOTE_STATUS              = 'quote_status';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getFirstName();

    /**
     * @param $first_name
     * @return mixed
     */
    public function setFirstName($first_name);

    /**
     * @return mixed
     */
    public function getLastName();

    /**
     * @param $name
     * @return mixed
     */
    public function setLastName($name);

    /**
     * @return mixed
     */
    public function getPhoneNumber();

    /**
     * @param $number
     * @return mixed
     */
    public function setPhoneNumber($number);

    /**
     * @return mixed
     */
    public function getQuoteStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setQuoteStatus($status);

    public function getQuoteDate();

    public function setQuoteDate($quote_date);

}