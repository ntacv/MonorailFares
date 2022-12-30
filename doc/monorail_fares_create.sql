-- Table: discounts
CREATE TABLE discounts (
    discount_id int NOT NULL AUTO_INCREMENT,
    value int NOT NULL,
    type varchar(30) NOT NULL,
    icon varchar(30) NOT NULL,
    PRIMARY KEY (discount_id)
);
-- Table: stations
CREATE TABLE stations (
    station_id int NOT NULL AUTO_INCREMENT,
    station varchar(30) NOT NULL,
    PRIMARY KEY (station_id)
);
-- Table: users
CREATE TABLE users (
    user_id int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    PRIMARY KEY (user_id)
);


-- Table: orders
CREATE TABLE orders (
    order_id int NOT NULL AUTO_INCREMENT,
    discount_id int NOT NULL,
    user_id int NOT NULL,
    date timestamp NOT NULL,
    station_from int NOT NULL,
    station_to int NOT NULL,
    price float NOT NULL,
    number int NOT NULL,
    way int NOT NULL,
    PRIMARY KEY (order_id),
    CONSTRAINT discount_id FOREIGN KEY (discount_id) REFERENCES discounts(discount_id),
    CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT station_from FOREIGN KEY (station_from) REFERENCES stations(station_id),
    CONSTRAINT station_to FOREIGN KEY (station_to) REFERENCES stations(station_id)
);


INSERT INTO discounts (value, type, icon) VALUES (1, 'Adult', 'groups');
INSERT INTO discounts (value, type, icon) VALUES (0.25, 'Senior', 'elderly');
INSERT INTO discounts (value, type, icon) VALUES (0.40, 'Disabled', 'accessible');
INSERT INTO discounts (value, type, icon) VALUES (0.30, 'Students', 'school');

INSERT INTO stations (station_id, station) VALUES (0, 'KL Sentral');
INSERT INTO stations (station_id, station) VALUES (1, 'Tun Sambanthan');
INSERT INTO stations (station_id, station) VALUES (2, 'Maharajalela');
INSERT INTO stations (station_id, station) VALUES (3, 'Hang Tuah');
INSERT INTO stations (station_id, station) VALUES (4, 'Imbi');
INSERT INTO stations (station_id, station) VALUES (5, 'Bukit Bintang');
INSERT INTO stations (station_id, station) VALUES (6, 'Raja Chulan');
INSERT INTO stations (station_id, station) VALUES (7, 'Bukit Nanas');
INSERT INTO stations (station_id, station) VALUES (8, 'Medan Tuanku');
INSERT INTO stations (station_id, station) VALUES (9, 'Chow Kit');
INSERT INTO stations (station_id, station) VALUES (10, 'Titiwangsa');
