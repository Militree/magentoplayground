<?php

class Brandyn_EntityCreation_customerController extends Mage_Core_Controller_Front_Action {
	
	function indexAction()
	{
	    $this->loadLayout();
	    $this->renderLayout();
	}

	function createCustomer($args) {
		$websiteId = Mage::app()->getWebsite()->getId();
		$store = Mage::app()->getStore();
		 
		$customer = Mage::getModel("customer/customer");
		$customer->setWebsiteId($websiteId)
				 ->setStore($store)
				 ->setFirstname($args['first_name'])
				 ->setLastname($args['last_name'])
				 ->setEmail($args['email'])
				 ->setPassword(md5($args['password']));
		$customer->save();
	}
}