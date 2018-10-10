

<p align="center"><img src="https://thumb.ibb.co/fDOcRG/goodone.jpg"></p>

## SILVER ENGINE CLI MODULE

## WHAT IS SILVER ENGINE FRAMEWORK?

SilverEngine is a powerful PHP Dynamical MVC framework built for developers who need a simple and elegant toolkit to create powerfull full-featured web applications.

![Licence](https://img.shields.io/badge/Licence-MIT-green.svg)
![PHP7.1](https://img.shields.io/badge/php-7.1-blue.svg)
![version Alpha](https://img.shields.io/badge/Alpha-V1.0.4-green.svg)


## install

This module need php v7.1 or up

> Composer requre silverengine/cli

> Composer update

## Commands

This module need php v7.1 or up


### Commands

> php silver make:controller

### options

- -h = help
- -d = delete
- -f = force



## Contributing

Thank you for considering contributing to the framework!

### Rules to follow

1. Same tree structure
2. PSR-4 and PSR-2 
3. Namespace need to start with an Alias \Silver\
4. Follow manual for pagkagist  [Packagist docs](https://packagist.org/)
5. (Optional) join us on Discord server [Join here](https://discord.gg/cwMygSP)
5. Make docs with .MD
6. Code need to be unit tested - php v5.6 |  [PHPUnit](https://phpunit.de/index.html)


### Tree
> For easy use please Src/ file direct the namespace to alias 
```php 
\Silver\<name of your project>\<classes>
```

```php
<project root>
├─ config/
├─ docs/
├─ node_modules/
├─ public/
......└── index.php
├─ src/
......├── Controllers/
............└── DefaultController.php
......├── Facades/
......├── Helpers/
......├── Templates/
......└── Services/
├─ tests/
├─ translations/
├─ var/
......├─ cache/
......├─ log/
......└─ session/
├─ vendor/
└─ composer.json
```

## License

The Silver Engine framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
