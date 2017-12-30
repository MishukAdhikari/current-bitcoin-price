jQuery(document).ready(function($){
	jQuery("select#cbp_decimal_cheque").change(function(){

		//change value
		var user_select = jQuery("#cbp_decimal_cheque option:selected").val();

		if (user_select == "none") {
			jQuery("#digit_cheque").html("0000");
		}

		if (user_select == "1") {
			jQuery("#digit_cheque").html("0000.0");
		}
		
		if (user_select == "2") {
			jQuery("#digit_cheque").html("0000.00");
		}
		
		if (user_select == "3") {
			jQuery("#digit_cheque").html("0000.000");
		}
		
		if (user_select == "4") {
			jQuery("#digit_cheque").html("0000.0000");
		}
	})

	//selected value
	var user_selected = jQuery("#cbp_decimal_cheque option:selected").val();
		
	if (user_selected == "none") {
		jQuery("#digit_cheque").html("0000");
	}

	if (user_selected == "1") {
		jQuery("#digit_cheque").html("0000.0");
	}
	
	if (user_selected == "2") {
		jQuery("#digit_cheque").html("0000.00");
	}
	
	if (user_selected == "3") {
		jQuery("#digit_cheque").html("0000.000");
	}
	
	if (user_selected == "4") {
		jQuery("#digit_cheque").html("0000.0000");
	}

});