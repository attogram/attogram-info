<?php
// Attogram Framework - Info Module - MarkdownPage class v0.1.0

namespace Attogram;

class MarkdownPage
{
    public $file;
    public $title;
    public $attogram;

    public function __construct($file, $title, $attogram)
    {
        $this->file = $file;
        $this->title = $title;
        $this->attogram = $attogram;
    }

    public function getPage()
    {
        if (!is_readable($this->file)) {
            $this->attogram->log->error('MarkdownPage: file not found: '.$this->file);
            $this->attogram->error404('File lost in the wind');
        }
        return $this->attogram->doMarkdown($this->file, $this->title);
    }
}
