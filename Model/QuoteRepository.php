<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 2019-11-06
 * Time: 09:34
 */

namespace Vaimo\Quote\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

use Vaimo\Quote\Api\Data\QuoteInterface;
use Vaimo\Quote\Api\QuoteRepositoryInterface;
use Vaimo\Quote\Model\ResourceModel\Quote as ResourceModel;
use Vaimo\Quote\Model\QuoteFactory;
use Vaimo\Quote\Model\ResourceModel\Quote\CollectionFactory;


/**
 * Class QuoteRepository
 * @package Vaimo\Quote\Model
 */
class QuoteRepository implements QuoteRepositoryInterface
{

    /** @var ResourceModel */
    protected $resource;
    /** @var QuoteFactory  */
    protected $quoteFactory;
    /** @var CollectionProcessorInterface */
    protected $collectionProcessor;
    /** @var CollectionFactory */
    protected $collectionFactory;

    /**
     * @var ResourceModel
     */
    private $resourceModel;

    /**
     * QuoteRepository constructor.
     * @param ResourceModel $resource
     * @param \Vaimo\Quote\Model\QuoteFactory $quoteFactory
     * @param ResourceModel $resourceModel
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        ResourceModel $resource,
        QuoteFactory $quoteFactory,
        \Vaimo\Quote\Model\ResourceModel\Quote $resourceModel,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $collectionFactory

    ) {
        $this->resource                 = $resource;
        $this->resourceModel       = $resourceModel;
        $this->quoteFactory             = $quoteFactory;
        $this->collectionProcessor      = $collectionProcessor;
        $this->collectionFactory        = $collectionFactory;
    }


    /**
     * @param $id
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $quote = $this->quoteFactory->create();
        $this->resource->load($quote, $id);
        if (!$quote->getId()) {
            throw new NoSuchEntityException(__('Quote with id "%1" does not exist.', $id));
        }
        return $quote;
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function deleteById($id)
    {
        try {
            $this->delete($this->getById($id));
        } catch (CouldNotDeleteException $e) {
        } catch (NoSuchEntityException $e) {
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed|void
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }

    /**
     * @param QuoteInterface $quote
     * @return mixed|QuoteInterface
     * @throws CouldNotSaveException
     */
    public function save(QuoteInterface $quote)
    {
        try {
            $this->resourceModel->save($quote);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__($exception->getMessage()));
        }
        return $quote;

    }
    /** {@inheritdoc} */
    public function delete(QuoteInterface $quote)
    {
        try {
            $this->resource->delete($quote);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return $this;
    }
}