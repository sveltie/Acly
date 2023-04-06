<?php
define("TOKEN_KEYWORD", "TOKEN_KEYWORD");
define("TOKEN_IDENTIFIER", "TOKEN_IDENTIFIER");

// more specific (will be used later)
define("TOKEN_FUNCTION", "TOKEN_FUNCTION");
define("TOKEN_STRING", "TOKEN_STRING");
define("TOKEN_INTEGER", "TOKEN_INTEGER");

define("TOKEN_LPAREN", "TOKEN_LPAREN");
define("TOKEN_RPAREN", "TOKEN_RPAREN");

define("TOKEN_COLON", "TOKEN_COLON");
define("TOKEN_SEMICOLON", "TOKEN_SEMICOLON");

define("TOKEN_EOF", "TOKEN_EOF");

class Token
{
    public $type;
    public $value;

    public function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
?>