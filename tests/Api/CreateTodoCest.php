<?php

declare(strict_types=1);

namespace App\Tests\Api;

use App\Entity\Todo;
use \App\Tests\ApiTester;

class CreateTodoCest
{
    private string $lorem = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';

    /**
     * @param ApiTester $I
     * @return void
     */
    public function testPostTodoViaAPI(ApiTester $I): void
    {
        // Act
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPost('/todos', [
            'name' => 'My First Todo',
            'description' => $this->lorem,
        ]);

        // Assert
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"My First Todo"');
    }

    /**
     * @param ApiTester $I
     * @return void
     */
    public function testGetTodoViaAPI(ApiTester $I): void
    {
        // Arrange
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/todos');
        $lastTodoId = $I->grabDataFromResponseByJsonPath("$['hydra:member'][:1].id")[0];

        // Act
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/todos/'.$lastTodoId);

        // Assert
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"My First Todo"');
    }

    /**
     * @param ApiTester $I
     * @return void
     */
    public function testDeleteTodoViaAPI(ApiTester $I): void
    {
        // Arrange
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/todos');
        $lastTodoId = $I->grabDataFromResponseByJsonPath("$['hydra:member'][:1].id")[0];

        // Act
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendDelete('/todos/'.$lastTodoId);

        // Assert
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('"name":"My First Todo"');
    }
}
