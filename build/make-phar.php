<?php

$file_phar = 'RarksDeskExample.phar';

if(file_exists($file_phar)){
	echo 'Phar file already exists, overwriting...';
	echo PHP_EOL;
	Phar::unlinkArchive($file_phar);
}
$files = [];
$dir = getcwd().DIRECTORY_SEPARATOR;

foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir)) as $path => $file){
	if(strpos($path, '.git') !== false or !$file->isFile()) continue;
	$files[str_replace($dir, '', $path)] = $path;
}

echo 'Compressing...'.PHP_EOL;
$phar = new Phar($file_phar, 0);
$phar->startBuffering();
$phar->setSignatureAlgorithm(\Phar::SHA1);
$phar->buildFromIterator(new \ArrayIterator($files));
$phar->setStub('<?php __HALT_COMPILER(); ?>');

if(isset($argv[1]) and $argv[1] === 'enableCompressAll'){
	$phar->compressFiles(Phar::GZ);

}else{
	foreach($phar as $file => $finfo){
		/** @var \PharFileInfo $finfo */
		if($finfo->getSize() > (1024 * 512)) $finfo->compress(\Phar::GZ);
	}
}
$phar->stopBuffering();
echo 'end'.PHP_EOL;