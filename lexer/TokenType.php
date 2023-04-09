<?php
enum TokenType
{
    // Literals
    case IDENTIFIER;
    case STRING;
    case NUMBER;

    // Keyword
    case FUNCTION;
    case IF;
    case ELSE;
    case FOR;
    case WHILE;
    case TRUE;
    case FALSE;
    case AND;
    case OR;
    case NULL;
    case RETURN;

    // Separator
    case LPAREN;
    case RPAREN;
    case COLON;
    case END;

    // Operator
    case ADDITION;
    case SUBTRACT;
    case MULTIPLY;
    case DIVISION;
    case EQUAL;


    case EOF;
}
?>