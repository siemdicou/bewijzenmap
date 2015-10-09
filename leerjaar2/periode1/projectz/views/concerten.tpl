	<section>
	{foreach from=$data item=newsItem}
	<div id="events">
		
	
	<article>
	
	<h1>{$newsItem.title}</h1><br>
	<table width="100%;">
	<tr>
	<td><img src='{$newsItem.image}'></td>
	<td><h3>{$newsItem.location}<br>

	{$newsItem.date}</h3><br><br></td>
	</tr>
	</table>
	<content><h4>{$newsItem.content}</h4></content>


	</article>
	
	</div>
	{/foreach}
	</section>