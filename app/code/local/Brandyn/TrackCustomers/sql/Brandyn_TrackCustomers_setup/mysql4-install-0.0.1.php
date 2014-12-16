<?php

echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";

$installer = $this;
$installer->startSetup();

$attributeSelector = "is_tracked";

$installer->addAttribute('customer', $attributeSelector, array(
	'label' 			=> 'Is Tracked',
	'type'  			=> 'int',
	'default'			=> 0,
	'input'				=> 'select',
    'global'            => 1,
	'visible'			=> 1,
	'required'			=> 0,
    'user_defined'      => 0,   
	'frontend'			=> '',
    'visible_on_front'  => 1
));


$installer->endSetup();
