<?php
include "Tree.php";

/**
 * Compiler backend by using Abstract Syntax Tree (AST)
 */
class Parser
{
    private $lexer;
    private $token;

    public function __construct(Lexer $lexer)
    {
        $this->lexer = $lexer;
        $this->token = $this->lexer->next_token();
    }

    /**
     * Consume types and check if current token is the same as the
     * types that are being consumed
     * 
     * @param TokenType ...$types
     * @return Token|bool
     */
    private function consume(...$types): Token|bool
    {
        if (!($this->token)) {
            echo "ERROR: end of file";
            return false;
        }

        // Iterate through each of the types array
        foreach ($types as &$type) {
            if ($this->token->type === $type) {
                $token = $this->token;
                $this->token = $this->lexer->next_token();
                return $token;
            }
        }

        return false;
    }

    /**
     * View the current token or can be limited to some types
     * 
     * @param TokenType ...$types
     */
    public function view(TokenType...$types): void
    {
        while ($this->token) {
            print_r($this->consume(...$types));
            $this->token = $this->lexer->next_token();
        }
    }
}
?>