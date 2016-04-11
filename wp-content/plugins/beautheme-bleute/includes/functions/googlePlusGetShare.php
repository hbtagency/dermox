<?php
/**
 * Google Plus Get share
 */
if (!class_exists('beau_Theme_ShareSocialCount')) {
    class beau_Theme_ShareSocialCount {
    	private $url,$timeout;
    	function __construct($url,$timeout=10) {
    	$this->url=rawurlencode($url);
    	$this->timeout=$timeout;
    	}
    	function get_plusones()  {
            if (function_exists('curl_init')) {
        		$curl = curl_init();
        		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        		curl_setopt($curl, CURLOPT_POST, true);
        		curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($this->url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        		curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
        		$curl_results = curl_exec ($curl);
        		curl_close ($curl);
        		$json = json_decode($curl_results, true);
        		return isset($json[0]['result']['metadata']['globalCounts']['count'])?intval( $json[0]['result']['metadata']['globalCounts']['count'] ):0;
            }else{
                return 0;
            }
    	}
    }
}

?>