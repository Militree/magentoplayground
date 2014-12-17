<?php

class Brandyn_Trackcustomers_IndexController extends Mage_Core_Controller_Front_Action {
	public function indexAction()
	{
        if ($this->getRequest()->isPost()){
            $this->updateTrackedStatus();
        }
	    $this->loadLayout();
	    $this->renderLayout();
	}
	
    public function preDispatch()
    {
        parent::preDispatch();
        $action = $this->getRequest()->getActionName();
        $loginUrl = Mage::helper('customer')->getLoginUrl();
 
        if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    public function updateTrackedStatus()
    {
        if(!empty($_POST['trackCheck'])){

            $customers = Mage::getResourceModel('customer/customer_collection');
            foreach ($customers as $customer){
                $customerObj = Mage::getModel('customer/customer'); //Bad news to load this in a loop, but load() would not work otherwise
                $customerId = (int)$customer->getID();
                $customerObj->load($customerId)->setIsTracked('0');
                $customerObj->save();
            }
            foreach($_POST['trackCheck'] as $selected){
                $customerObj = Mage::getModel('customer/customer');
                $customerObj->load($selected)->setIsTracked('1');
                $customerObj->save();
            }
        }
    }
}