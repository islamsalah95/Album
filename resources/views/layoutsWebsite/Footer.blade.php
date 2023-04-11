<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-behance"></a></li>
                        <li><a href="#" class="fa fa-dribbble"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="copyright-text">Copyright &copy; 2084 Company Name
                | Photos by <a rel="nofollow" href="http://unsplash.com">Unsplash</a></p>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('Front/js/vendor/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('Front/js/min/plugins.min.js')}}"></script>
<script src="{{asset('Front/js/min/main.min.js')}}"></script>

<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
    $(window).load(function() { // makes sure the whole site is loaded
        $('#loader').fadeOut(); // will first fade out the loading animation
            $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow-y':'visible'});
    })
    //]]>
</script>
<!-- templatemo 434 masonry -->
</body>
</html>
