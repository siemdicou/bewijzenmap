<div class="cd-cover-layer"></div>
	<nav role="navigation">
		<ul class="cd-pagination no-space">
			<li class="button"><a href="?movies=all&page=<?php echo $page - 1; ?>"<?php if($page === 1) { echo 'class="disabled"'; } ?>><i class="fa fa-arrow-left"></i></a></li>
			<?php for($x = 1; $x <=$pages; $x++): ?>
				<li><a href="?movies=all&page=<?php echo $x; ?>"<?php if($page === $x) { echo 'class="current"'; } ?>><?php echo $x; ?></a></li>
			<?php endfor ?>
			<li class="button"><a href="?movies=all&page=<?php echo $page + 1; ?>"<?php if($page === $intPages) { echo 'class="disabled"'; } ?>><i class="fa fa-arrow-right"></i></a></li>
		</ul>
	</nav>
</div>