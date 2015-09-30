<?php 
// print_r(str_replace(".","pink",$arr,$i));
// echo "<br>" . "Replacements: $i";
if (isset($_POST["glucose"])){
echo "het glucose gehalte bedraagt ";
echo $_POST["glucose"];
}
else{
	echo "u heeft niks ingevuld";
}
?>