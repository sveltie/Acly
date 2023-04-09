<?php
require_once "./lexer/Token.php";

abstract class Expr
{
    public $left;
    public $operator;
    public $right;
}

class Binary extends Expr
{
    public function __construct(Expr $left, Token $operator, Expr $right)
    {
        $this->left = $left;
        $this->operator = $operator;
        $this->right = $right;
    }
}
?>