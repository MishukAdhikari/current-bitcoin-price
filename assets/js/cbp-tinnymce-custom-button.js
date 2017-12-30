(function() {
	tinymce.PluginManager.add('cbp_mce_button', function( editor, url ) {
		editor.addButton( 'cbp_mce_button', {
			text: 'Current BTC Price',
			icon: false,
			type: 'menubutton',
			menu: [
				{
					text: 'USD Price',
						onclick: function() {
							editor.insertContent('[current_btc_usd_price]');
						}
				},

				{
					text: 'GBP Pound',
						onclick: function() {
							editor.insertContent('[current_btc_gbp_pound]');
						}
				},

				{
					text: 'EUR Price',
						onclick: function() {
							editor.insertContent('[current_btc_eur_price]');
						}
				}
			]
		});
	});
})();