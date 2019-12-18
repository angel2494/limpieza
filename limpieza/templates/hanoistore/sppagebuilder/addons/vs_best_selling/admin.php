<?php
defined ('_JEXEC') or die ('resticted aceess');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
VmConfig::loadConfig();
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
		'addon_name' => 'sp_vs_best_selling',
		'category'   => 'Vinasites',
		'title'      => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_BESTSELLING' ),
		'desc'       => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_BESTSELLING_DESC' ),
		'attr'       => array(
			'title'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
				'std'   => 'Heading Title',
			),
			'class'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS_DESC' ),
				'std'   => ''
			),
			'repetable_item'=>array(
				'type'=>'repeatable',
				'addon_name' =>'sp_vs_best_selling_item',
				'title'=> 'Repetable',
				'attr'=>  array(
					'title'               => array(
						'type'  => 'text',
						'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
						'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
						'std'   => 'Heading Title',
					),
					'icon'               => array(
						'type'  => 'text',
						'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_ICON' ),
						'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_ICON_DESC' ),
						'std'   => '',
					),
					'cat' => array (
						'type'		=> 'select',
						'title'		=> JText::_('COM_SPPAGEBUILDER_ADDON_CATEGORY_VM'),
						'desc'		=> JText::_('COM_SPPAGEBUILDER_ADDON_CATEGORY_VM_DESC'),
						'values'	=> $groups,
					),
				)
			),
		)
	)
);