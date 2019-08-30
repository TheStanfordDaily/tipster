<?php
namespace StanfordDaily\Tipster;

class SlackClient
{
    function __construct($args) {
        $this->email = $args(email);
    }

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}