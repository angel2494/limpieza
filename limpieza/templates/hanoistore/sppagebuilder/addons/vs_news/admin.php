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
$groups['all'] = JText::_('VIRTUEMART_ALL_PRODUCTS');
foreach ($cats as $i => $category) {
	$groups[$category->virtuemart_category_id] = $category->category_name;
}

SpAddonsConfig::addonConfig(
	array(
		'type'       => 'repeatable',
		'addon_name' => 'sp_vs_news',
		'category'   => 'Vinasites',
		'title'      => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_NEWS' ),
		'desc'       => JText::_( 'COM_SPPAGEBUILDER_ADDON_VM_PRODUCTS_NEWS_DESC' ),
		'attr'       => array(
			'title'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
				'std'   => 'New products',
			),
			'class'               => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS_DESC' ),
				'std'   => ''
			),
			'repetable_item'=>array(
				'type'=>'repeatable',
				'addon_name' =>'sp_vs_news_item',
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
					'number'               => array(
						'type'  => 'text',
						'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER' ),
						'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER_DESC' ),
						'std'   => ''
					),
					'cols'=>array(
						'type'=>'select',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_COLUMN'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_COLUMN_DESC'),
						'values'=>array(
							'12'=>JText::_('1'),
							'6'=>JText::_('2'),
							'4'=>JText::_('3'),
							'3'=>JText::_('4'),
							'5'=>JText::_('5'),
							'2'=>JText::_('6'),
						),
						'std'=>'3',
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