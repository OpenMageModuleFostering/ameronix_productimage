<?php
class Ameronix_Productimage_Block_Adminhtml_Catalog_Product_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
 public function render(Varien_Object $row)
 {
	// the $row is the entire order object - Mage_Sales_Model_Order
 	$product = $row;
 	
	$image_url = $row->getData('image');
	
	if($image_url && $image_url != 'no_selection')
	{
		$full_image_url = Mage::helper('catalog/image')->init($product, 'image')->resize(Mage::getStoreConfig('ameronix_amxproductimage_options/image/image_size'));
		return '<img src="'.$full_image_url.'"/>';
	}
	else {	
		return "-- No Image --";
	}
 }
}