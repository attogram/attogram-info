<?php
// Attogram Framework - Info Module - README page v0.3.0

namespace Attogram;

$page = new MarkdownPage(
    $this->attogramDirectory.'README.md',
    'Readme - Attogram Framework',
    $this
);

print $page->getPage();
