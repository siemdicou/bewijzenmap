<div id="navigation">
	<ul class="menu">
		<li><a href="<?php echo DIRADMIN;?>">Back</a></li>		
		<li><a href="<?php echo DIR;?>" target="_blank">View Website</a></li>
		<li><a href="<?php echo DIRADMIN;?>?logout">Logout</a></li>
	</ul>
</div>
<div id="content">


<h1>Manage Articels</h1>

<table>
<tr>
	<th><strong>Title</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM pages_eng ORDER BY pageID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->pageTitle</td>";
			echo "<td><a href=\"".DIRADMIN."editpage_eng.php?id=$row->pageID\">Edit</a></td>";
	echo "</tr>";
}
?>
</table>

</div>

</div><!-- close wrapper -->

</body>
</html>