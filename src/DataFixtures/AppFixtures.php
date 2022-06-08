<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Factory\TodoFactory;
use App\Factory\TodoTaskFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        // create todo entries
        TodoFactory::createMany(
            10,
        );

        // create task entries for todo
        TodoTaskFactory::createMany(
            20,
            function () {
                return ['todo' => TodoFactory::random()];
            }
        );
    }
}
