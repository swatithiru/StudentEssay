<html>
	<head>
	
	</head>
	<body>
	<input onclick="change()" type="button" value="Open Curtain" id="myButton1"></input>
	</body>
	<script>
	function change() // no ';' here
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="Close Curtain") elem.value = "Open Curtain";
    else elem.value = "Close Curtain";
}
	</script>
</html>