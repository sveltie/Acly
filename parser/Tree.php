<?php
/**
 * Tree data structure for managing how the code will run
 */
class Tree
{
    public $type;
    public $children;

    public function __construct(mixed $type, array $children)
    {
        $this->type = $type;
        $this->children = $children;
    }
}
?>