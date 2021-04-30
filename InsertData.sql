
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO `user_address` ( `state`, `city`, `district_name`, `street_name`, `house_number`, `address_complement`, `created_at`, `updated_at` )
VALUES
	( 'MG', 'Belo Horizonte', 'Centro', 'Rua Teste', '9879', 'Casa', '2021-04-30 02:36:46', NULL );
	
INSERT INTO `user` ( `user_address_id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at` )
VALUES
	( 1, 'Ususario', 'Teste', 'usu.test@aol.com', '2021-04-30 02:36:13', NULL );
	
INSERT INTO `user_contact_phone` ( `phone_id`, `area_code`, `phone_number`, `created_at`, `updated_at` )
VALUES
	( 1, 31, '98585874', '2021-04-30 02:37:43', NULL );

SET FOREIGN_KEY_CHECKS = 1;