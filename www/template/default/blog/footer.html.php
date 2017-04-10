<?php
/**
 * The footer view file of blog module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     blog
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
    <div class='row blocks all-bottom' data-region='all-top'><?php $this->loadModel('block')->printRegion($layouts, 'all', 'bottom', true);?></div>
  </div></div><?php /* end .page-content then .page-wrapper in header.html.php */ ?>
  <footer id='footer'>
    <div class='wrapper'>
      <div id='footNav'>
        <?php echo html::a(helper::createLink('rss', 'index', 'type=blog', '', 'xml'), '<i class="icon icon-rss-sign icon-large"></i>', "target='_blank'"); ?>
      </div>
      <span id='copyright'>
        <?php
        $copyright = empty($config->site->copyright) ? '' : $config->site->copyright . '-';
        echo "&copy; {$copyright}" . date('Y') . ' ' . $config->company->name . '&nbsp;&nbsp;';
        ?>
      </span>
      <span id='icpInfo'><?php echo $config->site->icpSN; ?></span>
      <div id='powerby'>
        <?php
        $chanzhiVersion                   = $config->version;
        $isProVersion                     = strpos($chanzhiVersion, 'pro') !== false;
        if($isProVersion) $chanzhiVersion = str_replace('pro', '', $chanzhiVersion);
        ?>
        <?php printf($lang->poweredBy, $config->version, k(), "<span class='img-chanzhi" . ($isProVersion ? ' img-chanzhi-pro' : '') . "'></span> <span class='name'>" . $lang->chanzhiEPSx . '</span>' . $chanzhiVersion); ?>
      </div>
      <?php if($this->config->site->execInfo == 'show') echo $this->config->execPlaceholder; ?>
    </div>
  </footer>
<a href='#' id='go2top' class='icon-arrow-up' data-toggle='tooltip' title='<?php echo $lang->back2Top; ?>'></a>
</div><?php /* end .page-container in header.html.php */ ?>
<?php include TPL_ROOT . 'common/qrcode.html.php';?>
<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);
?>
<div class='hide'><?php if(RUN_MODE == 'front') $this->loadModel('block')->printRegion($layouts, 'all', 'footer');?></div>
<?php include TPL_ROOT . 'common/log.html.php';?>
</body>
</html>
