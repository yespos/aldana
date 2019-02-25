<?php
    echo "<option value=''>Select</option>";
    foreach ($filterservice as $fil) {
    	echo "<option value='".$fil->id."'>".$fil->item."</option>";
    }

 ?>