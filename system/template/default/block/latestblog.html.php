{*php
/**
 * The latest blog front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV12 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
/php*}
{$themeRoot = $config->webRoot . 'theme/'}

{$content  = json_decode($block->content)}
{$method   = 'get' . ucfirst(str_replace('blog', '', strtolower($block->type)))}
{$articles = $model->loadModel('article')->$method(empty($content->category) ? 0 : $content->category, $content->limit, 'blog')}
{if(isset($content->image))} {$articles = $model->loadModel('file')->processImages($articles, 'blog')} {/if}

<div id="block{!echo $block->id}" class='panel panel-block {!echo $blockClass}'>
  <div class='panel-heading'>
    <strong>{!echo $icon . $block->title}</strong>
    {if(!empty($content->moreText) and !empty($content->moreUrl))}
      <div class='pull-right'>{!echo html::a($content->moreUrl, $content->moreText)}</div>
    {/if}
  </div>
  {if(isset($content->image))}
    {$pull     = $content->imagePosition == 'right' ? 'pull-right' : 'pull-left'}
    {$imageURL = !empty($content->imageSize) ? $content->imageSize . 'URL' : 'smallURL'}
    <div class='panel-body'>
      <div class='items'>
   
      {foreach($articles as $article)}
      {$url = helper::createLink('blog', 'view', "id=$article->id", "category={{$article->category->alias}}&name=$article->alias")}
   
        <div class='item'>
          <div class='item-heading'>
            {if(isset($content->showCategory) and $content->showCategory == 1)}
              {if($content->categoryName == 'abbr')}
                {$categoryName = '[' . ($article->category->abbr ? $article->category->abbr : $article->category->name) . '] '}
                {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), $categoryName)}
              {else}
                {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), '[' . $article->category->name . '] ')}
              {/if}
            {/if}
            <strong>{!echo html::a($url, $article->title, "style='color:{{$article->titleColor}}'")}</strong>
          </div>
          <div class='item-content'>
            <div class='text small text-muted'>
              <div class='media {$pull}' style="max-width: {!echo !empty($content->imageWidth) ? $content->imageWidth . 'px' : '60px'}">
              {if(!empty($article->image))}
                {$title = $article->image->primary->title ? $article->image->primary->title : $article->title}
                {!html::a($url, html::image($model->loadModel('file')->printFileURL($article->image->primary->pathname, $article->image->primary->extension, 'article', $imageURL), "title='$title' class='thumbnail'" ))}
              {/if}
              </div>
              <strong class='text-important text-nowrap'>
                {if(isset($content->time))} {!echo "<i class='icon-time'></i> " . formatTime($article->addedDate, DT_DATE4)} {/if}
              </strong> 
              &nbsp;{$article->summary}
            </div>
          </div>
        </div>
        {/foreach}
      </div>
    </div>
  {else}
    <div class='panel-body'>
      <ul class='ul-list'>
        {foreach($articles as $article)}
          {$alias = "category={{$article->category->alias}}&name={{$article->alias}}"}
          {$url   = helper::createLink('blog', 'view', "id=$article->id", $alias)}
          {if(isset($content->time))}
            <li>
              {if(isset($content->showCategory) and $content->showCategory == 1)}
                {if($content->categoryName == 'abbr')}
                  {$categoryName = '[' . ($article->category->abbr ? $article->category->abbr : $article->category->name) . '] '}
                  {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), $categoryName)}
                {else}
                  {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), '[' . $article->category->name . '] ')}
                {/if}
              {/if}
              {!echo html::a($url, $article->title, "title='{{$article->title}}' style='color:{{$article->titleColor}}'")}
              <span class='pull-right'>{!echo substr($article->addedDate, 0, 10)}</span>
            </li>
          {else}
            <li>
              {if(isset($content->showCategory) and $content->showCategory == 1)}
              {if($content->categoryName == 'abbr')}
              {$categoryName = '[' . ($article->category->abbr ? $article->category->abbr : $article->category->name) . '] '}
              {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), $categoryName)}
              {else}
              {!echo html::a(helper::createLink('blog', 'index', "categoryID={{$article->category->id}}", "category={{$article->category->alias}}"), '[' . $article->category->name . '] ')}
              {/if}
              {/if}
              {!echo html::a($url, $article->title, "title='$article->title' style='color:{{$article->titleColor}}'")}
            </li>
          {/if}
        {/foreach}
      </ul>
    </div>
  {/if}
</div>
