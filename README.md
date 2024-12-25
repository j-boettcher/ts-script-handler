# TYPO3 TypoScript Utility

Small utility class to get TypoScript configuration out of any context (i.e. cli command).

Coded for TYPO3 version 13.

Easy to implement:

```
use Jboettcher\TsScriptHandler\Utility\TypoScriptUtility;

...

$typoScriptHandlerService = GeneralUtility::makeInstance(TypoScriptUtility::class);
$typoscript = $typoScriptHandlerService->getTypoScript();
```
