<?php

class Brandyn_EntityCreation_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction() 
	{
	    $this->loadLayout();
	    $this->renderLayout();

	} 

	public function createAttributeSet($entityTypeId, $name, $sortOrder = null) {
		
		$args = array(
			'entity_type_id'		=> $this->getEntityTypeId($entityTypeId),
			'attribute_set_name'	=> $name,
			'sort_order'			=> $this->getAttributeSetSortOrder($entityTypeId, $sortOrder)
		);

		$attributeSetId = $this->getAttributeSet($entityTypeId, $name, 'attribute_set_id');
		
		if ($attributeSetId) {
			$this->updateAttributeSet($entityTypeId, $attributeSetId, $args);
		}
		else {
			$this->_conn->insert($this->getTable('eav/attribute_set'), $args);
			$this->addAttribteGroup($entityTypeId, $name, $this->_generalGroupName);
		}

        return $this;
	}

}