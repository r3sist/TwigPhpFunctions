<?php declare(strict_types=1);

namespace resist\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension for allowing built in PHP functions in templates
 * @usage `$twig->addExtension(new TwigF3\TwigPhpFunctions(['ceil']));`
 */
final class TwigPhpFunctions extends AbstractExtension
{
    private array $functions = [];

    /** @param string[] $functions Allowed function names */
    public function __construct(array $functions)
    {
        $this->allowFunctions($functions);
    }

    private function allowFunctions(array $functions): void
    {
        $this->functions = $functions;
    }

    public function getFunctions(): array
    {
        $twigFunctions = [];

        foreach ($this->functions as $function) {
            $twigFunctions[] = new TwigFunction($function, $function);
        }

        return $twigFunctions;
    }
}
