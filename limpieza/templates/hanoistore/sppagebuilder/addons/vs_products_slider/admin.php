<?php
defined ('_JEXEC') or die ('resticted aceess');
SpAddonsConfig::addonConfig(
	array(
		'type'       => 'content',
		'addon_name' => 'sp_products_slider',
		'category'   => 'Vinasites',
		'title'      => JText::_( 'COM_SPPAGEBUILDER_ADDON_VS_PRODUCTS' ),
		'desc'       => JText::_( 'COM_SPPAGEBUILDER_ADDON_VS_PRODUCTS_DESC' ),
		'attr'       => array(
			'title' => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
				'std'   => 'Heading Title',
			),
			'type'=>array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TYPE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TYPE_DESC'),
				'values'=>array(
					'latest'=>JText::_('Latest products'),
					'featured'=>JText::_('Featured products'),
				),
				'std'=>'latest',
			),
			'number' => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_NUMBER_DESC' ),
				'std'   => ''
			),
			'class' => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_CLASS_DESC' ),
				'std'   => ''
			),
		)
	)
);