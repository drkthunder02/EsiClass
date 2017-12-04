<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace w4RP\ESI\CALLS;

class Contracts extends \W4RP\ESI {
    protected $refreshToken;
    protected $refreshTokenExpiry;
    protected $accessToken;
    
    protected $clientId;
    protected $secretKey;
    protected $userAgent;
    
    protected $errorCount;
    
    private $prefix = 'https://esi.tech.ccp.is/latest/';
    
    public function __construct() {
        //Parse the data for the ESI Configuration file
        $fileEsi = parse_ini_file(__DIR__.'/../../configuration/esi.ini');
        $this->clientId = $fileEsi['client_id'];
        $this->secretKey = $fileEsi['secret'];
        $this->userAgent = $fileEsi['useragent'];
        
        $this->errorCount = 0;
        
    }
    
    public function GetCharacterContracts($id) {
        $url = $this->prefix . '/characters/' . $id . '/contracts/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetCharacterContractItems($id, $contract) {
        $url = $this->prefix . '/characters/' . $id . '/contracts/' . $contract . '/items/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetCharacterBids($id, $contract) {
        $url = $this->prefix . '/characters/' . $id . '/contracts/' . $contract . '/bids/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetCorporationContracts($id) {
        $url = $this->prefix . '/corporations/' . $id . '/contracts/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetCorporationContractItems($id, $contract) {
        $url = $this->prefix . '/corporations/' . $id . '/contracts/' . $contract . '/items/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetCorporationBids($id, $contract) {
        $url = $this->prefix . '/corporations/' . $id . '/contracts/' . $contract . '/bids/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
}