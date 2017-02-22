<form method="get" id="search-form" action="<?php bloginfo('url'); ?>/">
	<div>
		<input type="submit" id="search-submit" value="Search" class="btn" />
		<input type="text" id="search-field" name="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
	</div>
</form>