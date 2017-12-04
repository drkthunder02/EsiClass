<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Universe extends \W4RP\ESI {
    protected $refreshToken;
    protected $refreshTokenExpiry;
    protected $accessToken;
    
    protected $clientId;
    protected $secretKey;
    protected $userAgent;
    
    protected $errorCount;
    
    private $prefix = 'https://esi.tech.ccp.is/latest/universe';
    
    public function __construct() {
        //Parse the data for the ESI Configuration file
        $fileEsi = parse_ini_file(__DIR__.'/../../configuration/esi.ini');
        $this->clientId = $fileEsi['client_id'];
        $this->secretKey = $fileEsi['secret'];
        $this->userAgent = $fileEsi['useragent'];
        
        $this->errorCount = 0;
        
    }
    
    public function GetBloodlines() {
        $url = $this->prefix . '/bloodlines/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetItemCategories() {
        $url = $this->prefix . '/categories/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetCategoryInfo($id) {
        $url = $this->prefix . '/categories/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetConstellations() {
        $url = $this->prefix . '/constellations/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetConstellationInfo($id) {
        $url = $this->prefix . '/constellations/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetFactions() {
        $url = $this->prefix . '/factions/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetGraphics() {
        $url = $this->prefix . '/graphics/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetGraphicInfo($id) {
        $url = $this->prefix . '/graphics/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetGroups() {
        $url = $this->prefix . '/groups/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetGroupInfo($id) {
        $url = $this->prefix . '/groups/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetMoonInfo($id) {
        $url = $this->prefix . '/moons/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetPlanetInfo($id) {
        $url = $this->prefix . '/planets/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetCharacterRaces() {
        $url = $this->prefix . '/races/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetRegions() {
        $url = $this->prefix . '/regions/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetRegionInfo($id) {
        $url = $this->prefix . '/regions/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetStargateInfo($id) {
        $url = $this->prefix . '/stargates/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetStarInfo($id) {
        $url = $this->prefix . '/stars/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetStationInfo($id) {
        $url = $this->prefix . '/stations/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetPublicStructures() {
        $url = $this->prefix . '/structures/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetStructureInfo($id) {
        $url = $this->prefix . '/structures/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSystemJumps() {
        $url = $this->prefix . '/system_jumps/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSystemKills() {
        $url = $this->prefix . '/system_kills/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSolarSystems() {
        $url = $this->prefix . '/systems/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetSolarSystemInfo($id) {
        $url = $this->prefix . '/systems/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetTypes() {
        $url = $this->prefix . '/types/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
    
    public function GetTypeInfo($id) {
        $url = $this->prefix . '/types/' . $id . '/?datasource=tranquility';
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}