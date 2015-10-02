
{include file="navigation.tpl"}
{include file="search.tpl"}

	<section>
	{foreach from=$data item=newsItem}
	<div id="newsitem">
		
	
	<article>
	<h1>{$newsItem.title}</h1><br>
	<img src='{$newsItem.image}'><br><br>
	<content>{$newsItem.content}</content><br><br>
	</article>
	
	</div>
	{/foreach}
	</section>