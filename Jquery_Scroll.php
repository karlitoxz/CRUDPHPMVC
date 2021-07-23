<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    alert($("div").scrollTop() + " px");
    $("div").animate({ scrollTop: $('div').prop("scrollHeight")}, 1000);
  });
});
</script>
</head>
<body>

<div style="border:1px solid black;width:100px;height:150px;overflow:auto">
This is some text. This is some text. This is some text. This is some text. This is some text. This is some text. This is some text. This is some text. This is some text.</div><br>

<button>Return the vertical position of the scrollbar</button>
<p>Move the scrollbar down and click the button again.</p>

</body>
</html>
