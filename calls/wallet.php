<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Wallet extends \W4RP\ESI {
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
    
    public function GetCharacterWalletBalance($id) {
        $url = $this->prefix . '/characters/' . $id . '/wallet/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCharacterWalletJournal($id) {
        $url = $this->prefix . '/characters/' . $id . '/wallet/journal/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;

        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCharacterWalletTransactions($id) {
        $url = $this->prefix . '/characters/' . $id . '/wallet/transactions/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationWalletBalance($id) {
        $url = $this->prefix . '/corporations/' . $id . '/wallet/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationWalletJournal($id) {
        $url = $this->prefix . '/corporations/' . $id . '/wallet/journal/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationWalletTransactions($id) {
        $url = $this->prefix . '/corporations/' . $id . '/wallet/transactions/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
}