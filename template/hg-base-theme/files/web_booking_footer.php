	<footer>
		<div class="container-fluid">
			<div class="row center-md">
				<div class="col-md-12"><p><a href="https://www.horecagroup.sk" target="_blanck">Booking engine - HORECA GROUP - Rezervovať priamo s 0% províziou</a></p></div>
			</div>
		</div>
    </footer>

		<script src="/template/js/lightgallery/lightgallery.min.js"></script>
    <script src="/template/js/lightgallery/lg-pager.min.js"></script>
    <script src="/template/js/lightgallery/lg-autoplay.min.js"></script>
    <script src="/template/js/lightgallery/lg-thumbnail.min.js"></script>
    <script src="/template/js/lightgallery/lg-fullscreen.min.js"></script>
    <script src="/template/js/lightgallery/lg-zoom.min.js"></script>
    <script src="/template/js/lightgallery/lg-hash.min.js"></script>
    <script src="/template/js/lightgallery/lg-share.min.js"></script>
    <script>
      $( document ).ready(function() {
      	invokeLightgallery();
      });
		
      $('#nav-icon').on('click', function() {
        $(this).toggleClass('open');
        if ( $('#nav-icon').hasClass("open") ) {
          $('header ul').animate({ right: 0 }, 500);
        } else {
            $('header ul').animate({ right: -200 + '%' }, 500);
        }
      });
    </script>
    <?php echo themeSetup('extra_body_end'); ?>
  </body>
</html>
