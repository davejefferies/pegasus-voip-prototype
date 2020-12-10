<?php

namespace Pegasus\Gateway\Agi;

class Colorizer {
  protected $colors;
  
  public function __construct() {
    $this->colors['reset'] = "\e[0m";
    $this->colors['black'] = "\e[0;30m";
    $this->colors['red'] = "\e[0;31m";
    $this->colors['green'] = "\e[0;32m";
    $this->colors['yellow'] = "\e[0;93m";
    $this->colors['blue'] = "\e[0;34m";
    $this->colors['purple'] = "\e[0;35m";
    $this->colors['cyan'] = "\e[0;36m";
    $this->colors['white'] = "\e[0;37m";
  }
  
  public function parse(string $message) {
    $colorMatchExpression = '/<(?<tag>\\w+)>/';
    $previousColor = $this->colors['reset'];
    
    preg_match_all($colorMatchExpression, $message, $matches);
    foreach ($matches['tag'] as $colorTag) {
      if (isset($this->colors[$colorTag])) {
        $message = preg_replace('/<' . $colorTag . '>/', $this->colors[$colorTag], $message, 1);
        $message = preg_replace('/<\/' . $colorTag . '>/', $previousColor, $message, 1);
        $previousColor = $this->colors[$colorTag];
      }
    }
    return $message;
  }
}