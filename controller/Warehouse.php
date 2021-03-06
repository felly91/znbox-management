<?php 

namespace controller;

use connections\Database;
use controller\QueryBuilder;

class Warehouse {

	public static function add($data) {
		$conn = Database::conn();
		$sql = QueryBuilder::insert("warehouse", $data);
		$stmt = $conn->prepare($sql);
		return ($stmt->execute() ? $stmt : null);
	}

	public static function getBy($column, $value) {
		$conn = Database::conn();
		$value = $conn->quote($value);
		$sql = "SELECT * FROM warehouse WHERE warehouse.$column = $value;";
		$stmt = $conn->query($sql);
		$fetch = $stmt->fetch();
		return $fetch;
	}
	public static function getAll() {
		$conn = Database::conn();
		$sql = "SELECT * FROM warehouse WHERE warehouse.id != 0 AND warehouse.isDeleted = 0;";
		$stmt = $conn->prepare($sql);
		return ($stmt->execute() ? $stmt : null);
	}

	public static function update($id, $data) {
		$conn = Database::conn();
		$sql = QueryBuilder::update("warehouse", "id", $id, $data);
		$stmt = $conn->prepare($sql);
		return ($stmt->execute() ? $stmt : null);
	}
}