<?php
/**
 * The admin view file of widget module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     widget
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<form action="<?php echo inlink('create', "type={$type}");?>" method='post' id='ajaxForm'>
<table class='table table-form'>
  <tr>
    <th class='w-100px'><?php echo $lang->widget->type; ?></th>
    <td>
      <div class="dropdown">
        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
          <?php echo zget($lang->widget->typeList, $type, $lang->widget->type);?>
          <span class="caret"></span>
        </button>
        <ul aria-labelledby="dropdownMenu1" role="menu" class="dropdown-menu">
          <?php foreach($lang->widget->typeList as $code => $name):?>
          <li <?php if($code == $type) echo "class='active'";?>><?php echo html::a(inlink('create', "type={$code}"), $name, "class='loadInModal'");?></li>
          <?php endforeach;?>
        </ul>
      </div>
    </td>
  </tr>
  <tr>
    <th class='w-100px'><?php echo $lang->widget->title?></th>
    <td><?php echo html::input('title', $widget ? $widget->title : zget($lang->widget->typeList, $type, ''), "class='form-control'")?></td>
  </tr>
  <tr>
    <th><?php echo $lang->widget->style;?></th>
    <td>
      <div class='w-240px'>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->widget->grid;?></span>
          <?php echo html::select('grid', $config->widget->gridOptions, $widget ? $widget->grid : 4, "class='form-control'")?>
          <div class='input-group-btn widget'>
            <?php $btn = isset($widget->params->color) ? 'btn-' . $widget->params->color : 'btn-default'?>
            <button type='button' class="btn <?php echo $btn;?> dropdown-toggle" data-toggle='dropdown'>
              <?php echo $lang->widget->color;?> <span class='caret'></span>
            </button>
            <?php echo html::hidden('params[color]', isset($widget->params->color) ? $widget->params->color : 'default');?>
            <div class='dropdown-menu buttons'>
              <li><button type='button' data-id='default' class='btn btn-widget btn-default'>&nbsp;</li>
              <li><button type='button' data-id='primary' class='btn btn-widget btn-primary'>&nbsp;</li>
              <li><button type='button' data-id='warning' class='btn btn-widget btn-warning'>&nbsp;</li>
              <li><button type='button' data-id='danger' class='btn btn-widget btn-danger'>&nbsp;</li>
              <li><button type='button' data-id='success' class='btn btn-widget btn-success'>&nbsp;</li>
              <li><button type='button' data-id='info' class='btn btn-widget btn-info'>&nbsp;</li>
            </div>
          </div>
        </div>
      </div>
    </td>
  </tr>
  <?php if(file_exists(strtolower($type) . '.form.html.php')) include strtolower($type) . '.form.html.php';?>
  <tr>
    <th></th>
    <td>
      <?php echo html::submitButton();?>
      <?php echo html::hidden('order', $index);?>
      <?php echo html::hidden('type', $type);?>
    </td>
  </tr>
</table>
</form>
<?php js::set('index', $index)?>
<?php include '../../common/view/footer.modal.html.php';?>
