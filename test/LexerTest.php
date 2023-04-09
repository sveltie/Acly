<?php
use PHPUnit\Framework\TestCase;

require_once "lexer/Scanner.php";
require_once "lexer/Token.php";
require_once "utils/utils.php";

class LexerTest extends TestCase
{
    private $scanner;

    protected function setUp(): void
    {
        $this->scanner = new Scanner("./target/main.acly");
    }

    public function testSimpleFile()
    {
        // ...
    }
}

?>