<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Corporation extends \W4RP\ESI {
    protected $refreshToken;
    protected $refreshTokenExpiry;
    protected $accessToken;
    
    protected $clientId;
    protected $secretKey;
    protected $userAgent;
    
    protected $errorCount;
    
    private $prefix = 'https://esi.tech.ccp.is/latest/corporations/';
    
    public function __construct() {
        //Parse the data for the ESI Configuration file
        $fileEsi = parse_ini_file(__DIR__.'/../../configuration/esi.ini');
        $this->clientId = $fileEsi['client_id'];
        $this->secretKey = $fileEsi['secret'];
        $this->userAgent = $fileEsi['useragent'];
        
        $this->errorCount = 0;
        
    }
    
    public function GetInformation($id) {
        $url = $this->prefix . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetAllianceHistory($id) {
        $url = $this->prefix . $id . '/alliancehistory/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetMembers($id) {
        $url = $this->prefix . $id . '/members/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMemberRoles($id) {
        $url = $this->prefix . $id . '/roles/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMemberRolesHistory($id) {
        $url = $this->prefix . $id . '/roles/history/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetIcons($id) {
        $url = $this->prefix . $id . '/icons/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetPublicESIDataESIData($url, $this->userAgent);
    }
    
    public function GetNpcCorps() {
        $url = $this->prefix . '/npccorps/?datasource=tranquility';
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function TrackCorpMembers($id) {
        $url = $this->prefix . $id . '/membertracking/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->accessToken, $header);
    }
    
    public function GetDivisions($id) {
        $url = $this->prefix . $id . '/divisions/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMemberLimit($id) {
        $url = $this->prefix . $id . '/members/limit/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetTitles($id) {
        $url = $this->prefix . $id . '/titles/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMemberTitles($id) {
        $url = $this->prefix . $id . '/members/titles/?datasource=tranquility';
        $header = 'Authorization: Beearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetBlueprints($id) {
        $url = $this->prefix . $id . '/blueprints/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetStandings($id) {
        $url = $this->prefix . $id . '/standings/?datasource=tranquiltity';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetStarbases($id) {
        $url = $this->prefix . $id . '/starbases/?datasource=tranquiltiy';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetStarbaseDetail($id, $starbase) {
        $url = $this->prefix . $id . '/starbases/' . $starbase . '/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetContainerLogs($id) {
        $url = $this->prefix . $id . '/containers/logs/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetFacilities($id) {
        $url = $this->prefix . $id . '/facilities/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetMedals($id) {
        $url = $this->prefix . $id . '/medals/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetIssuedMedals($id) {
        $url = $this->prefix . $id . '/medals/issued/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetShareholders($id) {
        $url = $this->prefix . $id . '/shareholders/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetStructures($id) {
        $url = $this->prefix . $id . '/structures/?datasource=tranquility';
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function GetNames() {
        $url = $this->prefix . '/names/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetNPCCorps() {
        $url = $this->prefix . '/npccorps/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}