<?php

echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";

$installer = $this;
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$entityTypeId     = $setup->getEntityTypeId('customer');
$attributeSetId   = $setup->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $setup->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$attributeSelector = "is_tracked";

$setup->addAttribute('customer', $attributeSelector, array(
	'label' 			=> 'Is Tracked',
	'type'  			=> 'int',
	'default'			=> 0,
	'input'				=> 'boolean',
    'global'            => 1,
	'visible'			=> 1,
	'required'			=> 0,
    'user_defined'      => 0,   
	'frontend'			=> '',
    'visible_on_front'  => 1,
    'source'			=> NULL
));

Mage::getSingleton('eav/config')
	->getAttribute('customer', $attributeSelector)
	->setData('used_in_forms', array('adminhtml_customer','customer_account_create','customer_account_edit','checkout_register'))
	->save();

$customer = Mage::getModel('customer/customer');
$attrSetId = $customer->getResource()->getEntityType()->getDefaultAttributeSetId();
$setup->addAttributeToSet('customer', $attrSetId, 'General', $attributeSelector);

$installer->endSetup();