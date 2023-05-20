<?php declare(strict_types = 1);

namespace Tests\OriNextras\ObjectMapper\Unit\Rules;

use OriNextras\ObjectMapper\Rules\EntityFromIdArgs;
use Orisai\ObjectMapper\Args\EmptyArgs;
use Orisai\ObjectMapper\Meta\Runtime\RuleRuntimeMeta;
use Orisai\ObjectMapper\Rules\MixedRule;
use PHPUnit\Framework\TestCase;
use Tests\OriNextras\ObjectMapper\Doubles\TestEntity;
use function serialize;
use function unserialize;

final class EntityFromIdArgsTest extends TestCase
{

	public function test(): void
	{
		$idRule = new RuleRuntimeMeta(MixedRule::class, new EmptyArgs());
		$args = new EntityFromIdArgs('name', TestEntity::class, $idRule);

		self::assertSame('name', $args->name);
		self::assertSame(TestEntity::class, $args->entity);
		self::assertSame($idRule, $args->idRule);

		self::assertEquals(
			unserialize(serialize($args)),
			$args,
		);
	}

}
