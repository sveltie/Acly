<?php
include "lexer.php";

$colorGreen = "\033[0;32m";
$colorYellow = "\033[0;33m";
$colorReset = "\033[0m";
$colorCyan = "\033[0;36m";

$buffer = read_file("./target/main.acly");

echo "Size of file: " . strlen($buffer) . "\n";

$lexer = new Lexer($buffer);

// fn main():\nprintln("Hello, Acly!");
//             ^

while ($buffer) {
    $token = $lexer->next_token();

    if ($lexer->pos == strlen($buffer)) {
        break;
    }

    if ($token instanceof Token) {
        switch ($token->type) {
            case TOKEN_KEYWORD:
                echo $colorYellow . $token->value . $colorReset;
                break;
            case TOKEN_IDENTIFIER:
                echo $colorGreen . $token->value . $colorReset;
                break;
            case TOKEN_STRING:
                echo $colorCyan . $token->value . $colorReset;
                break;
            default:
                echo $token->value;
        }
    } else {
        echo $token;
    }
}
?>