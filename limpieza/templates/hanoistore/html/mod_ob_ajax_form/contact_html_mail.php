<?php
//var_dump($data);die();
?>
<table width="100%">
    <?php for($i=0;$i<count($data);$i++) {?>
    <tr>
        <td><?php echo $data[$i]["name"];?></td>
        <td><?php echo $data[$i]["value"];?></td>
    </tr>
    <?php }?>
</table>
