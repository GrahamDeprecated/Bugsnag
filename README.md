# StyleCI Bugsnag ![Analytics](https://ga-beacon.appspot.com/UA-60053271-6/StyleCI/Bugsnag?pixel)


StyleCI Bugsnag was created by, and is maintained by [Graham Campbell](https://github.com/GrahamCampbell), and is a Bugsnag bridge for Laravel 5. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/StyleCI/Bugsnag/releases), [license](LICENSE), and [contribution guidelines](CONTRIBUTING.md).

![StyleCI Bugsnag](https://cloud.githubusercontent.com/assets/2829600/6657233/3473a988-cb3d-11e4-979c-a96f4ee7ff9f.png)

<p align="center">
<a href="https://travis-ci.org/StyleCI/Bugsnag"><img src="https://img.shields.io/travis/StyleCI/Bugsnag/master.svg?style=flat-square" alt="Build Status"></img></a>
<a href="https://scrutinizer-ci.com/g/StyleCI/Bugsnag/code-structure"><img src="https://img.shields.io/scrutinizer/coverage/g/StyleCI/Bugsnag.svg?style=flat-square" alt="Coverage Status"></img></a>
<a href="https://scrutinizer-ci.com/g/StyleCI/Bugsnag"><img src="https://img.shields.io/scrutinizer/g/StyleCI/Bugsnag.svg?style=flat-square" alt="Quality Score"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></img></a>
<a href="https://github.com/StyleCI/Bugsnag/releases"><img src="https://img.shields.io/github/release/StyleCI/Bugsnag.svg?style=flat-square" alt="Latest Version"></img></a>
</p>


## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of StyleCI Bugsnag, simply add the following line to the require block of your `composer.json` file:

```
"styleci/bugsnag": "0.1.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once StyleCI Bugsnag is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `'StyleCI\Bugsnag\BugsnagServiceProvider'`


## Usage

StyleCI Bugsnag is designed to manage user provided bugsnag and protect against bad input. There is currently no real documentation for this package, but we are open to pull requests.


## License

StyleCI Bugsnag is licensed under [The MIT License (MIT)](LICENSE).
