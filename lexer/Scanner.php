<?php
require_once "Lexer.php";

class Scanner extends Lexer
{
    private $keyword_tokens = array(
        "fn" => TokenType::FUNCTION ,
        "if" => TokenType::IF ,
        "else" => TokenType::ELSE ,
        "for" => TokenType::FOR ,
        "while" => TokenType:: WHILE ,
        "true" => TokenType::TRUE,
        "false" => TokenType::FALSE,
        "and" => TokenType::AND ,
        "or" => TokenType::OR ,
        "null" => TokenType::NULL,
        "return" => TokenType::RETURN ,
        "end" => TokenType::END,
    );

    private $char_tokens = array(
        "(" => TokenType::LPAREN,
        ")" => TokenType::RPAREN,
        ":" => TokenType::COLON,
        "+" => TokenType::ADDITION,
        "-" => TokenType::SUBTRACT,
        "*" => TokenType::MULTIPLY,
        "/" => TokenType::DIVISION,
        "=" => TokenType::EQUAL,
    );

    private function identifier()
    {
        while ($this->is_not_empty() && ctype_alnum($this->peek())) {
            $this->advance();
        }

        $value = substr($this->source, $this->start, $this->curr - $this->start);

        if (isset($this->keyword_tokens[$value])) {
            return new Token($this->keyword_tokens[$value], $value);
        }

        return new Token(TokenType::IDENTIFIER, $value);
    }

    private function string()
    {
        $literal = "";

        while ($this->is_not_empty() && $this->peek() !== '"') {
            $literal .= $this->peek();
            $this->advance();
        }

        if ($this->is_empty()) {
            throw new Exception("Unterminated string.");
        }

        $this->advance();
        return new Token(TokenType::STRING, $literal);
    }

    private function number()
    {
        while ($this->is_not_empty() && ctype_digit($this->peek())) {
            $this->advance();
        }

        $value = substr($this->source, $this->start, $this->curr - $this->start);
        return new Token(TokenType::NUMBER, $value);
    }

    private function scan_token()
    {
        $c = $this->advance();

        if (!$this->peek()) {
            return false;
        }

        if (ctype_space($c)) {
            return false;
        }

        if (ctype_alnum($c)) {
            return $this->identifier();
        }

        if (ctype_digit($c)) {

        }

        if (isset($this->char_tokens[$c])) {
            return new Token($this->char_tokens[$c], $c);
        }

        if ($c === '"') {
            return $this->string();
        }
    }

    public function scan_tokens()
    {
        while (!$this->is_at_end()) {
            $this->start = $this->curr;
            array_push($this->tokens, $this->scan_token());
        }

        array_push($this->tokens, new Token(TokenType::EOF, null));
        return $this->tokens;
    }
}
?>