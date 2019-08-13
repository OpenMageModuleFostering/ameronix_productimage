<?php
class Ameronix_Productimage_Helper_Data extends Mage_Core_Helper_Abstract
{
  public function getExtensionVersion()
  {
      return (string) Mage::getConfig()->getNode()->modules->Ameronix_Productimage->version;
  }
  
}