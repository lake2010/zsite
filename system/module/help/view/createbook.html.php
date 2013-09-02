<?php
/**
 * The create book view file of help of xirangEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     help
 * @version     $Id$
 * @link        http://www.xirang.biz
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class="col-md-12">
  <form id='ajaxForm' method='post' enctype='multipart/form-data'>
    <table class='table table-form'>
      <caption><?php echo $lang->help->createBook;?></caption>
      <tr>
        <th class="w-100px"><?php echo $lang->book->name;?></th>
        <td><?php echo html::input('name', '', 'class=text-1');?></td>
      </tr>
      <tr>
        <th><?php echo $lang->book->summary;?></th>
        <td><?php echo html::textarea('summary', '', "class='area-1' rows='6'");?></td>
      </tr>
      <tr><td colspan='2' class='a-center'><?php echo html::submitButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
