<?php
/**
 * Created by PhpStorm.
 * User: vinhnq
 * Date: 22/08/2016
 * Time: 4:57 CH
 */
defined ('_JEXEC') or die('Restricted access');
$getArray = vRequest::getGet(FILTER_SANITIZE_STRING);
$fieldLink = '';
foreach ($getArray as $key => $value) {
    $key = vRequest::filter($key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_ENCODE_LOW);
    $value = vRequest::filter($value,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_ENCODE_LOW);
    if (is_array ($value)) {
        foreach ($value as $k => $v) {
            if( $v == '') continue;
            $fieldLink .= '&' . urlencode($key) . '[' . urlencode($k) . ']' . '=' . urlencode($v);
        }
    }
    else {
        if($key=='dir' or $key=='orderby') continue;
        if($value == '') continue;
        $fieldLink .= '&' . urlencode($key) . '=' . urlencode($value);
    }
}
$fieldLink = 'index.php?'. ltrim ($fieldLink,'&');
$fields = VmConfig::get ('browse_orderby_fields');
//var_dump($fields);
if (count ($fields) > 1) {
    $link = JRoute::_ ($fieldLink,FALSE);
    $productModel = VmModel::getModel('Product');
    $orderby = vRequest::getString ('orderby', VmConfig::get ('browse_orderby_field'));
    $orderby = $productModel->checkFilterOrder ($orderby);
    $orderDir = '';
    if(isset($orderDirConf))
        $orderDir = vRequest::getCmd ('dir', $orderDirConf);
    if($orderDir == ''){
        $orderDir = 'ASC';
    }
    if(strlen(strstr($orderby, '.')) > 0){
        $arr_orderby = explode('.',$orderby);
        $orderby = $arr_orderby[1];
    } else {
        $orderby = $orderby;
    }
    ?>
    <form action="<?php echo $link;?>" method="get">
        <label><?php echo vmText::_ ('COM_VIRTUEMART_ORDERBY');?></label>
        <select name="orderby" class="autoSubmit">
            <?php
            foreach ($fields as $field) {
                //if ($field != $orderby) {
                $dotps = strrpos ($field, '.');
                if ($dotps !== FALSE) {
                    $prefix = substr ($field, 0, $dotps + 1);
                    $fieldWithoutPrefix = substr ($field, $dotps + 1);
                }
                else {
                    $prefix = '';
                    $fieldWithoutPrefix = $field;
                }
                $text = vmText::_ ('COM_VIRTUEMART_' . strtoupper (str_replace(array(',',' '),array('_',''),$fieldWithoutPrefix)));
                $field = explode('.',$field);
                if(isset($field[1])){
                    $field = $field[1];
                } else {
                    $field = $field[0];
                }
                $link = JRoute::_ ($fieldLink . $manufacturerTxt . '&orderby=' . $field,FALSE);
                ?>
                <option value="<?php echo $field;?>" <?php if($orderby==$field) echo 'selected';?>><?php echo $text;?></option>
                <?php
                //}
            }
            ?>
        </select>
        <select name="dir" class="autoSubmit">
            <option value="ASC" <?php if($orderDir=='ASC') echo 'selected';?>>ASC</option>
            <option value="DESC" <?php if($orderDir=='DESC') echo 'selected';?>>DESC</option>
        </select>
    </form>
    <?php
}