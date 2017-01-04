<!-- close container -->
</div>

<script type="text/javascript">
/*menu handler*/
$(function(){
  function stripTrailingSlash(str) {
    if(str.substr(-1) == '/') {
      return str.substr(0, str.length - 1);
    }
    return str;
  }

  var url = window.location.pathname;  
  var activePage = stripTrailingSlash(url);

  $('.nav li a').each(function(){  
    var currentPage = stripTrailingSlash($(this).attr('href'));

    if (activePage == currentPage) {
      $(this).parent().addClass('active'); 
    } 
  });
});

</script>

    <!-- bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/ac39aecef6.js"></script>


</body>

</html>

