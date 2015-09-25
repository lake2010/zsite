<?php if(commonModel::isAvailable('stat')):?>
<?php 
$referer = $this->server->http_referer;
if(!empty($referer))
{
    $refererInfo = parse_url($referer);
    if($this->server->http_host == $refererInfo['host']) $referer = '';
}
?>
<script>
var logLink = "<?php echo helper::createLink('log', 'record')?>";
var referer         = "<?php echo urlencode($referer);?>";
var browserLanguage = navigator.language || navigator.userLanguage; 
var resolution      = screen.availWidth + ' X ' + screen.availHeight;
$.get(logLink, {referer:referer, browserLanguage:browserLanguage, resolution:resolution});
</script>
<?php endif;?>
