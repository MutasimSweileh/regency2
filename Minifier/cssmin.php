<?php

/**
 * Thin wrapper around css minifiers to avoid rewriting a bunch of existing code.
 */

if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists("CssMin")) {
    class CssMin
    {
        /**
         * Minifier instance.
         *
         * @var Autoptimize\tubalmartin\CssMin\Minifier|null
         */
        protected $minifier = null;

        /**
         * Construtor.
         *
         * @param bool $raise_limits Whether to raise memory limits or not. Default true.
         */
        public function __construct($raise_limits = true)
        {
            require_once("yui-php-cssmin-bundled/Colors.php");
            require_once("yui-php-cssmin-bundled/Utils.php");
            require_once("yui-php-cssmin-bundled/Minifier.php");
            $this->minifier = new Autoptimize\tubalmartin\CssMin\Minifier($raise_limits);
        }

        /**
         * Runs the minifier on given string of $css.
         * Returns the minified css.
         *
         * @param string $css CSS to minify.
         *
         * @return string
         */
        public function run($css)
        {
            $result = $this->minifier->run($css);

            return $result;
        }

        /**
         * Static helper.
         *
         * @param string $css CSS to minify.
         *
         * @return string
         */
        public static function minify($css)
        {
            $minifier = new self();

            return $minifier->run($css);
        }
    }
}
