<?php
//Getting the categories
$con = mysqli_connect("localhost","root","","furniture_shop");


function getcats(){
	
			global $con;

			$get_cats = "select * from category";

			$run_cats = mysqli_query($con,$get_cats);

			while($row_cats = mysqli_fetch_array($run_cats))
			{
				$cat_ID = $row_cats['ID'];
				$cat_title = $row_cats['Category_Name'];

				echo "<li><a href='#' >$cat_title</a>";
				
				print('<div class="dropdown-menu">');
				print('<ul>') ;

				getsubcats($cat_ID);

				echo "</ul></div>";
			}
			
} 

function getsubcats($cat_ID)
	{
		global $con;

		$get_subcats = "select * from sub_categories where categoryID=$cat_ID";

		$run_subcats = mysqli_query($con,$get_subcats);
		while ($row_subcats=mysqli_fetch_array($run_subcats)) 
		{
			$subcat_name = $row_subcats['sub_category'];

			echo "<li><a href='#'>$subcat_name</a></li>";
		}
	}

?>