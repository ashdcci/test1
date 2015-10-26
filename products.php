<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
	div{
		    overflow-x: scroll;
    word-wrap: break-word;
    border:1px solid #ccc;width:800px;height:300px;
	}
	 body {
               
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            h3{
            	font-family: 'Lato';
            }
            #up{
            	display:none;-
            }
	</style>
</head>
<body>
	<?php
$pp =  file_get_contents("http://desiltoe.com/laravel_api/api/v2/api1");
$arr = json_decode($pp);
echo $arr->content;
?>
	<form id="frm">
		<input type="hidden" id="page" name="page" value="insert" />
		<input type="text" id="prod_name" name="prod_name" onkeyup="get_parameter()" placeholder="Product Name" />
		<select id="intCatId" name="intCatId" onchange="get_parameter()">
			<option value="all">All Category</option>
			<option value="1">Citizen</option>
			<option value="2">Seiko</option>
			<option value="3">Fastrack</option>
			<option value="4">Omega</option>
		</select>

		<select id="price" name="price" onchange="get_parameter()">
			<option value="all">Any Price</option>
			<option value="0-100">$0 - $100</option>
			<option value="101-300">$100 - $300</option>
			<option value="301-500">$300 - $500</option>
			<option value="g-500">Above $500</option>
		</select>

		<select name="size" id="size" onchange="get_parameter()">
			<option value="all">Any Size</option>
			<option value="S">Small</option>
			<option value="M">Medium</option>
			<option value="L">Large</option>

		</select>
		<select name="style" id="style" onchange="get_parameter()">
			<option value="all">Any Style</option>
			<option value="D">Diamond</option>
			<option value="S">Sport</option>
			<option value="A">Analog</option>
		</select>

		<select name="order" id="order" onchange="get_parameter()">
			<option value="all">Any order</option>
			<option value="ASC">Price Low to High</option>
			<option value="DESC">Price High to Low</option>
		</select>
		



		</form>
	<hr/>	
<button type="button" onclick="fetch_all('fetch_all')">fetch_all</button>

<h3>Output:</h3>
<div>

	<pre></pre>
</div>
<form id="file11" enctype="multipart/form-data">
<input type="file" name="file" id="file"  />
<input type="hidden" name="page" value="get_file" />
</form>
<hr/>



<button type="button" class="btn btn-small btn-success" onclick="pay_init()">Pay via Paypal</button>
<button type="button" class="btn btn-small btn-info" onclick="pay_authorize()">Pay via Authorize.net</button>
</body>
</html>

<script type="text/javascript">
function fetch_all(){
	$("#frm")[0].reset();
	setTimeout(function(){
		get_parameter();
	},0);
}

function pay_authorize(){
	var page = 'pay_authorize';
	$.ajax({
		url:"operations/curl_operations.php",
		type:"post",
		data:"page="+page,
		success:function(data){
			if(data){
				$("div pre").html(data);
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
				$("div pre").html(data);
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
				$("div pre").html(data);
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
				$("div pre").html(data);
			}else{
				alert('not data fetch/error in fetch data');
			}
		},error:function(data){
			alert('error in send or receive data');
		}

	});
}

	
</script>