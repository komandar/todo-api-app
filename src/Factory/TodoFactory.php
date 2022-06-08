<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Todo;
use Zenstruck\Foundry\ModelFactory;

final class TodoFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(30),
            'description' => self::faker()->text(),
        ];
    }

    /**
     * @return $this
     */
    protected function initialize(): self
    {
        return $this;
    }

    /**
     * @return string
     */
    protected static function getClass(): string
    {
        return Todo::class;
    }
}
