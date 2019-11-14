<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 2019-11-11
 * Time: 15:26
 */

namespace Vaimo\Quote\Controller\SaveQuote;


use Magento\Framework\App\Action\Action;

class Index extends Action
{
    public function execute()
    {
        $m = $this->getRequest()->getParams();
        return 0;
    }
}