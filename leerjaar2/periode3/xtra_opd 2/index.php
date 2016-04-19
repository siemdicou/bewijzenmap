<?php
	
	require_once 'config/config.php';
	require_once 'library/database.php';

	include 'views/template1.php';


	$movies = (empty($_GET['movies'])) ? '' : $_GET['movies'];
	$us = (empty($_GET['us'])) ? '' : $_GET['us'];

	switch ($movies) {

		case 'all':

			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$perPage = 8;

			$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
			
			$result = $mysqli->query("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM content
			ORDER BY time_add DESC
			LIMIT {$start}, {$perPage}
			");

			$total = $mysqli->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
			$pages = ceil($total / $perPage);

			$intPages = (int)$pages;

			echo '<ul class="cd-items cd-container">';

			while($movie = $result->fetch_assoc()){
			
				echo '<li class="cd-item" id="item'.$movie['id'].'">';
				echo '<a href="?movies=item&id='.$movie['id'].'"><img src="movies/'.$movie['img'].'" alt="'.$movie['title'].'"></a>';
				echo '<a href="?movies=item&id='.$movie['id'].'" class="cd-trigger">Views:'.$movie['views'].'</a>';
				echo '</li>';

			};

			echo '</ul>';

			include 'views/paginationAll.php';

			break;

		case 'trending':

			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$perPage = 8;

			$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
			
			$result = $mysqli->query("
			SELECT SQL_CALC_FOUND_ROWS *
			FROM content
			ORDER BY views DESC
			LIMIT {$start}, {$perPage}
			");

			$total = $mysqli->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
			$pages = ceil($total / $perPage);

			$intPages = (int)$pages;

			echo '<ul class="cd-items cd-container">';

			while($movie = $result->fetch_assoc()){
			
				echo '<li class="cd-item" id="item'.$movie['id'].'">';
				echo '<a href="?movies=item&id='.$movie['id'].'"><img src="movies/'.$movie['img'].'" alt="'.$movie['title'].'"></a>';
				echo '<a href="?movies=item&id='.$movie['id'].'" class="cd-trigger">Views: '.$movie['views'].'</a>';
				echo '</li>';

			};

			echo '</ul>';

			include 'views/paginationTrending.php';

			break;

		case 'item':

			$id = $_GET['id'];

			$result = $mysqli->query("
			SELECT *
			FROM content
			WHERE id = $id
			");

			while($movie = $result->fetch_assoc()){

				echo '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$movie['yt_link'].'?autoplay=1&rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';

				echo '<div id="item_container">';
				echo '<img src="movies/'.$movie['img'].'">';
				echo '<div id="item_right">';
				echo '<h1>'.$movie['title'].'</h1>';
				echo '<h2>'.$movie['year'].'</h2>';
				echo '<p>'.$movie['description'].'</p>';
				echo '</div>';
				echo '</div>';

			};

			$views_amount= "UPDATE content SET views=views+1 WHERE id=('".$id."')";
	        $result = $mysqli->query($views_amount);

			break;

	};

	switch ($us) {

		case 'about':

			include 'views/about.php';

			break;
	}

	include 'views/template2.php';

?>