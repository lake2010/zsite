<?php
/**
 * The create view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<form method='post' id='ajaxForm'>
<table align='center' class='table table-form table-bordered'>
  <caption><?php echo $lang->block->create;?></caption>
  <tr>
    <th class='w-120px'><?php echo $lang->block->type;?></th>
    <td><?php echo html::select('type', $lang->block->typeList, $type, 'class=select-4');?></td>
  </tr>
  <tr>
    <th><?php echo $lang->block->title;?></th>
    <td><?php echo html::input('title', $type == 'html' ? '' : $lang->block->typeList[$type], $type == 'html' ? "class='text-1'" : "class='text-4'");?></td>
  </tr>
  <?php echo $this->fetch('block', 'blockForm', 'type=' . $type);?>
  <tbody id='blockForm'></tbody>
  <tr>
    <th></th>
    <td class='a-left'><?php echo html::submitButton();?></td>
  </tr>
</table>
</form>
<?php include '../../common/view/footer.admin.html.php';?>
