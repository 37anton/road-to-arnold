<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CustomTwigExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('isDebutant', [$this, 'isDebutant']),
        ];
    }

    public function isDebutant($user): bool
    {
        return $user instanceof \App\Entity\Debutant;
    }
}
