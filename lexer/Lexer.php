<?php
require_once "Token.php";
require_once "TokenType.php";

class Lexer
{
    protected $source;
    protected $tokens;
    protected $curr;
    protected $start;
    protected $line;

    public function __construct(string $source)
    {
        $this->source = $source;
        $this->tokens = array();
        $this->curr = 0;
        $this->start = 1;
        $this->line = 1;
    }

    protected function is_not_empty(): bool
    {
        return $this->curr < strlen($this->source);
    }

    protected function is_empty(): bool
    {
        return !$this->is_not_empty();
    }

    protected function is_at_end(): bool
    {
        return $this->curr >= strlen($this->source);
    }

    // Consumes the next character in the source file
    protected function advance(): string|bool
    {
        if ($this->is_not_empty()) {
            $curr = $this->curr;
            $this->curr += 1;

            if ($this->curr === "\n") {
                $this->line += 1;
            }

            return $this->source[$curr];
        }

        return false;
    }

    protected function peek()
    {
        if ($this->is_at_end())
            return false;
        return $this->source[$this->curr];
    }
}
?>