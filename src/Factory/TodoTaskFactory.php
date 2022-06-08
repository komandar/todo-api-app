<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\TodoTask;
use Zenstruck\Foundry\ModelFactory;

final class TodoTaskFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(30),
            'description' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(TodoTask $todoTask): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TodoTask::class;
    }
}
