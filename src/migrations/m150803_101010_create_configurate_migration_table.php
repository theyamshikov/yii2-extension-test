<?php

use yii2lab\app\domain\helpers\Env;
use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_email_receipt_table
 * 
 * @package 
 */
class m150803_101010_create_configurate_migration_table extends Migration {

	public function getColumns()
	{
		return [];
	}

	public function afterCreate()
	{
		$schema = Env::get('servers.db.test.defaultSchema');
		$this->execute(
			'CREATE OR REPLACE FUNCTION create_language_plpgsql()
				RETURNS BOOLEAN AS $$
				    CREATE LANGUAGE plpgsql;
				    SELECT TRUE;
				$$ LANGUAGE SQL;');

		$this->execute("
				SELECT CASE WHEN NOT
				    (
				        SELECT  TRUE AS exists
				        FROM    pg_language
				        WHERE   lanname = 'plpgsql'
				        UNION
				        SELECT  FALSE AS exists
				        ORDER BY exists DESC
				        LIMIT 1
				    )
				THEN
				    create_language_plpgsql()
				ELSE
				    FALSE
				END AS plpgsql_created;");
		$this->execute("
				DROP FUNCTION create_language_plpgsql(); ");


		$this->execute("
		CREATE OR REPLACE FUNCTION $schema.get_sequence_name
			  (p_table_name   varchar,
			   OUT p_seq_name varchar)
			  RETURNS varchar AS
			$$
			DECLARE
			BEGIN
			  SELECT DISTINCT s.sequence_name
			  INTO p_seq_name
			  FROM information_schema.sequences s
			  JOIN pg_class c ON c.relname = s.sequence_name
			  JOIN pg_depend AS d ON c.oid = d.objid
			  join pg_class tab ON d.refobjid = tab.oid
			  WHERE tab.relname = p_table_name AND d.deptype = 'a';
			  RETURN;
			END;
			$$
			LANGUAGE plpgsql SECURITY DEFINER;");
	}

}