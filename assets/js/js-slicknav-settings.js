jQuery(document).ready(function(){


	// OLD VERSION
//	jQuery('.sf-menu').slicknav({
//		prependTo:'#responsive-menu',
//		label:'Menu',
//		allowParentLinks: true,
//		closeOnClick: true,
//		closedSymbol:"&#xf0dd;",//"&#9660;",
//		openedSymbol:"&#xf0da;"//"&#9658;"
//	});
	
	jQuery('.sf-menu').slicknav({
		open: function(trigger) { slicknavOpened(trigger); },
		prependTo:'#responsive-menu',
		label:'',
		allowParentLinks: true,
		closeOnClick: true,
		closedSymbol:"&#xf0dd;",//"&#9660;",
		openedSymbol:"&#xf0da;"//"&#9658;"

	});
	
	// NEW ADDED SEPT 13, 2018 by KEN V

	function slicknavOpened(trigger) {
		var $trigger = jQuery(trigger[0]);
		if ($trigger.hasClass('slicknav_btn')) {
			// this is the top-level menu/list opening.
			// we only want to trap lower-level/sublists.
			return;
		}
		// trigger is an <a> anchor contained in a <li>
		var $liParent = $trigger.parent();
		// parent <li> is contained inside a <ul>
		var $ulParent = $liParent.parent();
		// loop through all children of parent <ul>
		// i.e. all siblings of this <li>
		$ulParent.children().each(function () {
			var $child = jQuery(this);
			if ($child.is($liParent)) {
				// this child is self, not is sibling
				return;
			}
			if ($child.hasClass('slicknav_collapsed')) {
				// this child is already collapsed
				return;
			}
			if (!$child.hasClass('slicknav_open')) {
				// could throw an exception here: this shouldn't happen
				// because I expect li to have class either slicknav_collapsed or slicknav_open
				return;
			}
			// found a sibling <li> which is already open.
			// expect that its first child is an anchor item.
			var $anchor = $child.children().first();
			if (!$anchor.hasClass('slicknav_item')) {
				return;
			}
			// close the sibling by emulating a click on its anchor.
			$anchor.click();
		});
	}

	jQuery('#responsive-menu .slicknav_menu > ul.slicknav_nav').css('display', 'block');
	
});