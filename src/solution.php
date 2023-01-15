<?php

/*
|--------------------------------------------------------------------------
| Problem 1
|--------------------------------------------------------------------------
|
| Implement a groupByOwners function that:
| Accepts an associative array containing the file owner name for each file name.
| Returns an associative array containing an array of file names for each owner name, in any order.
| For example:
| for associative array ["Input.txt" => "Randy", "Code.py" => "Stan", "Output.txt" => "Randy"]
| the groupByOwners function should return ["Randy" => ["Input.txt", "Output.txt"], "Stan" => ["Code.py"]].
*/

/**
 * @param array<string, string> $data
 * @return array<string, array<string>>
 */
function groupByOwners(array $data): array
{
    $result = [];

    foreach ($data as $fileName => $owner) {
        // Let just assume that all data type other than string will not be included in the result
        if (!is_string($fileName) || !is_string($owner)) {
            continue;
        }

        if (!array_key_exists($owner, $result)) {
            $result[$owner] = [$fileName];
            continue;
        }

        $result[$owner][] = $fileName;
    }

    return $result;
}


/*
|--------------------------------------------------------------------------
| Problem 2
|--------------------------------------------------------------------------
|
| Implement the unique_names function.
| When passed two arrays of names, it will return an array containing the names that appear in either or both arrays.
| The returned array should have no duplicates.
|
| For example, calling unique_names(['Ava', 'Emma', 'Olivia'], ['Olivia', 'Sophia', 'Emma'])
| should return ['Emma', 'Olivia', 'Ava', 'Sophia'] in any order.
*/
/**
 * @param array<string> $firstArray
 * @param array<string> $secondArray
 * @return array<string>
 */
function unique_names(array $firstArray, array $secondArray): array
{
    // In case either of these array is empty
    if (empty($firstArray) || empty($secondArray)) {
        return array_merge($firstArray, $secondArray);
    }

    // Using an associate array to cache the names,
    // then loop through each array
    $cache = $result = [];
    foreach ($firstArray as $name) {
        if (array_key_exists($name, $cache)) {
            continue;
        }

        $result[] = $name;
        $cache[$name] = 1;
    }

    foreach ($secondArray as $name) {
        if (array_key_exists($name, $cache)) {
            continue;
        }

        $result[] = $name;
        $cache[$name] = 1;
    }

    return $result;
}
