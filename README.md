# PBWeb coding standard

## Install globally via composer:

Edit `~/.composer/composer.json` and add:
    
    {
        "repositories": [
            {
              "type": "composer",
              "url": "http://satis.pbw"
            }
        ],
        "require": {
            "squizlabs/php_codesniffer": "^2.8",
            "pbweb/pbweb-coding-standard": "^1.1.1"
        },
        "config": {
            "secure-http": false
        }
    }

After that, update your global composer dependencies:

    composer global update
    
And configure phpcs to use the Pbewb standard

    phpcs --config-set installed_paths ${HOME}/.composer/vendor/pbweb/pbweb-coding-standard/,${HOME}/.composer/vendor/escapestudios/symfony2-coding-standard/
    phpcs --config-set default_standard Pbweb
