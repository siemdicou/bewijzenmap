	</main>

	<div id="search" class="cd-main-search">
		<form>

			<input type="search" name="search" onKeyUp="showList(this.value)" placeholder="Search...">

		</form>

		<div class="cd-search-suggestions">
			<div class="news">
				<h3>Results</h3>
				<ul id="txtHint">
					
				</ul>
			</div>

			<div class="quick-links">
				<h3>New Uploads</h3>
				<ul>
					<?php include 'models/top.php'; ?>
				</ul>
			</div>
		</div>

		<a href="#0" class="close cd-text-replace">Close Form</a>
	</div>
</body>
</html>