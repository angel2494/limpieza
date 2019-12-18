<?php
defined ('_JEXEC') or die ('resticted aceess');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
VmConfig::loadConfig();
VmConfig::loadJLang('mod_virtuemart_product', true);
$mainframe = Jfactory::getApplication();
$virtuemart_currency_id = $mainframe->getUserStateFromRequest( "virtuemart_currency_id", 'virtuemart_currency_id',vRequest::getInt('virtuemart_currency_id',0) );

vmJsApi::jPrice();
vmJsApi::cssSite();
echo vmJsApi::writeJS();

$vendorId = '1';
$category_id = 0;
$catModel = VmModel::getModel('Category');
$cats = $catModel->getChildCategoryList($vendorId,$category_id);
$groups = array();
foreach ($cats as $i => $category) {
	$groups[$category->virtuemart_category_id] = $category->category_name;
}

SpAddonsConfig::addonConfig(
	array(
		'type'       => 'repeatable',
		'addon_name' => 'sp_vs_cat_vm',
		'category'   => 'Vinasites',
		'title'      => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_TYPE' ),
		'desc'       => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_TYPE_DESC' ),
		'attr'       => array(
			'title'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
				'std'   => 'Heading Title',
			),
			'cat' => array (
				'type'		=> 'select',
				'title'		=> JText::_('COM_SPPAGEBUILDER_ADDON_CATEGORY_VM'),
				'desc'		=> JText::_('COM_SPPAGEBUILDER_ADDON_CATEGORY_VM_DESC'),
				'values'	=> $groups,
			),
			'number'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER_DESC' ),
				'std'   => '',
			),
			'style'=> array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_STYLE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_STYLE_DESC'),
				'values'=>array(
					'style-1' => JText::_( 'COM_SPPAGEBUILDER_ADDON_STYLE' ).' 1',
					'style-2' => JText::_( 'COM_SPPAGEBUILDER_ADDON_STYLE' ).' 2',
				),
				'std'=>'style-1',
			),
			'position_banner'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_POSITION_BANNER'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_POSITION_BANNER_DESC'),
				'values'=>array(
					'fleft' => JText::_( 'COM_SPPAGEBUILDER_ADDON_LEFT' ),
					'fright' => JText::_( 'COM_SPPAGEBUILDER_ADDON_RIGHT' ),
				),
				'std'=>'fleft',
			),
			'class'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS_DESC' ),
				'std'   => ''
			),
			'repetable_item'=>array(
				'type'=>'repeatable',
				'addon_name' =>'sp_vs_cat_vm_item',
				'title'=> 'Repetable',
				'attr'=>  array(
					'image'=>array(
						'type'=>'media',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE_DESC'),
					),
				)
			),
		)
	)
);