<?php

/**
 * Class SpacesConcatOperatorSniff
 *
 * @copyright 2015 PB Web Media B.V.
 */
class Pbweb_Sniffs_Formatting_SpacesConcatOperatorSniff implements PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_STRING_CONCAT,
        ];
    }

    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $previous = $tokens[$stackPtr - 1]['code'];
        $next = $tokens[$stackPtr + 1]['code'];

        if ($previous !== T_WHITESPACE || $next !== T_WHITESPACE) {
            $error = 'A concatenation operator (.) must be surrounded by spaces';
            $phpcsFile->addError($error, $stackPtr);

            return;
        }
    }
}
