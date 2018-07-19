<?php

namespace Pradeep\LaraCurl;
  
class LaraCurlService
{
    private $ch;

    /*
     * initiate cURL request 
     */
	private function init() 
	{
		// 
		$this->ch = curl_init();
	}

	/*
     * set url to cURL request
     */
	private function setPath($path=null) 
	{
		// 
		if (env('SOCKET_URL')) 
                $path = env('SOCKET_URL'); 
            
		curl_setopt($this->ch, CURLOPT_URL, $path);
	}

	/*
     * set headers to cURL request
     */
	private function setHeader($headers=null){
		// 
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
	}

	/*
     * set data to cURL request
     */
	private function setData($data=null) 
	{
		// 
		$fields = ""; 
		$data = ['status' => 'ok', 'version' => 'v1.0.0'] + $data; 
		foreach ($data as $key => $value) 
		{	
			// 
			$fields .= $key.'='.$value.'&';
		} 
		// dd($fields); 
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields);
	}

	/*
     * close cURL request
     */
	private function close() 
	{	
		// 
		curl_close ($this->ch);
	}

	/*
     * cURL post request
     */
	public function post($url=null, $headers=null , $data=null) 
	{ 
		// 
		$this->init(); 
		$this->setPath($url); 
		$this->setHeader($headers);
		$this->setData($data);

		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($this->ch, CURLOPT_VERBOSE, 0); 

		$server_output = curl_exec($this->ch); 
		$error_code = curl_errno($this->ch); 
		
		// dd(curl_errno($this->ch), curl_error($this->ch), curl_getinfo($this->ch)); 
		// dd($error_code);

		$this->close(); 
		if ($error_code === 0) 
			return true;
		// 
		return false;
	}

	/*
     * cURL get request
     */
	/*public function get($headers=null , $data=null) 
	{ 
		// 
		$this->init();
		$this->setPath();
		$this->setHeader($headers);
		$this->setData($data);

		// curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec ($this->ch);

		$this->close($data);
	}*/
}