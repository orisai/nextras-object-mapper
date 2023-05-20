<?php declare(strict_types = 1);

namespace OriNextras\ObjectMapper\Rules;

use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;
use Doctrine\Common\Annotations\Annotation\Target;
use Nextras\Orm\Entity\IEntity;
use Orisai\ObjectMapper\Meta\Compile\RuleCompileMeta;
use Orisai\ObjectMapper\Rules\RuleDefinition;

/**
 * @Annotation
 * @NamedArgumentConstructor()
 * @Target({"PROPERTY", "ANNOTATION"})
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class EntityFromId implements RuleDefinition
{

	private string $name;

	/** @var class-string<IEntity> */
	private string $entity;

	private RuleCompileMeta $idRule;

	/**
	 * @param class-string<IEntity> $entity
	 */
	public function __construct(string $name, string $entity, RuleDefinition $idRule)
	{
		$this->name = $name;
		$this->entity = $entity;
		$this->idRule = new RuleCompileMeta($idRule->getType(), $idRule->getArgs());
	}

	public function getType(): string
	{
		return EntityFromIdRule::class;
	}

	public function getArgs(): array
	{
		return [
			'name' => $this->name,
			'entity' => $this->entity,
			'idRule' => $this->idRule,
		];
	}

}
