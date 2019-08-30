<?php
class Test_API extends WP_UnitTestCase {
 
	/**
	 * Test REST Server
	 *
	 * @var WP_REST_Server
	 */
	protected $server;
 
	protected $namespaced_route = 'caldera/forms';
 
 
	public function setUp() {
		parent::setUp();
		/** @var WP_REST_Server $wp_rest_server */
		global $wp_rest_server;
		$this->server = $wp_rest_server = new \WP_REST_Server;
		do_action( 'rest_api_init' );
 
	}
 
	public function test_name_route() {
		$request  = new WP_REST_Request( 'GET', '/api/v2/name' );
		$response = $this->server->dispatch( $request );
		$this->assertEquals( 200, $response->get_status() );
		$data = $response->get_data();
		$this->assertArrayHasKey( 'name', $data );
		$this->assertEquals( 'shawn', $data[ 'name' ] );
	}
}