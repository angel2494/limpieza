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
		'addon_name'=>'sp_vs_team',
		'category'=>'Vinasites',
		'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_LIST_TEAM'),
		'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_LIST_TEAM_DESC'),
		'attr'=>array(
			'title'=>array(
					'type'=>'text',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
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
				'addon_name' =>'sp_vs_team_item',
				'title'=> 'Repetable', 
				'attr'=>  array(
					'title'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
						'std'=> 'Item'
					),
					'img'=>array(
						'type'=>'media',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_IMAGE_DESC'),
						'std'=>'',
					),
					'name'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_NAME'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_NAME_DESC'),
						'std'=>'Item Title',
						),
					'job'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_JOB'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_JOB_DESC'),
						'std'=>'',
						),
					'content'=>array(
						'type'=>'editor',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CONTENT'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CONTENT'),
						'std'=> ''
					),
					'fb'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_FB'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_FB_DESC'),
						'std'=>'#',
					),
					'tw'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TW'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TW_DESC'),
						'std'=>'#',
					),
					'in'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_IN'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_IN_DESC'),
						'std'=>'#',
					),
					'go'=>array(
						'type'=>'text',
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_GO'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_GO_DESC'),
						'std'=>'#',
					),
				)
			),

		)

	)
);

