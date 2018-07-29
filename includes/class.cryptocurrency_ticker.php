<?php

/**
 * Cryptocurrency Ticker
 */
class CBP_Cryptocurrency_Ticker
{

	public function __construct()
	{
		add_shortcode( 'crypto_price', [$this, 'crypto_price'] );
	}

	public function crypto_price($atts) {

		extract(shortcode_atts( array(
			'type' => '',
			'currency' => '',
		), $atts ));

		$api = 'https://api.coinmarketcap.com/v2/ticker/';

		$api = file_get_contents( $api );

		$api = json_decode($api);

		foreach ($api->data as $value_key => $value) {

			if ($value->symbol == $type) {

				foreach ($value->quotes as $data_key => $data) {

					if (empty($currency)) {

						return 'Current '.$type.' '.$data_key.' price is '.$data->price.' <br>';

					} elseif( $currency == $data_key ) {

						return $data->price;

					}

				}
			}

		}

	}
}

new CBP_Cryptocurrency_Ticker;