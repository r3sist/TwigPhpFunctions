# Twig PHP Functions - Twig extension

Allowing PHP functions in templates

---

## Installation

`composer require resist/twigphpfunctions`

## Usage

Constructor parameter is an array of built in PHP function names as string.

```php
new TwigPhpFunctions(['ceil', 'floor']);
```

### In Symfony framework

In *config/services.yaml*:

```yaml
parameters:
	app.allowed_php_functions_in_templates: ['ceil', 'floor']
	
services:
	resist\Twig\TwigPhpFunctions:
			tags: ['twig.extension']
			arguments:
				$functions: '%app.allowed_php_functions_in_templates%'
```

### Without framework

```php
use resist\Twig\TwigPhpFunctions;
use const ALLOWED_PHP_FUNCTION_IN_TEMPLATES;

/** @var \Twig\Environment $twig */
$twig->addExtension(new TwigPhpFunctions(ALLOWED_PHP_FUNCTION_IN_TEMPLATES));
```