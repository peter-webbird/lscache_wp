<?php
namespace LiteSpeed\CLI ;

defined( 'WPINC' ) || exit ;

use LiteSpeed\Log ;
use LiteSpeed\Img_Optm ;
use LiteSpeed\Utility ;
use WP_CLI ;

/**
 * QUIC.cloud API CLI
 */
class Cloud
{
	private $_img_optm_instance ;

	public function __construct()
	{
		Log::debug( 'CLI_Cloud init' ) ;

		$this->_img_optm_instance = Img_Optm::get_instance() ;
	}

	/**
	 * Sync data from cloud server
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Sync online service usage info
	 *     $ wp litespeed-cloud sync
	 *
	 */
	public function sync()
	{xx
		$optm_summary = Img_Optm::get_summary() ;

		$json = $this->_img_optm_instance->sync_data() ;

		if ( ! $json || empty( $json[ 'level' ] ) ) {
			return ;
		}

		WP_CLI::success('[Level] ' . $json[ 'level' ] . ' [Credit] ' . $json[ 'credit' ] ) ;

		if ( empty( $optm_summary[ 'level' ] ) || empty( $optm_summary[ 'credit_recovered' ] ) || empty( $optm_summary[ '_level_data' ] ) ) {
			return ;
		}

		if ( $json[ 'level' ] > $optm_summary[ 'level' ] ) {

			Log::debug( "[Img_Optm] Upgraded to level $json[level] !" ) ;

			WP_CLI::success('Upgraded to level ' . $json[ 'level' ] ) ;
		}
	}

	/**
	 * Send image optimization request to cloud server
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Send image optimization request
	 *     $ wp litespeed-cloud push
	 *
	 */
	public function push()
	{
		$this->_img_optm_instance->new_req() ;
	}

	/**
	 * Pull optimized images from cloud server
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Pull images back from cloud
	 *     $ wp litespeed-cloud pull
	 *
	 */
	public function pull()
	{
		$this->_img_optm_instance->pull( true ) ;
	}

	/**
	 * Show optimization status based on local data
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Show optimization status
	 *     $ wp litespeed-cloud status
	 *
	 */
	public function status()
	{xx
		$summary = Img_Optm::get_summary() ;
		$img_count = $this->_img_optm_instance->img_count() ;

		if ( ! empty( $summary[ '_level_data' ] ) ) {
			unset( $summary[ '_level_data' ] ) ;
		}

		foreach ( array( 'reduced', 'reduced_webp' ) as $v ) {
			if ( ! empty( $summary[ $v ] ) ) {
				$summary[ $v ] = Utility::real_size( $summary[ $v ] ) ;
			}
		}

		if ( ! empty( $summary[ 'last_requested' ] ) ) {
			$summary[ 'last_requested' ] = date( 'm/d/y H:i:s', $summary[ 'last_requested' ] ) ;
		}

		$list = array() ;
		foreach ( $summary as $k => $v ) {
			$list[] = array( 'key' => $k, 'value' => $v ) ;
		}

		$list2 = array() ;
		foreach ( $img_count as $k => $v ) {
			$list2[] = array( 'key' => $k, 'value' => $v ) ;
		}

		WP_CLI\Utils\format_items( 'table', $list, array( 'key', 'value' ) ) ;

		WP_CLI::line( WP_CLI::colorize( "%CImages in database summary:%n" ) ) ;
		WP_CLI\Utils\format_items( 'table', $list2, array( 'key', 'value' ) ) ;
	}

	/**
	 * Show optimization status based on local data
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Show optimization status
	 *     $ wp litespeed-cloud s
	 *
	 */
	public function s()
	{
		$this->status() ;
	}


	/**
	 * Clean up unfinished image data from cloud server
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Clean up unfinished requests
	 *     $ wp litespeed-cloud clean
	 *
	 */
	public function clean()
	{
		$this->_img_optm_instance->clean() ;

		WP_CLI::line( WP_CLI::colorize( "%CLatest status:%n" ) ) ;

		$this->status() ;
	}

	/**
	 * Remove original image backups
	 *
	 * ## OPTIONS
	 *
	 * ## EXAMPLES
	 *
	 *     # Remove original image backups
	 *     $ wp litespeed-cloud rm_bkup
	 *
	 */
	public function rm_bkup()
	{
		$this->_img_optm_instance->rm_bkup() ;
	}


}