



	<section>
	{foreach from=$data item=newsItem}
	<div id="newsitem">
		
	
	<article>
	<h1>{$newsItem.title}</h1><br>
	<img src='{$newsItem.img}'><br><br>
	<content>{$newsItem.songs}</content><br><br>
	</article>
	
	</div>
	{/foreach}
	</section>

