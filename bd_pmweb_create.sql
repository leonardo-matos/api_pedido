CREATE TABLE oauth_clients (
 client_id  VARCHAR(80) NOT NULL,
 client_secret  VARCHAR(80) NOT NULL,
 client_name varchar(100) not null,
 client_image blob,
 redirect_uri VARCHAR(2000),
 grant_types  VARCHAR(80),
 scope VARCHAR(4000),
 user_id  VARCHAR(80),
 PRIMARY KEY (client_id)
);

CREATE TABLE oauth_access_tokens(
 access_token VARCHAR(40)  NOT NULL,
 client_id VARCHAR(80)  NOT NULL,
 user_id VARCHAR(80),
 expires TIMESTAMP  NOT NULL,
 scope VARCHAR(4000),
 PRIMARY KEY (access_token)
);
 
CREATE TABLE oauth_scopes(
 scope VARCHAR(80) NOT NULL,
 is_default BOOLEAN,
 PRIMARY KEY (scope)
);
 
CREATE TABLE pedido(
	order_id INTEGER NOT NULL,
	order_date TIMESTAMP,
	product_sku VARCHAR(12) NOT NULL,
	size VARCHAR(2) NOT NULL,
	color VARCHAR(50),
	quantity TINYINT NOT NULL,
	price FLOAT NOT NULL
);
 
INSERT INTO oauth_clients (client_id,client_secret,client_name,client_image,redirect_uri,grant_types,scope,user_id) VALUES('201604191641app.pmweb.com.br','QXTVPOW1WCRDPEBZ620W','pmweb','','http://callbackurl.com','client_credentials','','');
 
SELECT * FROM oauth_clients;

SELECT * FROM oauth_access_tokens;

SELECT * FROM oauth_scopes;

SELECT * FROM pedido;