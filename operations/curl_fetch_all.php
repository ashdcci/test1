<?php 
$curl_handle=curl_init();
$data = array('email'=>'admin@gmail.com','password'=>'123456','token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f');
  curl_setopt($curl_handle,CURLOPT_URL,'http://localhost/laravel_api/api/v1/url?email=admin@gmail.com&password=123456&_token=BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f');
  //curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
                                            'Content-Type: application/json',
                                            'Connection: Keep-Alive'
                                            ));
  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
      print $buffer;
  }
//api/todo?email=admin@gmail.com&password=123456&token=BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f
?>