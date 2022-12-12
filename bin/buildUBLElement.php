#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

(new SingleCommandApplication())
    ->setName('Build UBL Element') // Optional
    ->setVersion('0.0.1') // Optional
    ->addArgument('elem', InputArgument::REQUIRED, 'Element name')
    ->addArgument('loc', InputArgument::REQUIRED, 'Element location (CBC|CAC...)')
    ->addArgument('type', InputArgument::REQUIRED, 'Which type does element extend (TextType|AmountType...)')
    ->addArgument('typeLoc', InputArgument::REQUIRED, 'Where is the type (CCTType|CACType...)')
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $elem = $input->getArgument('elem');
        $loc = strtoupper($input->getArgument('loc'));
        $locLower = strtolower($loc);
        $typeLoc = $input->getArgument('typeLoc');
        $type = $input->getArgument('type');
        $template = <<<TPL
<?php

namespace i3or1s\UBL\\$loc;

use i3or1s\UBL\\$typeLoc\\$type;

/**
 * http://www.datypic.com/sc/ubl21/e-{$locLower}_$elem.html
 */
final class $elem extends $type
{
    protected const ELEMENT_SIGNATURE = "$locLower:$elem";
}
TPL;
        $fileLocation = __DIR__.'/../src/UBL/'.$loc.'/'.$elem.'.php';
        if(file_exists($fileLocation)) {
            $output->writeln("File already exists");
            die(0);
        }
        file_put_contents($fileLocation, $template);
        $output->writeln("Success!!");
    })
    ->run();