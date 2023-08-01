<?php

namespace Peteradeojo\LAAS;

class LaasLogDTO
{
  public $level;
  public $message;
  public $tag;

  public function __construct(string $level = null, string $message = null, $tag = null) {
    $this->level = $level;
    $this->message = $message;
    $this->tag = $tag;
  }
}
