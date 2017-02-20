<?php

/**
 * Class SpacesUnaryNotOperatorSniff
 *
 * @copyright 2015 PB Web Media B.V.
 */
class Pbweb_Sniffs_Formatting_SpacesUnaryNotOperatorSniff implements PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_BOOLEAN_NOT,
        ];
    }

    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $previous = $tokens[$stackPtr - 1]['code'];
        $next = $tokens[$stackPtr + 1]['code'];

        if ($previous !== T_WHITESPACE || $next !== T_WHITESPACE) {
            $error = 'A unary not operator (!) must be surrounded by spaces';
            $fix = $phpcsFile->addFixableError($error, $stackPtr);
            if ($fix === true) {
                if ($previous !== T_WHITESPACE) {
                    $phpcsFile->fixer->addContentBefore($stackPtr, ' ');
                }
                if ($next !== T_WHITESPACE) {
                    $phpcsFile->fixer->addContent($stackPtr, ' ');
                }
            }

            return;
        }
    }
}
