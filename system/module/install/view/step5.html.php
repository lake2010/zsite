<?php
/**
 * The html template file of step4 method of install module of chanzhiEPS.
 *
 * @copyright Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL
 * @author	  Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package	  chanzhiEPS
 * @version	  $Id: step4.html.php 867 2010-06-17 09:32:58Z wwccss $
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<div class='container'>
  <div class='modal-dialog' style='width: 450px'>
    <div class='modal-content'>
      <div class='modal-body'><div class='alert alert-success text-center'><h4><?php echo $lang->install->success;?></h4></div></div>
      <div class='modal-footer'><?php echo html::linkButton($lang->install->visitAdmin, 'admin.php', 'btn btn-success');?></div>
    </div>
  </div>
</div>
<?php include './footer.html.php';?>
