<?php
function category_name($id)
{  
    $CI = &get_instance();
    return $CI->db->select(['carType'])->where('id',$id)->get('cartype')->row()->carType;
}

function paymentModeName($id)
{
	$CI = &get_instance();
    return $CI->db->select(['name'])->where('id',$id)->get('payment_method')->row()->name;   
}

function shift_name($id)
{  
    $CI = &get_instance();
    return $CI->db->select(['name'])->where('id',$id)->get('shift')->row()->name;
}

function service_name($id)
{  
    $CI = &get_instance();

    return $CI->db->select(['service'])->where('jobcard_id',$id)->get('jobcardservice')->result();

}

function comapny_list($type)
{  
    $CI = &get_instance();

    return $CI->db->select('*')->where('type',$type)->get('company')->result();

}

function comapny_name($id)
{  
    $CI = &get_instance();

    return $CI->db->select('name')->where('id',$id)->get('company')->row()->name;

}

function filterservice($id)
{  
    $CI = &get_instance();
    return $CI->db->select('item')->where('id',$id)->get('filterservice')->row()->item;
}

function filterservicelist($id,$type)
{  
    $CI = &get_instance();
    return $CI->db->where('company_id',$id)->where('quantity >',0)->where('type',$type)->get('filterservice')->result();
}

function servicetype($id)
{  
    $CI = &get_instance();
    return $CI->db->select('name')->where('id',$id)->get('servicetype')->row()->name;
}

function servicecate($id)
{  
    $CI = &get_instance();
    return $CI->db->select('name')->where('id',$id)->get('servicecate')->row()->name;
}

function washing($id)
{  
    $CI = &get_instance();
    return $CI->db->select('name')->where('id',$id)->get('washing')->row()->name;
}
function servicejob($id)
{  
    $CI = &get_instance();
    return $CI->db->select('name')->where('id',$id)->get('servicejob')->row()->name;
}
function flushing($id)
{
	$CI = &get_instance();
    return $CI->db->select('name')->where('id',$id)->get('flushing')->row()->name;
}
function vehicleModel($id)
{
    $CI = &get_instance();
    return $CI->db->select('carName')->where('id',$id)->get('vehiclemodel')->row()->carName;
}

function region_list($id)
{  
    $CI = &get_instance();

    return $CI->db->select(['region'])->where('id',$id)->get('location')->row()->region;
}

function username($id)
{  
    $CI = &get_instance();
    return $CI->db->select(['name'])->where('id',$id)->get('admin')->row()->name;
}

function multipayment($id,$payid =null)
{  
    $CI = &get_instance();
    $CI->db->where('jobcard_id',$id);
    if($payid){
    $CI->db->where('payment_id',$payid);
    }
    return $CI->db->get('multipayment')->result();
}

function paymentstatus($id)
{  
    $CI = &get_instance();
    $CI->db->where('jobcard_id',$id);
    $data = $CI->db->get('multipayment')->result();
    $i=0;
    foreach ($data as $key => $value) {
      if()
      $payment['paytype'][] = 
    }
}

function getShift()
{
   $CI = &get_instance(); 
   $t=time();
   $time = date("H:i:s",$t);
   return $CI->db->where('startshift<=',$time)->where('endshift>',$time)->where('IsDeleted',0)->get('shift')->row();

}

function numberTowords($num){ 
$decones = array( 
            '01' => "One", 
            '02' => "Two", 
            '03' => "Three", 
            '04' => "Four", 
            '05' => "Five", 
            '06' => "Six", 
            '07' => "Seven", 
            '08' => "Eight", 
            '09' => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            );
$ones = array( 
            0 => " ",
            1 => "One",     
            2 => "Two", 
            3 => "Three", 
            4 => "Four", 
            5 => "Five", 
            6 => "Six", 
            7 => "Seven", 
            8 => "Eight", 
            9 => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            ); 
$tens = array( 
            0 => "",
            2 => "Twenty", 
            3 => "Thirty", 
            4 => "Forty", 
            5 => "Fifty", 
            6 => "Sixty", 
            7 => "Seventy", 
            8 => "Eighty", 
            9 => "Ninety" 
            ); 
$hundreds = array( 
            "Hundred", 
            "Thousand", 
            "Million", 
            "Billion", 
            "Trillion", 
            "Quadrillion" 
            ); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
    if($i < 20){ 
        $rettxt .= $ones[$i]; 
    }
    elseif($i < 100){ 
        $rettxt .= $tens[substr($i,0,1)]; 
        $rettxt .= " ".$ones[substr($i,1,1)]; 
    }
    else{ 
        $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
        $rettxt .= " ".$tens[substr($i,1,1)]; 
        $rettxt .= " ".$ones[substr($i,2,1)]; 
    } 
    if($key > 0){ 
        $rettxt .= " ".$hundreds[$key]." "; 
    } 

} 
$rettxt = $rettxt." Dirhams";

if($decnum > 0){ 
    $rettxt .= " and "; 
    if($decnum < 20){ 
        $rettxt .= $decones[$decnum]; 
    }
    elseif($decnum < 100){ 
        $rettxt .= $tens[substr($decnum,0,1)]; 
        $rettxt .= " ".$ones[substr($decnum,1,1)]; 
    }
    $rettxt = $rettxt." Fils"; 
} 
return $rettxt;

}
 

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }


