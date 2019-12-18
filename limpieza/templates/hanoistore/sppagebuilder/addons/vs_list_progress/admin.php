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
		'addon_name'=>'sp_vs_list_progress',
		'category'=>'Vinasites',
		'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_LIST_PROGRESS'),
		'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_LIST_PROGRESS_DESC'),
		'attr'=>array(
			'admin_label'=>array(
					'type'=>'text',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
					'std'=> ''
				),
			'img'=>array(
				'type'=>'media',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE_DESC'),
				'std'=>'',
				),
			'link_video'=>array(
				'type'=>'text',
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_LINK_VIDEO'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_LINK_VIDEO_DESC'),
				'std'=>'Link video',
			),
			'class'=>array(
				'type'=>'text', 
				'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
				'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
				'std'=> ''
				),
			'repetable_item'=>array(
				'type'=>'repeatable',
				'addon_name' =>'sp_vs_list_progress_item',
				'title'=> 'Repetable', 
				'attr'=>  array(
					'title'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_NAME'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_NAME_DESC'),
						'std'=>'Item Title',
						),
					'number'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_NUMBER'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_NUMBER_DESC'),
						'std'=>'10',
						),
					)
				),

			)

	)
);

