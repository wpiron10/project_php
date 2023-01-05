<?php

// classe generique Table
class Table
{
	public $primary_key_field_name;
	public $table_name;
	public $fields_names;
	public function __construct(string $table_name,
								string $primary_key_field_name,
								array $fields_names)
	{
		$this->table_name = $table_name;
		$this->primary_key_field_name = $primary_key_field_name;
		$this->fields_names = $fields_names;
	}

	public function save() 
	{
		$query = '';

		// si $this->pk est set alors on génère une requête UPDATE
		if (isset($this->{$this->primary_key_field_name}))
		{
			$query .= 'UPDATE '.$this->table_name.' SET ';

			$first = true;
			foreach ($this->fields_names as $field)
			{
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= $field.' = \''.$this->{$field}.'\'';
			}
			$query .= ' WHERE id_film = '.$this->{$this->primary_key_field_name};
			echo $query.'<br>';
			$res = my_query($query);
		}
		else // sinon on génère une requête INSERT et on récupère l'id auto-incrémenté
		{
			$query .= 	"INSERT INTO $this->table_name (";
			$first = true;
			foreach ($this->fields_names as $field)
			{
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= $field;
			}
			$query .= ") VALUES (";
			$first = true;
			foreach ($this->fields_names as $field)
			{
				if ($first)
					$first = false;
				else
					$query .= ', ';
				$query .= '\''.$this->{$field}.'\'';
			}

			$query .= ")";
						
			echo $query.'<br>';
			$res = my_query($query);
			$pk_val = my_insert_id();
			$this->{$this->primary_key_field_name} = $pk_val;
		}
	}

	// renvoie un tableau d'objets avec une instance hydratée pour chaque ligne de la table
	public static function getAll()
	{
		$class_name = static::class;
		$instance_base = new $class_name;
		$objects = [];
		$query = 'select * from '.$instance_base->table_name;

		$lines = my_fetch_array($query);
		foreach ($lines as $line)
		{
			$instance = new $class_name;
			foreach ($instance->fields_names as $field)
				$instance->$field = $line[$field];
			$instance->id = $line[0];
			$objects[] = $instance;
		}
	

		return $objects;
	}

	public static function getAllByRestrict(string $column, $value)
	{
		$class_name = static::class;
		$instance_base = new $class_name;
		$objects = [];
		if (isset($value) && isset($column)){
			if (is_int($value))
			{
				$query = 'select * from '.$instance_base->table_name.' where '.$column.' = '.$value;
			}
			else
			{
				$query = 'select * from '.$instance_base->table_name.' where '.$column.' = \''.$value.'\'';
			}
		} else {
			$query = 'select * from '.$instance_base->table_name;
		}
	
		$lines = my_fetch_array($query);
		foreach ($lines as $line)
		{
			$instance = new $class_name;
			foreach ($instance->fields_names as $field)
				$instance->$field = $line[$field];

			$instance->id = $line[0];
			$objects[] = $instance;
		}

		return $objects;
	}

	// renvoie une instance hydratée pour la ligne de la table correspondant à la PK fournie en paramètre
	public static function getOne(int $pk_value)
	{
		$class_name = static::class;
		$instance = new $class_name;
		$instance->{$instance->primary_key_field_name} = $pk_value;
		$instance->hydrate();

		return $instance;
	}
	// récupère dans l'instance courante toutes les valeurs correspondantes à la ligne
	// dont la valeur de la pk est deja présente dans l'instance dans
	// l'attribut $this->{$this->primary_key_field_name}
	public function hydrate()
	{
		$query = 'select * from '.$this->table_name.' where '.$this->primary_key_field_name.'='.$this->{$this->primary_key_field_name};
		$data = my_fetch_array($query);

		if (!empty($data))
		{
			foreach ($this->fields_names as $field)
			{
				$this->{$field} = $data[0][$field];
			}
		}
	}

	// hydrate level 2
	// ex : pour film, ajouter un attribut genre contenant une instance hydratée de son genre
	// ET ajouter un attribut distributeur contenant une instance hydratée de son genrdistributeur
	// public function hydrate()
	// {
	// 	parent::hydrate();
	// 	$this->genre = new Genre;
	// 	$this->genre->id_genre = $this->id_genre;
	// 	$this->genre->hydrate();
	// }

}