<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

SpAddonsConfig::addonConfig(
	array( 
		'type'=>'repeatable', 
		'addon_name'=>'sp_vs_skillbar',
		'category'=>'Vinasites',
		'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_SKILLBAR'),
		'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_SKILLBAR_DESC'),
		'attr'=>array(
			'admin_label'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
				'std'=> ''
			),
			'class'=>array(
				'type'=>'text', 
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
				'std'=> ''
				),
			'repetable_item'=>array(
				'type'=>'repeatable',
				'addon_name' =>'sp_vs_skillbar_item',
				'title'=> 'Repetable', 
				'attr'=>  array(
					'admin_label'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
						'std'=> ''
					),
					'title'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
						'std'=>'Item Title',
						),
					'percen'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_PERCEN'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_PERCEN_DESC'),
						'std'=>'Item Title',
					),
					'color'=>array(
						'type'=>'color',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_COLOR'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_COLOR_DESC'),
						'std'=>'Item Title',
					),
				)
			),

		)

	)
);

