<?php
// Attogram Framework - Info Module - Site Info v0.2.1

namespace Attogram;

$title = 'Information';
$this->pageHeader($title);

$info = array();
$info['<a id="attogram"></a><h3>🚀 <em>Attogram:</em></h3>'] = '';
$info['Attogram Version'] = self::ATTOGRAM_VERSION;
$info['Attogram Directory'] = info_dir($this->attogramDirectory);
$info['PHP Version'] = phpversion();
$info['PHP_OS'] = PHP_OS;
$info['Server Software'] = $this->request->server->get('SERVER_SOFTWARE');
$info['projectRepository'] = '<a href="'.$this->projectRepository.'">'
  .$this->projectRepository.'</a>';

$info['<a id="site"></a><h3>🏠 <em>Site:</em></h3>'] = '';
$info['siteUrl'] = '<a href="'.$this->getSiteUrl().'">'
  .$this->getSiteUrl().'</a>';
$info['path'] = ($this->path ? $this->path : '<code>Top Level</code>');

$robotstxt = $this->getSiteUrl().'/robots.txt';
$info['robots.txt'] = '<a href="'.$robotstxt.'">'.$robotstxt.'</a>';
$sitemapxml = $this->getSiteUrl().'/sitemap.xml';
$info['sitemap.xml'] = '<a href="'.$sitemapxml.'">'.$sitemapxml.'</a>';
$info['config'] = info_array($this->config, true);

$info['<a id="actions"></a><h3>▶ <em>Actions:</em></h3>'] = '';
$info['actions'] = info_actions($this->actions, $this->depth, $this->noEndSlash);
$info['adminActions'] = info_actions($this->adminActions, $this->depth, $this->noEndSlash);

$info['<a id="directories"></a><h3>📂 <em>Directories:</em></h3>'] = '';
$info['attogramDirectory'] = info_dir($this->attogramDirectory);
$info['modulesDirectory'] = info_dir($this->modulesDirectory);
$info['templatesDirectory'] = info_dir($this->templatesDirectory);

$info['<a id="files"></a><h3>📄 <em>Files:</em></h3>'] = '';
$info['templates'] = info_array($this->templates, true);
$info['skip_files'] = info_array($this->getSkipFiles());

$info['<a id="objects"></a><h3>📎 <em>Objects:</em></h3>'] = '';
$info['log'] = info_object($this->log);
$info['event'] = info_object($this->event);
$info['db'] = info_object($this->database);
$info['request'] = info_object($this->request);

$info['<a id="database"></a><h3>💾 <em>Database:</em></h3>'] = '';
$info['databaseName'] = info_file($this->config['databaseName']);
$info['database_size'] = (file_exists($this->config['databaseName'])
  ? filesize($this->config['databaseName']) : '<code>null</code>').' bytes';

$info['<a id="user"></a><h3>👤 <em>User:</em></h3>'] = '';
$info['host'] = $this->host;
$info['IP'] = $this->clientIp;
$info['# session attributes'] = sizeof($_SESSION);
$info['session attributes'] = info_array($_SESSION, true);

print '
<div class="container">
 <h1>💁 '.$title.'</h1>
 <p>
 <a href="#attogram">attogram</a> -
 <a href="#site">site</a> -
 <a href="#actions">actions</a> -
 <a href="#directories">directories</a> -
 <a href="#files">files</a> -
 <a href="#objects">objects</a> -
 <a href="#database">database</a> -
 <a href="#user">user</a>
 </p>
 <table class="table table-condensed">
';

foreach ($info as $name => $value) {
    print '<tr><td>'.$name.'</td><td>'.$value.'</td></tr>';
}
print '</table>';
print '</div>';

$this->pageFooter();


// Helper functions
function info_array($array, $keyed = false)
{
    if (!is_array($array)) {
        return '<code>ERROR</code>';
    }
    if (!$array) {
        return '<code>null</code>';
    }
    if (!$keyed) {
        return '<ul class="list-group"><li class="list-group-item">'
        .implode('</li><li class="list-group-item">', $array)
        .'</li></ul>';
    }
    $result = '';
    foreach ($array as $name => $value) {
        $result .= '<li class="list-group-item"><strong>'.$name.'</strong> = ';
        if (is_array($value)) {
            $result .= ' Array: '.info_array($value, $keyed);
        } elseif (is_object($value)) {
            $result .= ' Object: '.info_object($value);
        } else {
            $result .= '<code>'.$value.'</code>';
        }
        $result .= '</li>';
    }
    return '<ul class="list-group">'.$result.'</ul>';
}

function info_object($obj)
{
    $gn = 'remove';
    $gt = 'danger';
    $n = '<code>?</code>';
    if (is_object($obj)) {
        $gn = 'ok';
        $gt = 'success';
        $n = get_class($obj);
    }
    return '<span class="glyphicon glyphicon-'.$gn.' text-'.$gt
        .'" aria-hidden="true"></span> '.$n;
}

function info_file($file)
{
    $gn = 'remove';
    $gt = 'danger';
    if (is_file($file) && is_readable($file)) {
        $gn = 'ok';
        $gt = 'success';
    }
    return '<span class="glyphicon glyphicon-'.$gn.' text-'.$gt
        .'" aria-hidden="true"></span> '.$file;
}

function info_dir($dir)
{
    $gn = 'remove';
    $gt = 'danger';
    if (is_dir($dir)) {
        $gn = 'ok';
        $gt = 'success';
    }
    return '<span class="glyphicon glyphicon-'.$gn.' text-'.$gt
        .'" aria-hidden="true"></span> '.$dir;
}

function info_actions($actions, $depths = array(), $endslashs = array())
{
    $result = '';
    if (!isset($depths[''])) {
        $depths[''] = '<code>ERROR</code>';  // homepage
    }
    if (!isset($depths['*'])) {
        $depths['*'] = '<code>ERROR</code>'; // default
    }
    foreach (array_keys($actions) as $action) {
        if (isset($depths[$action])) {
            $depth = $depths[$action].' OVERRIDE ';
        } else {
            if ($action == 'home') {
                $depth = $depths[''].' <code>home page</code>';
            } else {
                $depth = $depths['*'].' <code>default depth</code>'; // default
            }
        }
        if (isset($endslashs[$action])) {
            $endslash = '<code>Remove Slash at end</code>';
        } else {
            $endslash = '<code>Force Slash at end</code>';
        }
        $result .= '<li class="list-group-item"><a href="../'.$action.'/"><strong>'
            .$action.'</strong></a>'
            .'<br /> - file: <strong>'.info_file($actions[$action]['file']).'</strong>'
            .'<br /> - parser: <strong>'.$actions[$action]['parser'].'</strong>'
            .'<br /> - depth: <strong>'.$depth.'</strong>'
            .'<br /> - slash: <strong>'.$endslash.'</strong>'
            .'</li>';
    }
    return '<ul class="list-group">'.$result.'</ul>';
}
