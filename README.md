<h1 align="center">
	<img src="https://github.com/orisai/.github/blob/main/images/repo_title.png?raw=true" alt="Orisai"/>
	<br/>
	Nextras Object Mapper
</h1>

<p align="center">
	<a href="https://github.com/orisai/object-mapper">orisai/object-mapper</a> extension for <a href="https://github.com/nextras/orm">nextras/orm</a>
</p>

<p align="center">
	📄 Check out our <a href="docs/README.md">documentation</a>.
</p>

<p align="center">
	💸 If you like Orisai, please <a href="https://orisai.dev/sponsor">make a donation</a>. Thank you!
</p>

<p align="center">
	<a href="https://github.com/orisai/nextras-object-mapper/actions?query=workflow%3ACI">
		<img src="https://github.com/orisai/nextras-object-mapper/workflows/CI/badge.svg">
	</a>
	<a href="https://coveralls.io/r/orisai/nextras-object-mapper">
		<img src="https://badgen.net/coveralls/c/github/orisai/nextras-object-mapper/v1.x?cache=300">
	</a>
	<a href="https://dashboard.stryker-mutator.io/reports/github.com/orisai/nextras-object-mapper/v1.x">
		<img src="https://badge.stryker-mutator.io/github.com/orisai/nextras-object-mapper/v1.x">
	</a>
	<a href="https://packagist.org/packages/orisai/nextras-object-mapper">
		<img src="https://badgen.net/packagist/dt/orisai/nextras-object-mapper?cache=3600">
	</a>
	<a href="https://packagist.org/packages/orisai/nextras-object-mapper">
		<img src="https://badgen.net/packagist/v/orisai/nextras-object-mapper?cache=3600">
	</a>
	<a href="https://choosealicense.com/licenses/mpl-2.0/">
		<img src="https://badgen.net/badge/license/MPL-2.0/blue?cache=3600">
	</a>
<p>

##

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
