<?php
namespace Kemana\Grid\Ui\DataProvider\Interest\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
     * @return Collection|void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('entity_id', 'main_table.entity_id');
        $this->addFilterToMap('name', 'Kemanagridname.name');
        parent::_initSelect();
    }
}
