<?php
include "utils.php";

/**
 * Compiler frontend
 */
class Lexer
{
    public $source;

    /**
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->source = $source;
    }

    /**
     * consume the input string and returning the next token in the sequence
     * @todo not yet implemented
     */
    function next_token()
    {
        $s = read_file($this->source);

        echo $s, "\n";
    }
}
?>