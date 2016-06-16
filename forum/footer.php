	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script>
		$(".delete").on("click",function(){
			alert('coucou');
			if(!confirm("sûre de vouloir faire cette merde!!!")){return false;}
		}); //Montre que je suis en train de supprimer quelque chose et me renvoit une boite d'alerte.
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
<?php //myPrint_r($_SESSION) pour voir ce qui est dans ma session ?>

<?php echo basename($_SERVER['SCRIPT_NAME']); ?><br>
<?php echo $_SERVER['QUERY_STRING']; ?>