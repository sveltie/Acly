<?php
function read_file(string $filename): string
{
    // Check whether a file exist or not
    if (!file_exists($filename)) {
        throw new Exception("Error: cannot read file $filename");
    }

    $file = fopen($filename, "rb");
    $content = stream_get_contents($file);

    // If file is empty, throw exception
    if (!$content) {
        throw new Exception("Error reading file: $filename");
    }

    fclose($file);
    return $content;
}
?>