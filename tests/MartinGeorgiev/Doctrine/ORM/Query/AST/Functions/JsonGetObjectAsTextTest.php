<?php

declare(strict_types=1);

namespace MartinGeorgiev\Tests\Doctrine\ORM\Query\AST\Functions;

use MartinGeorgiev\Doctrine\ORM\Query\AST\Functions\JsonGetObjectAsText;
use MartinGeorgiev\Tests\Doctrine\Fixtures\Entity\ContainsJsons;

class JsonGetObjectAsTextTest extends TestCase
{
    protected function getStringFunctions(): array
    {
        return [
            'JSON_GET_OBJECT_AS_TEXT' => JsonGetObjectAsText::class,
        ];
    }

    protected function getExpectedSqlStatements(): array
    {
        return [
            "SELECT (c0_.object1 #>> '{residency,country}') AS sclr_0 FROM ContainsJsons c0_",
        ];
    }

    protected function getDqlStatements(): array
    {
        return [
            \sprintf("SELECT JSON_GET_OBJECT_AS_TEXT(e.object1, '{residency,country}') FROM %s e", ContainsJsons::class),
        ];
    }
}
