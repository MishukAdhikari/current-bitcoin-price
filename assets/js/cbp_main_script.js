
//Showing USD and EUR rate of bitcoin
jQuery(document).ready(function(){
    
    jQuery.getJSON('https://api.coindesk.com/v1/bpi/currentprice.json',function(data){

    	//var cbp.value = 2;

        jQuery('#cbp_usd_btc').html("$ "+data.bpi.USD.rate_float.toFixed(cbp.value)); 
        jQuery('#cbp_gbp_btc').html("£ "+data.bpi.GBP.rate_float.toFixed(cbp.value)); 
        jQuery('#cbp_eur_btc').html("€ "+data.bpi.EUR.rate_float.toFixed(cbp.value));

    });

});