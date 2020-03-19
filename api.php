<?php

function currency($from_Currency,$to_Currency,$amount) {
  $amount = urlencode($amount);
  $from_Currency = urlencode($from_Currency);
  $to_Currency = urlencode($to_Currency);
  $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
  $ch = curl_init();
  $timeout = 0;
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $rawdata = curl_exec($ch);
  curl_close($ch);
  $data = explode('"', $rawdata);
  $data = explode('.', $data['3']);
  $data[0] = str_replace(" ", "",preg_replace('/\D/', '',  $data[0]));

  if(isset($data[1])){
    $data[1] = str_replace(" ", "",preg_replace('/\D/', '', $data[1]));
    $var = $data[0].".".$data[1];        
  } else{
    $var = $data[0];
  }

  if(isset($_GET['utm_source'])){
    echo $_GET['utm_source'];
  }
  else{
    echo 'Source not found';
  }

  return round($var,2); 
}