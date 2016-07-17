<?php
// Attogram Framework - Info Module - CHANGELOG page v0.1.0

namespace Attogram;

$page = new MarkdownPage(
    $this->attogramDirectory.'CHANGELOG.md',
    'Changelog - Attogram Framework',
    $this
);

print $page->getPage();
