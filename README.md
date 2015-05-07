# PBWeb coding standard

## Install via composer:

Edit `~/.composer/composer.json` and add:
    
    {
        "repositories": [
            {
              "type": "composer",
              "url": "http://satis.pbw"
            }
        ],
        "require": {
            "squizlabs/php_codesniffer": "~2.3",
            "pbweb/pbweb-coding-standard": "~1.0"
        }
    }

After that, update your global composer dependencies:

    composer global update
    
And configure phpcs to use the Pbewb standard

    phpcs --config-set installed_paths ${HOME}/.composer/vendor/pbweb/pbweb-coding-standard/,${HOME}/.composer/vendor/leaphub/phpcs-symfony2-standard/leaphub/phpcs/
    phpcs --config-set default_standard Pbweb
