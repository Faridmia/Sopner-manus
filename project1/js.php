	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript">
    	$("#do_review").submit(function(e) {
            e.preventDefault();
            //var data = $("#update").serialize();
            var data = new FormData(this);            
            $.ajax({
                type : 'POST',
                url : 'do-review.php',
                data : data,
                dataType : 'html', 
                cache:false,
                contentType: false,
                processData: false,
                beforeSend : function () {
                    $("#message").html('Loading...');
                }, 
                success : function ( result ) {
                    $("#message").html( result );
                }
            });
        });
    </script>