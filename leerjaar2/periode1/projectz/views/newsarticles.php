

// {include file="navigation.tpl"};
// {include file="search.tpl"};
	echo ';

// 
// 



while ($newsItem = $result->fetch_assoc()) {
	echo '<div id="newsitem">';
	echo '<article>';
	echo '<h1>'.$newsItem['id'].'</h1><br>';
	echo '<h1>'.$newsItem['title'].'</h1><br>';
	echo '<img src='.$newsItem['image'].'><br><br>';
	echo '<content>'.$newsItem['content'].'</content><br><br>';
	echo '</article>';
	echo "</div>";
}
echo '';

	<section>
	<div id="newsitem">
	<article>
	<h1>{$newsItem.id}{$newsItem.title}</h1><br>
	<img src='{$newsItem.image}'><br><br>
	<content>{$newsItem.content}</content><br><br>
	</article>
	</div>
	</section>