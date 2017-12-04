<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Industry extends \W4RP\ESI {
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
    
    public function GetCharacterJobs($id) {
        $url = $this->prefix . '/characters/' . $id . '/industry/jobs/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCharacterMiningLedger($id) {
        $url = $this->prefix . '/characters/' . $id . '/mining/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMoonExtraction($id) {
        $url = $this->prefix . '/corporation/' . $id . '/mining/extractions/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMiningObservers($id) {
        $url = $this->prefix . '/corporation/' . $id . '/mining/observers/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationObserved($id, $observer) {
        $url = $this->prefix . '/corporation/' . $id . '/mining/observers/' . $observer . '/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationJobs($id) {
        $url = $this->prefix . '/corporations/' . $id . '/industry/jobs/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetFacilities() {
        $url = $this->prefix . '/industry/facilities/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSystemCostIndices() {
        $url = $this->prefix . '/industry/systems/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}