<!-- 도시를 기반으로 현재날씨 가져오기 -->
<html>
<head>
	<script src="jquery.min.js"></script>
</head>
<body>
	<div style="width:1000px; margin-top:40px; text-align:center">
		<input type=text name="request_url" id="request_url" value="" style="width:700px; height:30px">
		<button onclick="javascript:execShorturl();">단축URL요청</button>
	</div>

	<div style="margin-left:62px;margin-top:45px; color:blue; font-weight:bold">
		결과
		<div id="divResult" style="margin-top:15px">
			<!--input type=text value="" style="width:450px; height:30px">
			->
			<input type=text value="" style="width:450px; height:30px"!-->
		</div>
	</div>
</body>
</html>
<script>
	function execShorturl()
	{
		var request_url = $("#request_url").val();
		if(!request_url)
		{
			alert("먼저 단축하실 URL을 입력해주십시오");
			return false;
		}

		if(request_url)
		{
			//블로그 가져오기..
			$.ajax({
			  type: 'POST',  
			  dataType: 'text',
			  url: "1lib.php",
			  data: { 'url': request_url},
			  cache: false,
			  async: false,
			})
			.done(function( result ) {
				  if(result)
				  {
					  var HTML = '			<input type=text value="'+request_url+'" style="width:450px; height:30px">';
					  HTML += '->'
					  HTML += '<input type=text value="'+result+'" style="width:450px; height:30px">';

					  $("#divResult").html($("#divResult").html() + HTML + "<Br><Br>");
				  }
			})
			.fail(function() {
				alert("에러 발생");
			});
		}
	}
</script>