<html>
<head>
	<title></title>
	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
	#opt{
		    overflow: scroll;
    word-wrap: break-word;
    border:1px solid #ccc;width:600px;height:600px;
	}
	#opt pre{overflow: auto;}
	 body {
               
                width: 100%;
                display: table;
                font-weight: 100;
                
            }
            h3{
            	font-family: 'arial sans-sarif';
            }
            #up{
            	display:none;
            }
            .row{width:100%;}
	</style>
</head>
<body>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6">
			<h1>Input</h2>
				<hr/>
			<h2>User Register</h2>
	<form id="frm_reg" method="post" action="http://localhost/basket/new1/register">
		<input type="hidden" id="page" name="page" value="user_register" />
		<input type="hidden" name="_token" value="D8tlw2UwK2WTfA7C1apBAQAcdvA6xBR9">
		<input type="text" name="fname" placeholder="fname" />
		<input type="text" name="lname" placehosler="lname" />
		<input type="email" name="email_address" placeholder="email" />
		<input type="password" name="password" placeholder="password" />
		<button type="button" onclick="user_register()" >User Register</button>
		</form>
	<hr/>	

	<h2>User Login</h2>
	<form id="frm_login">
		<input type="hidden" id="page" name="page" value="user_login" />
		<input type="email" name="email_address" placeholder="email" />
		<input type="password" name="password" placeholder="password" />
		<button type="button" onclick="user_login()">User Login</button>
		



		</form>
	<hr/>	
	<h2>Add Event</h2>
	<form id="frm_login">
		<input type="hidden" id="page" name="page" value="add_event" />
		<input type="email" name="email_address" placeholder="email" />
		<input type="password" name="password" placeholder="password" />
		<button type="button" onclick="curl_opt('add_event')">Add Event</button>

		<button type="button" onclick="curl_opt('add_event_desc')">Add Event Desc.</button>
		<button type="button" onclick="curl_opt('fetch_all_tournament')">All Tournament</button>
		<button type="button" onclick="curl_opt('add_tour_settings')">Add Tournament Settings</button>
		<button type="button" onclick="curl_opt('fetch_single_tournament')">Fetch Single Tournament Settings</button>
		<button type="button" onclick="curl_opt('update_tournament_details')">Update Tournament Settings</button>


		</form>
	<hr/>	

	<h2>Add Team</h2>
	<form id="frm_team"  enctype="multipart/form-data">
		<input type="hidden" id="page" name="page" value="add_team" />
		<input type="text" name="team_name" placeholder="team name" />
		<input type="text" name="team_color" placeholder="team color" />
		<input type="file" id="file1" name="file"   placeholder="team logo" />
		<button type="button" onclick="add_team()">Add Team</button>
		</form>
	<hr/>	

	<h2>Add Player</h2>
	<form id="frm_player"  enctype="multipart/form-data">
		<input type="hidden" id="page" name="page" value="add_player" />
		<input type="text" name="player_name" placeholder="player name" />
		<input type="file" id="file21" name="file1" placeholder="player Adv Image" />
		<input type="file" id="file2" name="file" placeholder="player Profile" />

		<button type="button" onclick="add_player()">Add Team</button>
		</form>
	<hr/>	

		</div>

		<div class="col-lg-6 col-sm-6 col-md-6">
			<h3>Output:</h3>
			<div id="opt">

				<pre></pre>
			</div>
		</div>
	</div>



	



</body>
</html>

<script type="text/javascript">

$(function(){
	$("#file1").on('change',function(){
		 var data = new FormData($("#frm_team")[0]);
	 $.ajax({
		async: false,
        url:"operations/curl_operations.php",
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
         processData: false, // Don't process the files
         contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data) {

           if(data){
				$("#opt pre").html(data);
			}else{
				alert('error in upload file');
			}
        },
        error: function(data) {
            // response = data;
            // return response;
        }


	});


	});

	$("#file2").on('change',function(){
		 var data = new FormData($("#frm_player")[0]);
	 $.ajax({
		async: false,
        url:"operations/curl_operations.php",
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
         processData: false, // Don't process the files
         contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data) {

           if(data){
				$("#opt pre").html(data);
			}else{
				alert('error in upload file');
			}
        },
        error: function(data) {
            // response = data;
            // return response;
        }


	});


	});


});

function add_team(){
	
}



function curl_opt(opr){
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:"page="+opr,
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert("no data fetch from curl");
			}
		},	
		error:function(data){
			alert('data fetch error');
		}
	});
}
function user_login(){
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:$("#frm_login").serialize(),
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert("no data fetch from curl");
			}
		},	
		error:function(data){
			alert('data fetch error');
		}
	});
}

function user_register(){
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:$("#frm_reg").serialize(),
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert("no data fetch from curl");
			}
		},	
		error:function(data){
			alert('data fetch error');
		}
	});
}



function fetch_all(){
	$("#frm")[0].reset();
	setTimeout(function(){
		get_parameter();
	},0);
}

function curl_register(){
	var frm = $("#frm_reg").serialize();
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:frm,
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert("no data fetch from curl");
			}
		},	
		error:function(data){
			alert('data fetch error');
		}
	});
}

function pay_init(){
	var page = "paypal_payment";
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:"page="+page,
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert('error in upload file');
			}
		},
		error:function(data){
			alert('error in send or fetch data');
		}
	});
}

$("#file").on('change',function(){
	 var data = new FormData($("#file11")[0]);
    


	$.ajax({
		async: false,
        url:"operations/curl_operations.php",
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data) {

           if(data){
				$("#opt pre").html(data);
			}else{
				alert('error in upload file');
			}
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // response = data;
            // return response;
        }


	});
});

function get_parameter(){
	var intCatId = $("#intCatId option:selected").val();
	var prod_name = $("#prod_name").val();
	var price = $("#price option:selected").val(); 
	var size = $("#size option:selected").val(); 
	var style = $("#style option:selected").val(); 
	var order = $("#order option:selected").val(); 

$("div pre").html('loading....');
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:"page=get_search_parameter&prod_name="+prod_name+"&price="+price+"&intCatId="+intCatId+"&size="+size+"&style="+style+"&order="+order,
		success:function(data){
			if(data){
				$("#opt pre").html(data);
			}else{
				alert('not data fetch/error in fetch data');
			}
		},error:function(data){
			alert('error in send or receive data');
		}

	});
}

	
</script>