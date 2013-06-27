<?php include 'header.lite.html.php';?>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <?php echo html::a($this->createLink($this->config->default->module), $lang->xirangEPS, '', "class='brand'");?>
      <?php echo commonModel::createMainMenu($this->moduleName);?>
      <?php echo commonModel::createManagerMenu();?>
     </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row-fluid">
    <?php 
    $moduleMenu = commonModel::createModuleMenu($this->moduleName);
    if($moduleMenu) echo "<div class='span3 leftmenu'>$moduleMenu</div>\n<div class='span9'>\n";
    ?>
