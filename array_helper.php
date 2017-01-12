<?php

	/**
	 * Get value of multidimensional array field by provided path
	 *
	 * Example 1
	 * CArrayHelper::getValueByPath($myArray, 'item/key');
	 *
	 * @param array $array		array
	 * @param string $path		path to field
	 * @param string $delimiter	path delimeter
	 *
	 * @return boolean|string|array		nested array field value
	 */
	public static function getValueByPath(array $array, $path, $delimiter = '/') {
		if (strpos($path, $delimiter) === 0) {
			$path = substr($path, 1);
		}
		$pathArray = explode($delimiter, $path);
		$value = $array;
-
		foreach ($pathArray as $key) {
			if (!is_array($value) || !array_key_exists($key, $value)) {
				return false;
			}
			$value = $value[$key];
		}
		return $value;
	}
-
	/**
	 * Flip multidimensional array by specified field
	 *
	 * @param array $array
	 * @param string $field
	 * @return array
	 */
	public static function flipByField(array $array, $field) {
		$result = [];
-
		foreach ($array as $key => $item) {
			if(array_key_exists($field, $item)) {
				$result[$item[$field]] = $key;
			}
		}
		return $result;
	}
