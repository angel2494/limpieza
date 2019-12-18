<?php
defined ('_JEXEC') or die ('resticted aceess');
SpAddonsConfig::addonConfig(
	array(
		'type'       => 'content',
		'addon_name' => 'sp_heading',
		'category'   => 'Vinasites',
		'title'      => JText::_( 'COM_SPPAGEBUILDER_ADDON_HEADING' ),
		'desc'       => JText::_( 'COM_SPPAGEBUILDER_ADDON_HEADING_DESC' ),
		'attr'       => array(
			'title' => array(
				'type'  => 'text',
				'title' => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE' ),
				'desc'  => JText::_( 'COM_SPPAGEBUILDER_ADDON_TITLE_DESC' ),
				'std'   => 'Heading Title',
			),
			'align'=> array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ALIGNMENT'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ALIGNMENT_DESC'),
				'values'=>array(
					'sppb-text-center' => JText::_( 'COM_SPPAGEBUILDER_ADDON_CENTER' ),
					'sppb-text-left' => JText::_( 'COM_SPPAGEBUILDER_ADDON_LEFT' ),
					'sppb-text-right' => JText::_( 'COM_SPPAGEBUILDER_ADDON_RIGHT' ),
				),
				'std'=>'sppb-text-center',
			),
			'style'=> array(
				'type'=>'select',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_STYLE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_STYLE_DESC'),
				'values'=>array(
					'style-1' => JText::_( 'COM_SPPAGEBUILDER_ADDON_STYLE' ).' 1',
					'style-2' => JText::_( 'COM_SPPAGEBUILDER_ADDON_STYLE' ).' 2',
					'style-3' => JText::_( 'COM_SPPAGEBUILDER_ADDON_STYLE' ).' 3',
				),
				'std'=>'style-1',
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