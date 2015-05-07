<?php

/**
 * Class SpacesUnaryNotOperatorSniff
 *
 * @copyright 2015 PB Web Media B.V.
 */
class Pbweb_Sniffs_Formatting_SpacesUnaryNotOperatorSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        return array(
            T_BOOLEAN_NOT,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr - 1]['code'] !== T_WHITESPACE || $tokens[$stackPtr + 1]['code'] !== T_WHITESPACE) {
            $error = 'A unary not operator (!) must be surrounded by spaces';
            $phpcsFile->addError($error, $stackPtr);

            return;
        }
    }
}
