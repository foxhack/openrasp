--TEST--
hook array_filter
--SKIPIF--
<?php
$conf = <<<CONF
callable.blacklist=["system", "exec"]
callable.action="block"
CONF;
include(__DIR__.'/../skipif.inc');
?>
--INI--
openrasp.root_dir=/tmp/openrasp
--FILE--
<?php
array_filter(array('ls', 'whoami'), "system");
?>
--EXPECTREGEX--
<\/script><script>location.href="http[s]?:\/\/.*?request_id=[0-9a-f]{32}"<\/script>