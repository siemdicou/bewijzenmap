<div id="navigation">
	<ul class="menu">
		<li><a href="<?php echo DIRADMIN;?>">Terug</a></li>		
		<li><a href="<?php echo DIR;?>" target="_blank">Bekijk Website</a></li>
		<li><a href="<?php echo DIRADMIN;?>?logout">Uitloggen</a></li>
	</ul>
</div>
<div id="content">


<h1>Beheer artikelen</h1>

<table>
<tr>
	<th><strong>Titel</strong></th>
	<th><strong>Actie</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM pages ORDER BY pageID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->pageTitle</td>";
	
			echo "<td><a href=\"".DIRADMIN."editpage_ned.php?id=$row->pageID\">Aanpassen</a> </td>";
		
		
	echo "</tr>";
}
?>
</table>

</div>


</div><!-- close wrapper -->

</body>
</html>