<?php

namespace Peteradeojo\LAAS;

class LaasLogDTO
{
  public $level;
  public $message;

  public function __construct(string $level = null, string $message = null) {
    $this->level = $level;
    $this->message = $message;
  }
}
