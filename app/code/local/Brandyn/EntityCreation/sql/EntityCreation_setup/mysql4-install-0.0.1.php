<?php

echo 'Running This Upgrade: '.get_class($this)."\n <br /> \n";

$installer = $this;
$installer->startSetup();

$installer->addAttribute('catalog_product', 'cool_stuff', array(
	'attribute_set'	=> 	'Pixafy',
	'group'			=>	'General',
	'label'			=>	'',
	'visible'		=> 	1,
	'type'			=> 'varchar',
	'input'			=> 'text',
	'system'		=>	1,
	'required'		=>	0
	));

$installer->endSetup();