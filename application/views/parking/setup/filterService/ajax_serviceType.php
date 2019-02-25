 <?php
    echo "<option value=''>Select</option>";
    foreach ($company as $comp) {
    	echo "<option value='".$comp->id."'>".$comp->name."</option>";
    }

 ?>