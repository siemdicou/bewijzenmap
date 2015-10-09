<div id="imgtitle">
<img src="http://orig00.deviantart.net/5d8d/f/2011/331/6/d/linkin_park_wallpaper_3_by_designsbytopher-d4hjb97.jpg" width="100%" height="200px">
</div>
<div id="menu">
<form action="?page=search" method="POST">
			<a href="?page=home"><img src="http://img3.wikia.nocookie.net/__cb20140321085229/logopedia/images/b/ba/Linkin_Park_logo_2010.png" width="10%;" height="100%;"></a>
	<ul>
		<a href="?page=home"><li {if $curr_page eq 'home'} class="selected"{/if}>Home</li></a>
		<a href="?page=events"><li {if $curr_page eq 'events'} class="selected"{/if}>events</li></a>
		<a href="?page=news"><li {if $curr_page eq 'news'} class="selected"{/if}>newsfeed</li></a>
		<a href="?page=concerten"><li {if $curr_page eq 'concerten'} class="selected"{/if}>concerten</li></a>
		<a href="?page=cd"><li {if $curr_page eq 'cd'} class="selected"{/if}>cd's</li></a>
		<a href="?page=about"><li {if $curr_page eq 'about'} class="selected"{/if}>about</li></a>
<!-- 		<a href="?page=home"><li>newsfeed</li></a>
		<a href="?page=home"><li>newsfeed</li></a>
		<a href="?page=home"><li>newsfeed</li></a> -->

	<input type="text" name="search_string">
	<input type="submit" value="search">
</form>


	</ul>
</div>