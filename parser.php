<?php
class Tree
{
    public $type;
    public $children;

    public function __construct(mixed $type, array $children)
    {
        $this->type = $type;
        $this->children = $children;
    }
}

/**
 * Compiler backend by using Abstract Syntax Tree (AST)
 */
class Parser
{
    private $lexer;
    private $token;

    public function __construct(Lexer $lexer, mixed $token)
    {
        $this->lexer = $lexer;
        $this->token = $token;
    }
}
?>