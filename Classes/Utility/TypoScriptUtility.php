<?php

declare(strict_types=1);

namespace Jboettcher\TsScriptHandler\Utility;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class TypoScriptUtility {
    public function __construct() {}
    
    /**
     * Method getTypoScriptAsArray
     * 
     * @desc Get the full typoscript of a site
     *
     * @return array
     */
    public function getTypoScriptAsArray(): array
    {
        $request = $this->getRequest();
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $configurationManager->setRequest($request);
        $configuration = $configurationManager->getConfiguration(ConfigurationManager::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        return $configuration;
    }
    
    /**
     * Method getRequest
     * 
     * @desc Get the ServerRequest object and if it does not exist i.e. in cli context
     * create a new, so configuration manager can load tyoposcript configuration
     *
     * @return ServerRequestInterface
     */
    protected function getRequest(): ?ServerRequestInterface
    {
        if (!isset($GLOBALS['TYPO3_REQUEST'])) {
            $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
            $site = $siteFinder->getSiteByRootPageId(1);

            $GLOBALS['TYPO3_REQUEST'] = (new ServerRequest($site->getBase()))
                ->withAttribute('applicationType', SystemEnvironmentBuilder::REQUESTTYPE_BE);
            GeneralUtility::setIndpEnv('TYPO3_REQUEST_DIR', (string)$site->getBase());
        }

        return $GLOBALS['TYPO3_REQUEST'];
    }
}