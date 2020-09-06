<?php 
    date_default_timezone_set('Asia/Jakarta');
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://coronavirus-tracker-api.herokuapp.com/v2/locations");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);
    $convert = json_decode($output, true);
    $convert = $convert["locations"][58]; //indonesia ada di index ke 58 dalam array
    $output = 
	    [
            'result' => 'DT Production', 
            'update' => date('d F Y'),
            'lat' => $convert['coordinates']['latitude'],
            'lng' => $convert['coordinates']['latitude'],
            'negara' => $convert['country'],
            'positif' => $convert['latest']['confirmed'],
            'meninggal' => $convert['latest']['deaths'],
            'sembuh' => $convert['latest']['recovered']
        ];
    $output = json_encode($output);   
    echo $output;
?>