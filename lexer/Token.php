<?php
/**
 * This is for collection for the grammar of Acly
 */
class Token
{
    public $type;
    public $value;

    public function __construct(TokenType $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
?>