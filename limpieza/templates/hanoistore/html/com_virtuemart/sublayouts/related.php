<?php defined('_JEXEC') or die('Restricted access');

$related = $viewData['related'];
$customfield = $viewData['customfield'];
$thumb = $viewData['thumb'];
$productModel = VmModel::getModel('Product');
$productModel->addImages($related);
?>
<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon',array('product'=>$related));?>
