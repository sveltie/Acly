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
        $token = $this->token;
        $this->token = $this->lexer->next_token();

        if (!$token) {
            echo "ERROR: end of file";
            return false;
        }

        // Iterate through each of the types array
        foreach ($types as &$type) {
            if ($token->type === $type) {
                return $token;
            }
        }

        return false;
    }

    private function parse_scope()
    {
        if (!$this->consume(TokenType::COLON))
            return false;

        $scope = array();

        while (true) {
            $identifier = $this->consume(TokenType::IDENTIFIER, TokenType::EOS);
            if (!$identifier)
                return false;
            if ($identifier->type == TokenType::EOS)
                break;
        }
    }

    /**
     * parse a function
     * 
     * @todo return a Function with it's name and body
     */
    private function parse_function()
    {
        $identifier = $this->consume(TokenType::IDENTIFIER);

        if (!$identifier)
            return false;

        if (!$this->consume(TokenType::LPAREN))
            return false;

        if (!$this->consume(TokenType::RPAREN))
            return false;

        print_r($identifier);
    }

    /**
     * arg parser for function
     * 
     * @return array|bool
     */
    private function parse_args(): array|bool
    {
        $parse_args = array();
        $expr = $this->consume(TokenType::STRING);

        if (!$expr)
            return false;

        array_push($parse_args, $expr);

        return $parse_args;
    }

    /**
     * View the current token and can be limited to some token types
     * 
     * @param TokenType ...$types
     */
    public function view(TokenType...$types): void
    {
        while ($this->token) {
            print_r($this->consume(...$types));
        }
    }


    public function test()
    {
        while ($this->token) {
            $this->parse_function();
        }
    }
}
?>