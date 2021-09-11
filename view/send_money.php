
<div id = "content"></div>
<button id = "trsBtn" type =  "button">Transfer</button>

<script src="../../../js/jquery.min.js"></script>

<script>
$("#trsBtn").click(function(){
	$.ajax({
		url: '../api/send_money.php',
        type : 'POST',
	    dataType : "json", 
        data:{amount:10000, sender_wallet:'C793538456', receiver_wallet:'E793538457', tPin:111111},
        success: function(data){
			$("#content").html(data.message)
        }
    });
});

</script>
	
