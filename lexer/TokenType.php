<?php
enum TokenType: string
{
    // Variable
    case IDENTIFIER = "TOKEN_IDENTIFIER";

    // Keyword
    case STRING = "TOKEN_STRING";
    case INTEGER = "TOKEN_INTEGER";
    case BOOLEAN = "TOKEN_BOOLEAN";
    case FUNCTION = "TOKEN_FUNCTION";

    case LPAREN = "TOKEN_LPAREN";
    case RPAREN = "TOKEN_RPAREN";
    case COLON = "TOKEN_COLON";
    case SEMICOLON = "TOKEN_SEMICOLON";
    case EOF = "TOKEN_EOF";
    case EOS = "TOKEN_EOS";
}
?>