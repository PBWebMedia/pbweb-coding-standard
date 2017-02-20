# PB Web Media PHPCS coding standard

This is the PHPCS ruleset we use. It is based on the Symfony2 coding standard provided by Escape Studios and features:
 
* Rule which requires spaces around string concat (`.`) operator
* Rule which requires spaces around unary not (`!`) operator

It also disables some rules which causes the following:

* Space after opening bracket are now allowed (conflicts with spaces around unary not rule, eg.: `some_func( ! $value)`)
* Function comments are no longer required (PHP7 type hinting fixes this)
* No need to order class methods by scope
* Multi line function declaration may be on the following line

## Install globally via composer:

Install using:

    composer global require pbweb/pbweb-coding-standard

And configure phpcs to use the Pbweb standard

    phpcs --config-set installed_paths ${HOME}/.composer/vendor/pbweb/pbweb-coding-standard/,${HOME}/.composer/vendor/escapestudios/symfony2-coding-standard/
    phpcs --config-set default_standard Pbweb

## Install in your project only:

Install using:

    composer require pbweb/pbweb-coding-standard

### Phing configuration

Example phing target:

    <target name="check:cs" description="Checks coding standard.">
        <echo msg="Checking coding standard..." />
        <phpcodesniffer standard="Pbweb"
                        showSniffs="true"
                        showWarnings="true">
            <fileset refid="sourcecode" />
            <formatter type="checkstyle" outfile="${dir.reports}/checkstyle.xml" />
            <config name="installed_paths" value="${project.basedir}/vendor/pbweb/pbweb-coding-standard,${project.basedir}/vendor/escapestudios/symfony2-coding-standard" />
        </phpcodesniffer>
    </target>
