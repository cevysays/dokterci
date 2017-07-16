<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class Aktivasi
{
  var $CI;
  var $table = 'rad_setting';
   
  function cekRegKey()
 {
  $CI =& get_instance();
  $query = $CI->db->get($this->table);
  $data = $query->row();
  $appid = $this->_getID($data->nama, 6);
  $reg = $this->_getKey($appid, 10);
  
  if($data->reg_key == $reg)
  {
    $status = TRUE;
  }else
  {
    $status = FALSE;
  }
  
  
  return $status;
     
}


function _getID($str, $len=4)
{
  if( !is_string($str) || (strlen($str) == 0) )
    { 
      return $str; 
    } 
  
    $ret = ''; 
    $len = ( intval($len) >= 4 ) ? intval($len) : 4; 
    $block = array(); 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $block[] = 0; 
    } 
  
    $table = '1234567890'; 
  
    $tblen = strlen($table); 
    for( $i=0, $l=strlen($str); $i<$l; $i++ ) 
    { 
      $idx = $i % $len; 
      $chr = ord(substr($str, $i, 1)); 
      $block[$idx] = ($block[$idx] + $chr) % $tblen; 
      unset($idx, $chr); 
    
    } 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $ret .= substr($table, $block[$i], 1); 
    
     } 
  
    unset($block, $table, $tblen);
    $subkata = substr($str,0,3);
    $kodejadi = $subkata.'-'.$ret;    
    return $kodejadi;
}



function _getKey($str, $len=4)
{
  if( !is_string($str) || (strlen($str) == 0) )
    { 
      return $str; 
    } 
  
    $ret = ''; 
    $len = ( intval($len) >= 4 ) ? intval($len) : 4; 
    $block = array(); 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $block[] = 0; 
    } 
  
    $table = '27ABCM393F6H1JKLMN0PQR57UVWXYDIMASEDU88'; 
  
    $tblen = strlen($table); 
    for( $i=0, $l=strlen($str); $i<$l; $i++ ) 
    { 
      $idx = $i % $len; 
      $chr = ord(substr($str, $i, 1)); 
      $block[$idx] = ($block[$idx] + $chr) % $tblen; 
      unset($idx, $chr); 
    
    } 
  
    for( $i=0; $i<$len; $i++ ) 
    { 
      $ret .= substr($table, $block[$i], 1); 
    
     } 
  
    unset($block, $table, $tblen);
    return $ret;
    
   } 
}
?>