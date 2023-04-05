<?php
include "lexer.php";

$buffer = "./test/main.tnt";

$lexer = new Lexer($buffer);

$lexer->next_token();
?>