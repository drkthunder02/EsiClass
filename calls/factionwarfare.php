<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class FactionWarfare extends \W4RP\ESI {
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
    
    public function GetCharacterStats($id) {
        $url = $this->prefix . '/characters/' . $id . '/fw/stats/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationStats($id) {
        $url = $this->prefix . '/corporations/' . $id . '/fw/stats/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetLeaderboards() {
        $url = $this->prefix . '/fw/leaderboards/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetCharacterLeaderboards() {
        $url = $this->prefix . '/fw/leaderboards/characters/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetCorporationLeaderboards() {
        $url = $this->prefix . '/fw/leaderboards/corporations/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetStats() {
        $url = $this->prefix . '/fw/stats/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSystems() {
        $url = $this->prefix . '/fw/systems/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetWars() {
        $url = $this->prefix . '/fw/wars/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}