<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Loyalty extends \W4RP\ESI {
    protected $refreshToken;
    protected $refreshTokenExpiry;
    protected $accessToken;
    
    protected $clientId;
    protected $secretKey;
    protected $userAgent;
    
    protected $errorCount;
    
    private $prefix = 'https://esi.tech.ccp.is/latest';
    
    public function __construct() {
        //Parse the data for the ESI Configuration file
        $fileEsi = parse_ini_file(__DIR__.'/../../configuration/esi.ini');
        $this->clientId = $fileEsi['client_id'];
        $this->secretKey = $fileEsi['secret'];
        $this->userAgent = $fileEsi['useragent'];
        
        $this->errorCount = 0;
        
    }
    
    public function GetCharacterOrders($id) {
        $url = $this->prefix . '/characters/' . $id . '/orders/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationOrders($id) {
        $url = $this->prefix . '/corporations/' . $id . '/orders/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMarketStatistics($id) {
        $url = $this->prefix . '/markets/' . $id . '/history/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetRegionOrders($region, $orderType, $itemId) {
        $url = $this->prefix . '/markets/' . $region . '/orders/?datasource=tranquility&order_type=' . $orderType . '&type_id=' . $itemId;
        $header = 'Accepts: application/json';
        //Get the header data to know how many pages to call data for
        $headerData = $this->GetESIHeaderData($url, $this->userAgent, $header);
        $pages = $headerData['x-pages'];
        
        //Create array for data to be held in.
        $data = array();
        $urls = array();
        $combined = array();
        //Create an array of urls
        for($i = 0; $i < $pages; $i++) {
            $urls[$i] = $this->prefix . '/markets/' . $region . '/orders/?datasource=tranquility&order_type=' . $orderType . '&page=' . $i . '&type_id=' . $itemId;
        }
        //Fetch all of the urls
        $data = $this->GetMultiESIData($urls);
        //Combine all of the data into one array
        foreach($data as $key => $value) {
            $combined = array_combine($key, $value);
        }
        
        return $combined;
    }
    
    public function GetTypeIDs($id) {
        $url = $this->prefix . '/markets/' . $id . '/types/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetItemGroups() {
        $url = $this->prefix . '/markets/groups/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetItemGroupInfo($id) {
        $url = $this->prefix . '/markets/groups/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetPrices() {
        $url = $this->prefix . '/markets/prices/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetOrdersInStructure($id) {
        $url = $this->prefix . '/markets/structures/' . $id . '/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
}