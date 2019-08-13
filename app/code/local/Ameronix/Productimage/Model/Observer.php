<?php
class Ameronix_Productimage_Model_Observer extends Varien_Event_Observer
{
    /**
     * Adds column to admin customers grid
     *
     * @param Varien_Event_Observer $observer
     * @return Atwix_CustomGrid_Model_Observer
     */
    public function appendCustomColumn(Varien_Event_Observer $observer)
    {
    	$block = $observer->getBlock();
        if (!isset($block)) {
            return $this;
        }
 
        if ($block->getType() == 'adminhtml/catalog_product_grid') {
            /* @var $block Mage_Adminhtml_Block_Customer_Grid */
        		$block->addColumnAfter('amxcustomers_type', array(
                'header'    => 'Main Image',
        				'align'			=> 'center',
                //'type'      => 'options',
        				//'options'		=> array(0 => 'No Image'),
                'index'     => 'image',
        				'renderer'	=> 'Ameronix_Productimage_Block_Adminhtml_Catalog_Product_Renderer_Image',
        				'width'			=> (int) Mage::getStoreConfig('ameronix_amxproductimage_options/image/image_size') + 6
            ), 'entity_id');
        }
    }
    
    public function appendCustomAttribute($observer)
    {
    	$collection = $observer->getCollection();
    	if (!isset($collection)) return;
    	
    	if(is_a($collection, "Mage_Catalog_Model_Resource_Product_Collection"))
    	{
    		$collection->joinAttribute('image', 'catalog_product/image', 'entity_id', null, 'left');
    		//echo '<pre>variable: '.htmlentities(print_r('woot',true)).'</pre>';
    	}
    }
}