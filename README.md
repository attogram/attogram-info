# Attogram Framework Info Module v0.0.5

[![Build Status](https://travis-ci.org/attogram/attogram-info.svg?branch=master)](https://travis-ci.org/attogram/attogram-info)
[![Latest Stable Version](https://poser.pugx.org/attogram/attogram-info/v/stable)](https://packagist.org/packages/attogram/attogram-info)
[![Latest Unstable Version](https://poser.pugx.org/attogram/attogram-info/v/unstable)](https://packagist.org/packages/attogram/attogram-info)
[![Total Downloads](https://poser.pugx.org/attogram/attogram-info/downloads)](https://packagist.org/packages/attogram/attogram-info)
[![License](https://poser.pugx.org/attogram/attogram-info/license)](https://github.com/attogram/attogram-info/blob/master/LICENSE.md)
[![Code Climate](https://codeclimate.com/github/attogram/attogram-info/badges/gpa.svg)](https://codeclimate.com/github/attogram/attogram-info)
[![Issue Count](https://codeclimate.com/github/attogram/attogram-info/badges/issue_count.svg)](https://codeclimate.com/github/attogram/attogram-info)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/e9cf59f181944cedb746349dbcffa8a0)](https://www.codacy.com/app/attogram-project/attogram-info?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=attogram/attogram-info&amp;utm_campaign=Badge_Grade)
[`[CHANGELOG]`](https://github.com/attogram/attogram-info/blob/master/CHANGELOG.md)
[`[TODO]`](https://github.com/attogram/attogram-info/blob/master/TODO.md)

This is the [Info Module](https://github.com/attogram/attogram-info) for the
[Attogram Framework](https://github.com/attogram/attogram).

## Installing the Info Module

* You already installed the
  [Attogram Framework](https://github.com/attogram/attogram), didn't you?
* Goto the top level of your install, then run:

```
composer create-project attogram/attogram-info modules/_attogram_info
```

## Info Module contents

### Public Actions

* `actions/license.php` - loads, parses and displays Attogram top level
  [`./LICENSE.md`](https://github.com/attogram/attogram/blob/master/LICENSE.md)
* `actions/readme.php` - loads, parses and displays Attogram top level
  [`./README.md`](https://github.com/attogram/attogram/blob/master/README.md)

### Admin Actions

* `admin_actions/info.php` - debug information about the current install

### Included files

* `includes/MarkDownPage.php` - markdown page maker

### Misc

* `tests/BaseTest.php` - phpunit tests
