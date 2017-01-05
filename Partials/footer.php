    
    </div> <!-- close container -->


    <script type="text/javascript">

        $( function() {

            function stripTrailingSlash(str) {
                /* strip out the trailing slash of a url */
                if(str.substr(-1) == '/') {
                    return str.substr(0, str.length - 1);
                }
                return str;
            }

            var url = window.location.pathname;  
            var activePage = stripTrailingSlash(url);

            $('.nav li a').each( function() {  
                /* add active class to nav link of current page */ 
                var currentPage = stripTrailingSlash($(this).attr('href'));
                if (activePage == currentPage) {
                    $(this).parent().addClass('active'); 
                } 
            });
        });

    </script>

</body>

</html>

