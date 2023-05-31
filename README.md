# AssocArray

`AssocArray` is a class that represents an associative array with string keys.

## Installation

You can install the `AssocArray` class via composer:

```
composer require bmt/assoc-array
```

## Usage

To use the `AssocArray` class, you can follow these steps:

1. Create an instance of `AssocArray` by passing an associative array with string keys:

```php
$data = ['id' => 5656, 'name' => 'jhon'];
$array = new AssocArray($data);
```

2. Access values in the associative array using array access syntax:

```php
$id = $array['id'];
$name = $array['name'];
```

3. Check if a specific offset exists:

```php
if (isset($array['id'])) {
    // Offset exists
} else {
    // Offset does not exist
}
```

## Exceptions

The `AssocArray` class throws the following exceptions:

- `InvalidArgumentException` if the array structure is invalid.
- `RuntimeException` if you try to set or unset a value (read-only).

## License

This project is licensed under the [MIT License](LICENSE).