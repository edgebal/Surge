<?php
/**
 * GPN Message
 */
namespace Surge\Services\Google;

use Surge\Components\Interfaces;

class Message implements Interfaces\MessageInterface{
    
    public $title;
    public $message;
    public $token;
    public $service = "Google";
    public $uri;
    
    public function setToken($token){
        $this->token = $token;
        return $this;
    }
     
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function setMessage($message){
        $this->message = $message;
        return $this;
    }

    public function setURI($uri){
        $this->uri = $uri;
        return $this;
    }
    
    public function toJSON(){
        $payload = array(
            'data' => array(
                'message' =>  $this->message,
                'title' => $this->title,
                'sound'=>1,
                'vibrate'=>1,
                'uri' => $this->uri
            ),
            'registration_ids' => array($this->token)
        );
        return json_encode($payload);
    }
         
}
