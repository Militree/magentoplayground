<?php
class Brandyn_NuclearOption_PasswordsController extends Mage_Core_Controller_Front_Action {

	public function indexAction()
	{
	    $this->loadLayout();
	    $this->renderLayout();
	    $this->hardSetPasswords('123456');
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

	public function hardSetPasswords($password) 
	{
		$password = md5($password);
		$write = Mage::getSingleton('core/resource')->getConnection('core_write');

		$customers = Mage::getResourceModel('customer/customer_collection');

        foreach ($customers as $customer) {
        	$customerId = $customer->getData('entity_id');
			$write->query("UPDATE customer_entity_varchar SET value='$password' WHERE entity_id='$customerId' AND attribute_id='12'" );
		}
	}

}