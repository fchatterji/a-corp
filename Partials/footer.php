    
    </div> <!-- close container -->


    <script type="text/javascript">

        $( function() {

            var url = window.location.pathname; 

            if (url.includes("reservation")) {
                $('.nav-reservation').addClass('active');

            } else if (url.includes("salle")) {
                $('.nav-salle').addClass('active');

            } else if (url.includes("home")) {
                $('.nav-home').addClass('active');
            } else if (url.includes("home")) {
                $('.nav-home').addClass('active');
            } else if (url.includes("login")) {
                $('.nav-login').addClass('active');
            }
        });

    </script>

</body>

</html>

