<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    1/23/16 12:29 PM
 * Author     foobla | noreply@foobla.com | http://foobla.com
 * Copyright  Copyright (C) 2016 betweenbrain llc. All Rights Reserved.
 * License    GNU General Public License version 2, or later.
 */

?>
<div class="vs_ajax_product_search">
    <form id="form_search" action="<?php echo JRoute::_('index.php?option=com_virtuemart&view=category&search=true&limitstart=0&virtuemart_category_id='.$category_id ); ?>" method="POST">
        <div class="wrap vs_clear">
            <div class="list_cat">
                <div class="select_cat"><span id="outside"><?php echo JText::_('MOD_OB_AJAX_PRODUCT_SEARCH_ALL_CATEGORY'); ?></span><i class="fa fa-sort-desc"></i></div>
                <div class="lists">
                    <ul>
                        <li><span style="display: none;">0</span><a href=""><strong><?php echo JText::_('MOD_OB_AJAX_PRODUCT_SEARCH_ALL_CATEGORY'); ?></strong></a></li>
                    <?php
                    foreach ($cats as $category) {
                        $caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
                        $cattext = $category->category_name;
                        ?>
                        <li>
                            <span style="display: none;"><?php echo $category->virtuemart_category_id;?></span>
                            <?php echo JHTML::link($caturl, $cattext); ?>
                        </li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
            <div class="input_search">
                <input type="search" name="keyword" placeholder="<?php echo JText::_('MOD_OB_AJAX_PRODUCT_SEARCH_TEXT'); ?>">
            </div>
            <button type="submit" form="form_search" value="Submit"><i class="fa fa-search fa-lg"></i></button>
            <input type="hidden" name="limitstart" value="0" />
            <input type="hidden" name="option" value="com_virtuemart" />
            <input type="hidden" name="view" value="category" />
            <input type="hidden" name="virtuemart_category_id" value="0">
        </div>
    </form>
    <div class="list_key">
        <label>Hot Search:</label>
        <a href="">promotion</a> <a href="">iphoneSE</a> <a href="">lumia650</a> <a href="">Pampers</a> <a href="">iphone6s</a> <a href="">laptop</a>
    </div>
</div>
