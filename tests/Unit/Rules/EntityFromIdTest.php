<?php declare(strict_types = 1);

namespace Tests\OriNextras\ObjectMapper\Unit\Rules;

use OriNextras\ObjectMapper\Rules\EntityFromId;
use OriNextras\ObjectMapper\Rules\EntityFromIdRule;
use Orisai\ObjectMapper\Meta\Compile\RuleCompileMeta;
use Orisai\ObjectMapper\Rules\StringValue;
use Orisai\ObjectMapper\Tester\DefinitionTester;
use PHPUnit\Framework\TestCase;
use Tests\OriNextras\ObjectMapper\Doubles\TestEntity;
use function get_class;

final class EntityFromIdTest extends TestCase
{

	public function test(): void
	{
		$idDefinition = new StringValue();
		$definition = new EntityFromId(
			'name',
			TestEntity::class,
			$idDefinition,
		);

		self::assertSame(EntityFromIdRule::class, $definition->getType());
		self::assertEquals(
			[
				'name' => 'name',
				'entity' => TestEntity::class,
				'idRule' => new RuleCompileMeta($idDefinition->getType(), $idDefinition->getArgs()),
			],
			$definition->getArgs(),
		);

		DefinitionTester::assertIsRuleAnnotation(get_class($definition));
	}

}
