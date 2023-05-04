# Nextras Object Mapper

Object mapper rules for [nextras/orm](https://github.com/nextras/orm)

## Content

- [Setup](#setup)
- [Rules](#rules)
	- [entity from id rule](#entity-from-id-rule)

## Setup

Install with [Composer](https://getcomposer.org)

```sh
composer require orisai/nextras-object-mapper
```

## Rules

### entity from id rule

Map id of an entity to the entity

- Register rule into rule manager (may differ for pure [object mapper](https://github.com/orisai/object-mapper) and its
  integrations - e.g. [for Nette](https://github.com/orisai/nette-object-mapper))
- Both doctrine/annotations and PHP attributes syntax can be used
- Usage in array and list rules results into single query (no n+1 problem)

```php
use App\User\DB\User;
use OriNextras\ObjectMapper\Rules\EntityFromId;
use Orisai\ObjectMapper\Attributes\Expect\IntValue;
use Orisai\ObjectMapper\Attributes\Modifiers\FieldName;
use Orisai\ObjectMapper\MappedObject;

final class EntityFetchingInput implements MappedObject
{

	/**
	 * @FieldName("userId")
	 * @EntityFromId(
	 *     name="userId"
	 *     entity=User::class
	 *     idRule=@IntValue(unsigned=true, castNumericString=true)
	 * )
	 */
	public User $user;

}
```

```php
$data = [
	'userId' => 666,
];
$input = $processor->process($data, EntityFetchingInput::class);
// $input == EntityFetchingInput(user: User(id: 666, /* ... */))
```

Parameters:

- `name`
	- name used in errors in case id validation succeeded but id was not found in database
	- required
	- e.g. `userId`
- `entity`
	- nextras/orm entity class to which id is mapped
	- required
	- e.g. `User::class`
- `idRule`
	- rule used to validate id before being queried in database
		- when database expects number, impossible ids like `'string'` would fail in a way we can't handle
		- also it saves queries which can't return any result
	- required
