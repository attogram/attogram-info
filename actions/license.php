<?php
// Attogram Framework - Info Module - LICENSE page v0.3.0

namespace Attogram;

$page = new MarkdownPage(
    $this->attogramDirectory.'LICENSE.md',
    'License - Attogram Framework',
    $this
);

print $page->getPage();
