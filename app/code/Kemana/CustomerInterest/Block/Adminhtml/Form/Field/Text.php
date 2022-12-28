<?php
namespace Kemana\CustomerInterest\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Kemana\CustomerInterest\Block\Adminhtml\Form\Field\TaxColumn;

/**
 * Class Text
 */
class Text extends AbstractFieldArray
{

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('interest', ['label' => __('Title')]);

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

}
