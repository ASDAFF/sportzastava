create table if not exists b_prime_gifts
(
	ID int(18) not null auto_increment,
	SID text,
	NAME varchar(255),
	ACTIVE char(1) not null DEFAULT 'Y',
	IMAGE_ID int(18),
	PRICE_FROM int(18),
	PRICE_TO int(18),
	primary key (ID)
);

create table if not exists b_prime_gifts_settings
(
	ID int(18) not null auto_increment,
	NAME varchar(255),
	VALUE varchar(255),
	primary key (ID)
);

INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('IMAGE_ID', NULL);
INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('DESCRIPTION', NULL);
INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('DESCRIPTION_ONE', NULL);
INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('GIFT_TEXT', NULL);
INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('GIFT_TEXT_MORE', NULL);
INSERT INTO b_prime_gifts_settings (NAME, VALUE) VALUES ('GIFT_TEXT_MORE_FROM', NULL);
