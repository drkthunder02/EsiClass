<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Opportunities extends \W4RP\ESI {
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
    
    public function GetCharacterCompletedTasks($id) {
        $url = $this->prefix . '/characters/' . $id . '/opportunities/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetOpportunityGroups() {
        $url = $this->prefix . '/opportunities/groups/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetOpportunityGroup($id) {
        $url = $this->prefix . '/opportunities/groups/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetOpportunityTasks() {
        $url = $this->prefix . '/opportunities/tasks/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetOpportunityTask($id) {
        $url = $this->prefix . '/opportunities/tasks/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}