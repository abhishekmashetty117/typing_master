create database typinghands;
/*ip_address
$_SERVER['SERVER_PROTOCOL'];
$_SERVER['REQUEST_METHOD'];
$_SERVER['REQUEST_TIME'];
$_SERVER['HTTP_HOST'];
$_SERVER['REMOTE_PORT'];
$_SERVER['SCRIPT_FILENAME'];
$_SERVER['HTTP_ACCEPT'];
*/
create table user_request(
	transaction_id int not null auto_increment ,
	user_id int not null,
	ip_address varchar(20),
	server_protocol varchar(128),
	request_method varchar(128),
	request_time varchar(128),
	http_host varchar(128),
	remote_port varchar(128),
	script_filename varchar(128),
	http_accept varchar(256),
	primary key(transaction_id)
);

create table user_data(
	transaction_data_id int not null auto_increment, 
	user_data_id int ,
	key_strokes int DEFAULT 0,
	matched_strokes int DEFAULT 0,
	accuracy int DEFAULT 0,
	word_count int DEFAULT 0,
	timer int DEFAULT 0,
	ranking int DEFAULT 0,
  	primary key(transaction_data_id)	
);

create table ipstack_detail(
	IP_id int not null auto_increment,
	ip varchar(128),
	type_ip varchar(128),
	continent_code varchar(128),
	continent_name varchar(128),
	country_code varchar(128),
	country_name varchar(128),
	region_code varchar(128),
	region_name varchar(128),
	city varchar(128),
	zip varchar(128),
	latitude varchar(128),
	longitude varchar(128),
	location_geoname_id varchar(128),
	location_capital varchar(128),
	location_languages_code varchar(128),
	location_languages_name varchar(128),
	location_languages_native varchar(128),
	location_country_flag varchar(128),
	location_country_flag_emoji varchar(128),
	location_country_flag_emoji_unicode varchar(128),
	location_calling_code varchar(128),
	location_is_eu varchar(128),
	primary key(IP_id)
);

create table email_id(
	users_mail_transaction int not null auto_increment, 
	mail_id varchar(128) ,
	timer int DEFAULT 0,
  	primary key(users_mail_transaction)	
);