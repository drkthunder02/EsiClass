<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Character extends \W4RP\ESI {
    protected $refreshToken;
    protected $refreshTokenExpiry;
    protected $accessToken;
    
    protected $clientId;
    protected $secretKey;
    protected $userAgent;
    
    protected $errorCount;
    
    private $prefix = 'https://esi.tech.ccp.is/latest/characters/';
    
    public function __construct() {
        //Parse the data for the ESI Configuration file
        $fileEsi = parse_ini_file(__DIR__.'/../../configuration/esi.ini');
        $this->clientId = $fileEsi['client_id'];
        $this->secretKey = $fileEsi['secret'];
        $this->userAgent = $fileEsi['useragent'];
        
        $this->errorCount = 0;
        
    }
    
    public function GetPublicInfo($id) {
        
        $url = $this->prefix . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetName($characters = array()) {
        
        $items = "";
        
        foreach($characters as $char) {
            $items = $char . '%2C';
        }
        $items = rtrim($items, '%2C');
        
        
        $url = $this->prefix . 'names/?character_ids=' . $items . '&datasource=tranquility';
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetPortrait($id) {
        
        $url = $this->prefix . $id . '/portrait/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $useragent);
    }
    
    public function GetCorporationHistory($id) {
        
        $url = $this->prefix . $id . '/corporationhistory/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetChatChannels($id) {
        
        $url = $this->prefix . $id . '/chat_channels/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMedals($id) {
        
        $url = $this->prefix . $id . '/medals/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetStandings($id) {
        
        $url = $this->prefix . $id . '/standings/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetAgentsResearch($id) {
        
        $url = $this->prefix . $id . '/agents_research/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetBlueprints($id) {
        $url = $this->prefix . $id . '/blueprints/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetFatigue($id) {
        $url = $this->prefix . $id . '/fatigue/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetNewContactNotifications($id) {
        $url = $this->prefix . $id . '/notifications/contacts/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetNotifications($id) {
        $url = $this->prefix . $id . '/notifications/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetCorporationRoles($id) {
        $url = $this->prefix . $id . '/roles/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetTitles($id) {
        $url = $this->prefix . $id . '/titles/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
}