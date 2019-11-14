<?php

namespace Vaimo\Quote\Controller\Adminhtml\Index;
use Vaimo\Quote\Controller\Adminhtml\Base as BaseLink;

/**
 * Class Delete
 * @package Vaimo\Quote\Controller\Adminhtml\Index
 */
class Delete extends Baselink
{

    /** {@inheritdoc} */
    public function execute()
    {
        $id = $this->getRequest()->getParam(static::QUERY_PARAM_ID);
        if (!empty($id)) {
            try {
                $this->repository->deleteById($id); // Pinging out "QuoteRepository to delete selected item"
                $this->messageManager->addSuccessMessage(__('Quote was deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(_('Link can\'t be deleted'));
                return $this->doRefererRedirect();
            }
        } else {
            $this->logger->error(
                sprintf("Require parameter `%s` is missing", static::QUERY_PARAM_ID) // hz chto eto
            );
        }
        return $this->redirectToGrid();
    }
}