<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<style type="text/css">
	div{
		    overflow-x: scroll;
    word-wrap: break-word;
    border:1px solid #ccc;width:90%;height:300px;
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
            	display:none;
            }
	</style>
</head>
<body>
	<form id="frm">
		<input type="hidden" id="page" name="page" value="insert" />
		<input type="hidden" name="id" id="intId" value="" />
		<input type="text" placeholder="enter url" name="url" />
		<input type="text" name="desc"  placeholder="enter description" />&nbsp;<button type="button" id="in" onclick="curl_oper('insert','')">insert</button>
	</form><button type="button" id="up" onclick="curl_oper('update','')">update</button>
	<hr/>	
<button type="button" onclick="curl_oper('fetch_all','')">fetch_all</button>

<button type="button" onclick="curl_oper('fetch_single','5')">fetch_single</button>
<button type="button" onclick="curl_oper('delete','5')">delete</button>
<button type="button" onclick="curl_oper('delete_all','')">delete all</button>
<button type="button" onclick="set_update()">Update</button>
<h3>Output:</h3>
<div>


	<pre></pre>
</div>

</body>
</html>

<script type="text/javascript">
function curl_oper(page,data){
	if(page=='insert' || page=='update'){
		var dtt = $("#frm").serialize();
	}else{
		var dtt = "page="+page+"&data="+data;
	}
	$("div pre").html('loading....');
	$.ajax({
		url:"operations/curl_operations.php",
		method:"post",
		data:dtt,
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

 function set_update(){
 	$("#intId").val(1);
 	$("#page").val('update');
 	$("#up").show();
 	$("#in").hide();
 }
	
</script>