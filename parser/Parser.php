<?php
require_once "./lexer/Scanner.php";

class Parser
{
    private $tokens;
    private $current = 0;

    /**
     * @param Token ...$tokens
     */
    public function __construct(...$tokens)
    {
        $this->tokens = $tokens;
    }

    private function expression()
    {
        // template
    }

    private function equality()
    {
        // template
    }

    private function advance()
    {
        // template
    }

    private function peek()
    {
        // template
    }

    private function is_at_end()
    {
        // template
    }

    private function previous()
    {
        // template
    }

    /**
     * @param TokenType ...$types
     */
    private function match(...$types)
    {
        // template
    }

    private function consume(...$types)
    {
        // template
    }
}
?>