<?php declare(strict_types = 1);

namespace OriNextras\ObjectMapper\EntityFromId;

use Nextras\Orm\Entity\IEntity;
use Orisai\ObjectMapper\Args\Args;
use Orisai\ObjectMapper\Meta\Runtime\RuleRuntimeMeta;

final class EntityFromIdArgs implements Args
{

	public string $name;

	/** @var class-string<IEntity> */
	public string $entity;

	/** @var RuleRuntimeMeta<Args> */
	public RuleRuntimeMeta $idRule;

	/**
	 * @param class-string<IEntity> $entity
	 * @param RuleRuntimeMeta<Args> $idRule
	 */
	public function __construct(string $name, string $entity, RuleRuntimeMeta $idRule)
	{
		$this->name = $name;
		$this->entity = $entity;
		$this->idRule = $idRule;
	}

}
