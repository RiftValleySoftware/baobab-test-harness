DROP TABLE IF EXISTS co_security_nodes;
DROP SEQUENCE IF EXISTS element_id_seq;
CREATE SEQUENCE element_id_seq;
CREATE TABLE co_security_nodes (
  id BIGINT NOT NULL DEFAULT nextval('element_id_seq'),
  api_key VARCHAR(255) DEFAULT NULL,
  login_id VARCHAR(255) UNIQUE DEFAULT NULL,
  access_class VARCHAR(255) NOT NULL,
  last_access TIMESTAMP NOT NULL,
  read_security_id BIGINT DEFAULT NULL,
  write_security_id BIGINT DEFAULT NULL,
  object_name VARCHAR(255) DEFAULT NULL,
  access_class_context VARCHAR(4095) DEFAULT NULL,
  ids VARCHAR(4095) DEFAULT NULL
);

INSERT INTO co_security_nodes (api_key, login_id, access_class, last_access, read_security_id, write_security_id, object_name, access_class_context, ids) VALUES
(NULL, NULL, 'CO_Security_Node', '1970-01-01 00:00:00', -1, -1, NULL, NULL, NULL),
(NULL, 'admin', 'CO_Security_Login', '1970-01-01 00:00:00', 2, 2, 'God Admin Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:4:\"JUNK\";}', NULL),
(NULL, NULL, 'CO_Security_Node', '1970-01-01 00:00:00', -1, -1, NULL, NULL, NULL),
(NULL, NULL, 'CO_Security_Node', '1970-01-01 00:00:00', -1, -1, NULL, NULL, NULL),
(NULL, NULL, 'CO_Security_Node', '1970-01-01 00:00:00', -1, -1, NULL, NULL, NULL),
(NULL, NULL, 'CO_Security_Node', '1970-01-01 00:00:00', -1, -1, NULL, NULL, NULL),
(NULL, 'MDAdmin', 'CO_Security_Login', '1970-01-01 00:00:00', 7, 7, 'Maryland Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'VAAdmin', 'CO_Security_Login', '1970-01-01 00:00:00', 8, 8, 'Virginia Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'DCAdmin', 'CO_Security_Login', '1970-01-01 00:00:00', 9, 9, 'Washington DC Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'WVAdmin', 'CO_Security_Login', '1970-01-01 00:00:00', 10, 10, 'West Virginia Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'DEAdmin', 'CO_Security_Login', '1970-01-01 00:00:00', 11, 11, 'Delaware Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'MainAdmin', 'CO_Login_Manager', '1970-01-01 00:00:00', 12, 12, 'Main Admin Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', '7,8,9,10,11'),
(NULL, 'Dilbert', 'CO_Cobra_Login', '1970-01-01 00:00:00', 13, 13, 'Dilbert Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'Wally', 'CO_Cobra_Login', '1970-01-01 00:00:00', 14, 14, 'Wally Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'Ted', 'CO_Cobra_Login', '1970-01-01 00:00:00', 15, 15, 'Ted Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'Alice', 'CO_Cobra_Login', '1970-01-01 00:00:00', 16, 16, 'Alice Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'Tina', 'CO_Cobra_Login', '1970-01-01 00:00:00', 17, 17, 'Tina Login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', ''),
(NULL, 'PHB', 'CO_Login_Manager', '1970-01-01 00:00:00', 18, 18, 'Pointy-Haired Boss login', 'a:2:{s:4:"lang";s:2:"en";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', '13,14,15,16,17'),
(NULL, 'MeLeet', 'CO_Security_Login', '1970-01-01 00:00:00', 19, 19, 'Elbonian Hacker', 'a:2:{s:4:"lang";s:2:"eb";s:15:\"hashed_password\";s:13:\"CodYOzPtwxb4A\";}', '2');
