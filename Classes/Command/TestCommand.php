<?php

declare(strict_types=1);

namespace Jboettcher\TsScriptHandler\Command;

use Jboettcher\TsScriptHandler\Utility\TypoScriptUtility;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class TestCommand extends Command
{
    protected function configure(): void
    {
        $this->setDescription('Testing Typoscript in a command');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Test if typoscript service works in cli context
        $typoScriptHandlerService = GeneralUtility::makeInstance(TypoScriptUtility::class);
        $typoScriptHandlerService->getTypoScriptAsArray();

        return 0;
    }
}
