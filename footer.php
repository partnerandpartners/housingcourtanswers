</section>
<footer>
 <div class="container">
   <div class="row">
     <div class="col-sm-6 text-center">
       <div class="help-resources">
			<h4 class="medium-title">Helpful Resources</h4>
			<p>A list of resources and links to help you.</p>
			<a href="/resources-links" class="btn btn-lg">Go to Resources & Links</a>
	   </div>
      </div>
      <div class="col-sm-6 text-center">
	    <div class="lawyer">
			<h4 class="medium-title">I Need a Lawyer</h4>
			<p>Find legal help from our list of attorneys and firms.</p>
			<a href="#" class="btn btn-lg">Find Legal Help</a>
		</div>
      </div>
     </div>
  <div class="row sm-bottom">
     <div class="col-md-3">
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
     <div class="col-md-4">
     <span class="small-header">Donate</span>
	     <div class="donate text-center">
		 <h6 class="normal-weight">Please support us to support you.</h6>
		 <a href="#" class="btn btn-default">Donate</a>
		 </div>
      </div>
      <div class="col-md-5">
     <span class="small-header">Join Our Mailing List</span>
	     <div class="mailing text-center">
		 <h6 class="normal-weight">Get on our mailing list for announcements of our borough meetings and trainings, and spring series.</h6>
		 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mailchimp">
		 Sign Up
         </button>
			 <div class="modal fade" id="mailchimp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="medium-title" id="myModalLabel">Sign Up for Mailing List</h4>
			      </div>
			      <div class="modal-body">
			        <form>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					  </div>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-default">Submit</button>
			      </div>
			    </div>
			  </div>
			</div>
		 </div>
      </div>
  </div>
  <div class="row xl-bottom">
    <div class="col-md-6 sm-bottom">
      <span class="copyright-credit">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
    </div>
    <div class="col-md-6 sm-bottom">
	  <span class="design-credit">Design & Development by <a href="" target="_blank">Partner & Partners</a></span>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
