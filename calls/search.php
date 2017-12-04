<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace W4RP\ESI\CALLS;

class Search extends \W4RP\ESI {
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
    
    public function GetCharacter($id, $cat, $search, $strict) {
        $url = $this->prefix . '/characters/' . $id . '/search/?datasource=tranquility&categories=' . $cat . '&language=en-us&search=' . $search . '&strict=' . $strict;
        $header = 'Authorization: Bearer ' . $this->accessToken;
        
        return $this->GetESIData($url, $this->userAgent, $header);
    }
    
    public function Search($cat, $search, $strict) {
        $url = $this->prefix . '/search/?datasource=tranquility&categories=' . $cat . '&language=en-us&search=' . $search . '&strict=' . $strict;
        
        return $this->GetPublicESIData($url, $this->userAgent);
    }
}