<?php

class Usuario extends Eloquent {
	protected $table = 'tusuario';
	public $timestamps = false;

 // INICIO: Extras de desarrollo a la medida
	protected $hidden = ["password"];

  public function getAuthIdentifier()
  {
    return $this->getKey();
  }
  
  public function getAuthPassword()
  {
    return $this->password;
  } 
  
  public function getTokenRecuperacion()
  {
    return $this->remember_token;
  }
  
  public function setRememberToken($value)
  {
    $this->remember_token = $value;
  }
  
  public function getRememberTokenName()
  {
    return "remember_token";
  }
  
  public function getReminderEmail()
  {
    return $this->email;
  }
  // FIN:
}
