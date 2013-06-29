<?php
/*
 * Copyright notice
 *
 * (c) 2012/2013 Christian Herberger <webmaster@kabarakh.de>
 *
 * All rights reserved
 *
 * This script is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 */

return <<<'CONF'

config.tx_ptpiwik {

	// databaseFields are something dependend on the fe_user-uid. this is added automatically
	# databaseFields {

		// you can define as many fields as you want, named as you want
		// fields are added to TSFE->fe_user['user']
		# field_name {

			// table defines from which table the string should be taken
			# table = tx_ptpiwik_demo

			// field defines which field to use from the table
			# field = department

			// relations define how to get from the fe_users-table to the table used
			// you can define any number of relations - keep performance in mind!
			// you must have fe_users as a table somewhere!
			// for fe_users-fields, no relation is needed

			# relations {

				// the name is not used anywhere, use something you can identify the relation with
				// if you want to use numbers (10, 20, 30... typoscript style)
				# fe_user-department {

					// the order of foreign and local doesn't matter
					// foreign_table/field and local_table/field are combined with a where clause
					# foreign_table = fe_users

					# foreign_field = uid

					# local_table = tx_ptpiwik_demo

					# local_field = user

				# }

			# }

		# }

	# }

	// cookieFields are field names from tsfe, put into cookies. they are called by using TSFE->fe_user['user']['field_name']
	# cookieFields (

		# 'field_name',
		# 'second_field',

	# )

}

CONF;

?>