<?php
$page = $_POST['page'];

switch($page){
	case 'fetch_all':{
		
$curl_handle=curl_init();

$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f');

curl_setopt($curl_handle,CURLOPT_URL,'http://localhost/laravel_api/api/v1/url'); 
$header = array('Content-type: text/xml;charset=\"utf-8\"');
//curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl_handle,CURLOPT_POST, count($data));
curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);


  $buffer = curl_exec($curl_handle);
  //$resp = curl_exec($curl_handle);

  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
  //	print_r($data);
     // print $buffer;
  }
//api/todo?email=admin@gmail.com&password=123456&token=BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f
  break;
	}
	 case 'insert':{
	 	$curl_handle=curl_init();
		$url = 'http://desiltoe.com/laravel_api/api/v1/store';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
			'desc'=>mysql_escape_string($_POST['desc']),'url'=>mysql_escape_string($_POST['url']));
		// $main_param = '?email=admin@gmail.com&password=123456&_token=BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f';
		// $extra_param = '&desc='.mysql_escape_string($_POST['desc']).'&url='.mysql_escape_string($_POST['url']).'';
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  //curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
		  

curl_setopt($curl_handle,CURLOPT_POST, count($data));
curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		      print $buffer;
		  }
	 	break;
	 }
	 case 'fetch_single':{
	 	$curl_handle=curl_init();
		$url = 'http://desiltoe.com/laravel_api/api/v1/show';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
			'id'=>mysql_escape_string($_POST['data']));
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, count($data));
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		     // print $buffer;
		  }
	 	break;
	 }
	 case 'delete':{
	 	$curl_handle=curl_init();
		$url = 'http://desiltoe.com/laravel_api/api/v1/destroy';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
			'id'=>mysql_escape_string($_POST['data']));
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, count($data));
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		     // print $buffer;
		  }
	 	break;
	 }
	 case 'delete_all':{
	 	$curl_handle=curl_init();
		$url = 'http://desiltoe.com/laravel_api/api/v1/destroy_all';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f');
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, count($data));
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		    //  print $buffer;
		  }
	 	break;
	 }
	  case 'update':{
	 	$curl_handle=curl_init();
		$url = 'http://desiltoe.com/laravel_api/api/v1/update';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
			'desc'=>mysql_escape_string($_POST['desc']),'url'=>mysql_escape_string($_POST['url']),'id'=>$_POST['id']);
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, count($data));
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		    //  print $buffer;
		  }
	 	break;
	 }


	 case 'get_search_parameter':{
	 	$curl_handle=curl_init();
		$url = 'http://localhost/laravel_api/api/v1/get_search_parameter';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
			'prod_name'=>mysql_escape_string($_POST['prod_name']),'intCatId'=>$_POST['intCatId'],'price'=>$_POST['price'],
			'size'=>$_POST['size'],'style'=>$_POST['style'],'order'=>$_POST['order']);
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, count($data));
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);
		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		    //  print $buffer;
		  }
	 	break;
	 }
	 case 'get_file':{
	 	
	 	$curl_handle=curl_init();
	 	
	 	$header = array('Content-Type: multipart/form-data');
	 	$tmpfile = $_FILES['file']['tmp_name'];
		$filename = basename($_FILES['file']['name']);
		$url = 'http://localhost/laravel_api/api/v1/get_file';
		$data = array('email'=>'admin@gmail.com','password'=>'123456','_token'=>'BrQYZS8Na8CdjnyfiXUrq35KSnT9x4f',
		 'file' =>  curl_file_create($tmpfile, $_FILES['file']['type'], $filename));
		
		  curl_setopt($curl_handle,CURLOPT_URL,$url);
		  curl_setopt($curl_handle,CURLOPT_POST, 1);
		  curl_setopt($curl_handle,CURLOPT_POSTFIELDS, $data);
		  $buffer = curl_exec($curl_handle);

		  curl_close($curl_handle);
		  if (empty($buffer)){
		      print "Nothing returned from url.<p>";
		  }
		  else{
		   //  echo json_encode(array($buffer));
		  	print $buffer;
		  }
	 	break;
	 }
	 case 'paypal_payment':{

	 	$curl = curl_init();
	 	$url = 'http://localhost/laravel_api/paypal_payment';
	 	curl_setopt($curl, CURLOPT_URL, $url);
	 	$buffer = curl_exec($curl);
	 	curl_close($curl);
	 	if(empty($buffer)){
	 		echo 'Nothing Returned from Url';
	 	}
	 	break;
	 }

	 case 'pay_authorize':{
	 	pay_authorize();
	 	break;
	 }
	 case 'user_register':{
	 	user_register();
	 	break;
	 }
	 case 'user_login':{
	 	user_login();
	 	break;
	 }
	 case 'add_event':{
	 	add_event();
	 	break;
	 }
	  case 'add_event_desc':{
	  	add_event_desc();
	  	break;
	  }

	  case 'fetch_all_tournament':{
	  	fetch_all_tournament();
	  	break;
	  }
	  case 'add_team':{
	  	add_team();
	  	break;
	  }
	  case 'add_player':{
	  		add_player();
	  		break;
	  }
	  case 'add_tour_settings':{
	  	add_tour_settings();
	  	break;
	  }

	  case 'fetch_single_tournament':{
	  	fetch_single_tournament();
	  	break;
	  }
	  
	  case 'update_tournament_details':{
	  	update_tournament_details();
	  	break;
	  }
}

function pay_authorize(){
	$curl = curl_init();
	$url = "http://localhost/laravel_api/pay_authorize";
	curl_setopt($curl, CURLOPT_URL, $url);
	$buffer = curl_exec($curl);
	curl_close($curl);
	if(empty($buffer)){
		echo 'Nothing Return from Url';
	}
}

function user_register(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/user_register";
		$data = array('email_address'=>''.$_POST['email_address'].'','fname'=>''.$_POST['fname'].'','lname'=>''.$_POST['lname'].'',
			'password'=>''.$_POST['password'].'','_token'=>'D8tlw2UwK2WTfA7C1apBAQAcdvA6xBR9');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}

	function user_login(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/user_login";
		$data = array('email'=>''.$_POST['email_address'].'',
			'password'=>''.$_POST['password'].'','_token'=>'D8tlw2UwK2WTfA7C1apBAQAcdvA6xBR9');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}

	function add_event(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/add_event";
		$data = array('email'=>'ashish.dadhich11@gmail.com','competitive_level'=>1,'league_level'=>1,'public_status'=>1,'city_name'=>'CA','zipcode'=>'334001','password'=>'123456');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}

	function add_event_desc(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/add_event_desc";
		$data = array('email'=>'ashish.dadhich11@gmail.com','tournament_name'=>'demo Tournament','tournament_type'=>1,'team_number'=>1,'court_number'=>'1',
			'start_date'=>date('Y-m-d H:i:s'),'end_date'=>date('Y-m-d H:i:s', strtotime('+2 days') ),'password'=>'123456','intEventId'=>2);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}
	// fetch all tournaments
	function fetch_all_tournament(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/fetch_all_tournament";
		$data = array('email'=>'ashish.dadhich11@gmail.com','password'=>'123456');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}




	// add team

	function add_team(){
		$curl = curl_init();
		$header = array('Content-Type: multipart/form-data');
	 	$tmpfile = $_FILES['file']['tmp_name'];
		$filename = basename($_FILES['file']['name']);
		$url = "http://localhost/basket/new1/event/add_team";
		$data = array('email'=>'ashish.dadhich11@gmail.com','password'=>'123456','team_name'=>''.$_POST['team_name'].'',
			'team_color'=>''.$_POST['team_color'].'','intTourId'=>1,
		 'file' =>  curl_file_create($tmpfile, $_FILES['file']['type']),'file_ext'=>$filename );
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}

	function add_player(){
		$curl = curl_init();
		$header = array('Content-Type: multipart/form-data');
	 	$tmpfile = $_FILES['file']['tmp_name'];
		$filename = basename($_FILES['file']['name']);
	 	$tmpfile1 = $_FILES['file1']['tmp_name'];
		$filename1 = basename($_FILES['file1']['name']);
		$url = "http://localhost/basket/new1/event/add_player";
		$data = array('email'=>'ashish.dadhich11@gmail.com','password'=>'123456','player_name'=>''.$_POST['player_name'].'','intTourId'=>1,
		 'file' =>  curl_file_create($tmpfile, $_FILES['file']['type']),'file_ext'=>$filename,'intTeamId'=>1,'file1'=>curl_file_create($tmpfile1,$_FILES['file']['type']),'file_ext1'=>$filename1 );
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}


	function add_tour_settings(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/add_tour_settings";
		$data = array('email'=>'ashish.dadhich11@gmail.com','intTourId'=>1,'game_dates'=>date('Y-m-d H:i:s'),'games_per_day'=>'1','games_per_court'=>'1',
			'conversation_status'=>true,'auto_cancel'=>true,'cancel_type'=>'R','cancel_low_temp'=>'1','cancel_high_temp'=>'35','password'=>'123456');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}

// start update tournament settings

	function fetch_single_tournament(){
		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/fetch_single_tournament";
		$data = array('email'=>'ashish.dadhich11@gmail.com','intTourId'=>1,'password'=>'123456');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}

	}

	function update_tournament_details(){

		$curl = curl_init();
		$url = "http://localhost/basket/new1/event/update_tournament_details";
		$data = array('email'=>'ashish.dadhich11@gmail.com','intTourId'=>1,'game_dates'=>date('Y-m-d H:i:s'),'games_per_day'=>'1','games_per_court'=>'1',
			'conversation_status'=>'1','auto_cancel'=>'0','cancel_type'=>'S','cancel_low_temp'=>'3','cancel_high_temp'=>'45','password'=>'123456');
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_POST, 1);
		curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
		$buffer = curl_exec($curl);
		curl_close($curl);
		if(empty($buffer)){
			echo 'Nothing Return from Url';
		}
	}


	



	
	// end update tournament settings