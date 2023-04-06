<?php
include "Token.php";
include "TokenType.php";
include "utils/utils.php";

/**
 * Compiler frontend
 */
class Lexer
{
    public $source; // source
    public $pos; // track current position
    public $row; // track row
    public $bol; // beginning of line

    /**
     * @param string $source
     */
    public function __construct(string $source)
    {
        $this->source = $source;
        $this->pos = 0;
        $this->bol = 0;
        $this->row = 0;
    }

    private function is_not_empty(): bool
    {
        return $this->pos < strlen($this->source);
    }

    private function is_empty(): bool
    {
        return !($this->is_not_empty());
    }

    /**
     * walk through a character in the source. Can be used to skip certain char
     * 
     * @return void
     */
    private function advance(): void
    {
        if ($this->is_not_empty()) {
            $curr = $this->source[$this->pos];
            $this->pos += 1;

            if ($curr === "\n") {
                $this->bol = $curr;
                $this->row += 1;
            }
        }
    }

    /**
     * skip or trim if current pos char is a space
     * 
     * @return void
     */
    private function trim_space(): void
    {
        while ($this->is_not_empty() && ctype_space($this->source[$this->pos])) {
            $this->advance();
        }
    }

    /**
     * collects alphanumeric sequence to get the identifier
     * 
     * @return string
     */
    private function get_identifier(): string
    {
        $indentifier = "";

        while ($this->is_not_empty() && ctype_alnum($this->source[$this->pos])) {
            $indentifier .= $this->source[$this->pos];
            $this->advance();
        }

        return $indentifier;
    }

    /**
     * consume the input string and return the next token in the sequence
     * 
     * @return Token|bool
     */
    function next_token(): Token|bool
    {
        $this->trim_space();

        if ($this->is_empty()) {
            return false;
        }

        $s = $this->source[$this->pos];

        $keyword_tokens = array(
            "fn" => TokenType::FUNCTION ,
        );

        if (ctype_alnum($s)) {
            $tmp = "";

            while ($this->is_not_empty() && ctype_alnum($this->source[$this->pos])) {
                $tmp .= $this->source[$this->pos];
                $this->advance();
            }

            if (isset($keyword_tokens[$tmp])) {
                return new Token($keyword_tokens[$tmp], $tmp);
            } else {
                return new Token(TokenType::IDENTIFIER, $tmp);
            }
        }

        $literal_tokens = array(
            "(" => TokenType::RPAREN,
            ")" => TokenType::LPAREN,
            ";" => TokenType::SEMICOLON,
            ":" => TokenType::COLON,
        );

        if (isset($literal_tokens[$s])) {
            $this->advance();
            return new Token($literal_tokens[$s], $s);
        }

        // Check if a sequence a string or not by walking from s that starts 
        // with " and ends with "
        if ($s === '"') {
            $this->advance();

            $tmp = "";

            while ($this->is_not_empty() && $this->source[$this->pos] !== '"') {
                $tmp .= $this->source[$this->pos];
                $this->advance();
            }

            if ($this->is_not_empty()) {
                $this->advance();
                return new Token(TokenType::STRING, $tmp);
            }

            return false;
        }

        return false;
    }
}
?>