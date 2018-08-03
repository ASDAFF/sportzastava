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
