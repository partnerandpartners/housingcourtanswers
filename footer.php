</section>
<footer>
 <div class="container md-m-t-6">
   <div class="row md-m-b-6">
     <div class="col-sm-6 text-center">
       <div class="help-resources">
			<h4>Helpful Resources</h4>
			<p class="xs-m-b-1">A list of resources and links to help you.</p>
			<a href="<?php echo home_url(); ?>/resources-links/" class="btn btn-lg">Go to Resources & Links</a>
	   </div>
      </div>
      <div class="col-sm-6 text-center">
	    <div class="call-us">
			<h4>I Need a Lawyer</h4>
			<p class="xs-m-b-1">Find legal help from our list of attorneys and firms.</p>
			<a href="<?php echo home_url(); ?>/resources-links/#lawyers" class="btn btn-lg">Find Legal Help</a>
		</div>
      </div>
     </div>
  <div class="row">
     <div class="col-sm-3 xs-m-b-2">
	 <span class="small-header">Navigation</span>
		 <div class="footer-nav">
		 <?php

			if( has_nav_menu( 'footer' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container' => false,
					'depth' => -1,
					'menu_class' => 'list-unstyled',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
				) );
			}
		 ?>
		</div>
    </div>
    <div class="col-sm-3 col-sm-offset-1 xs-m-b-2">
     <span class="small-header">Donate</span>
	      <div class="xs-p-t-1">
		      <h6 class="normal-weight xs-m-b-1">Please support us to support you.</h6>
		      <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KYVF77625YDKL" class="btn btn-default" target="_blank">Donate</a>
		    </div>
      </div>
    <div class="col-sm-4 col-sm-offset-1 xs-m-b-2">
     <span class="small-header">Join Our Mailing List</span>
	    <div class="xs-p-t-1">
		       <h6 class="normal-weight xs-m-b-1">Get on our mailing list for announcements of our borough meetings and trainings, and spring series.</h6>
		         <a href="http://eepurl.com/bDaXUD" target="_blank" class="btn btn-default">Sign Up</a>
           </div>
      </div>
  </div>
  <div class="row footer-buildings">
  </div>
</div>
<div class="container-fluid footer-full bg black">
  <div class="container">
    <div class="row">
      <div class="col-md-6 copyright-cred">
        <span class="copyright-credit">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
      </div>
      <div class="col-md-6 design-credit">
  	     <span class="design-cred">Design and Development by <a class="footer-link" href="http://partnerandpartners.com/" target="_blank">Partner & Partners</a></span>
      </div>
    </div>
  </div>
</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
