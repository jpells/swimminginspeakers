<form id="searchform" action="" method="get">
				<input type="text" value="Looking for something..." onfocus="if (this.value == 'Looking for something...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Looking for something...';}"  value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
				<input id="searchsubmit" type="submit" value=""/>
			</form>
            <div class="clear2"></div>