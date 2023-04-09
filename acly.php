<?php
// require_once "lexer/Lexer.php";
require_once "lexer/Scanner.php";
require_once "parser/Parser.php";
require_once "utils/utils.php";

function main($argv)
{
    if (sizeof($argv) > 0) {
        $flag = $argv[1];

        if ($flag === "--tokenize") {
            $buffer = read_file($argv[2]);

            echo "Size of file: " . strlen($buffer) . "\n";

            $scanner = new Scanner($buffer);
            $tokens = $scanner->scan_tokens();

            if ($tokens) {
                foreach ($tokens as &$token) {
                    if ($token instanceof Token) {
                        print_r($token);
                    }
                }
            }

            return;
        }

        $buffer = read_file($argv[1]);

        echo "Size of file: " . strlen($buffer) . "\n";

        $scanner = new Scanner($buffer);
        $tokens = $scanner->scan_tokens();

        if ($tokens) {
            foreach ($tokens as &$token) {
                if ($token instanceof Token) {
                    echo $token->value;
                }
            }

            return;
        }

        return;
    }

    echo "ERROR: no file path were provided" . "\n";
}

main($argv);
?>