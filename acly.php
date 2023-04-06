<?php
include "lexer/Lexer.php";
include "parser/Parser.php";

$colorGreen = "\033[0;32m";
$colorYellow = "\033[0;33m";
$colorReset = "\033[0m";
$colorCyan = "\033[0;36m";

$buffer = read_file("./target/main.acly");

echo "Size of file: " . strlen($buffer) . "\n";

$lexer = new Lexer($buffer);
$parser = new Parser($lexer);

$parser->view(TokenType::FUNCTION , TokenType::IDENTIFIER);
?>