<?php

namespace Vaimo\Quote\Block\Adminhtml\Quote\Buttons;

use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Vaimo\Quote\Block\Adminhtml\Quote\Buttons
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /** {@inheritdoc} */
    public function getButtonData()
    {
        return [
            'label' => __('Save Quote'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}