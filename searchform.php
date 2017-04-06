<div class="search-section" id="search-section">
	<div class="container">
		 <div class="row sm-top sm-bottom">
				<div class="col-xs-12">
					<form method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						<label for="s" class="sr-only">Search</label>
						<div class="input-group">
							<input type="search" id="search-input" class="search-field mousetrap" placeholder="<?php echo esc_attr_x( 'Search Terms, Topics & Tips', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search', 'label' ) ?>" autocomplete="off" /><span class="input-group-btn"><button type="submit" class="search-button"></button></span>
						</div> <!-- .input-group -->

						<div id="autocomplete">
				      <div id="results">
				      	<div class="container-fluid">
				      		<div class="row">
				      			<div class="col-sm-6">
			      					<div class="autocomplete-section">
					  					<div class="topics-header"><span class="small-header" id="topics-results-label">Suggested Topics</span></div>
					  					<div id="category-results" class="results-box"></div>
					  				</div>
			      				</div>
			      				<div class="col-sm-6 xs-m-t-2">
			      					<div class="autocomplete-section">
						            <div class="tags-header"><span class="small-header" id="terms-results-label">Suggested Terms</span></div>
						            <div id="tag-results" class="results-box"></div>
						          </div>
			      				</div>
			      			</div>
			      			<div class="row xs-m-b-1">
			      				<div class="col-sm-6 xs-m-t-2">
			      					<div class="autocomplete-section">
						            <div class="lower-label" id="for-tenants-results-label">For Tenants</div>
						            <div id="for-tenants-results" class="results-box"></div>
						          </div>
			      				</div>
			      				<div class="col-sm-6 xs-m-t-2">
			      					<div class="autocomplete-section">
						            <div class="lower-label" id="for-landlords-results-label">For Landlords</div>
						            <div id="for-landlords-results" class="results-box"></div>
						          </div>
			      				</div>
			      			</div>
			      			<div class="row">
			      				<div class="col-xs-12 text-center" id="autocomplete-button-wrapper"></div>
			      			</div>
			      		</div>
			      	</div>
			      </div>

			      <script id="autocomplete-template-tags" type="text/x-tmpl"><a rel="tag" href="{%=o.permalink%}">{%=o.name%}</a></script>
			      <script id="autocomplete-template-categories" type="text/x-tmpl"><div class="cat-result"><span class="topic-link"><a class="search-category-title" href="{%=o.permalink%}">{%=o.name%}</a></span> <span class="badge">{%=o.count%} Tips</span></div></script>
			      <script id="autocomplete-template-for-tenants" type="text/x-tmpl"><div class="tip-result"><span class=""><a class="tip-link" href="{%=o.permalink%}">{%=o.title%}</a></span></div></script>
			      <script id="autocomplete-template-for-landlords" type="text/x-tmpl"><div class="tip-result"><span class=""><a class="tip-link" href="{%=o.permalink%}">{%=o.title%}</a></span></div></script>
					</form>
				</div>
		 </div>
	</div>
</div>

<div id="autocomplete-overlay"></div>
