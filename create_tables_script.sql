CREATE TABLE IF NOT EXISTS employee (
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                login VARCHAR(25) NOT NULL,
                password VARCHAR(30) NOT NULL,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(30) NOT NULL,
                birthdate DATE NOT NULL,
                contract_from_date DATE NOT NULL,
                contract_to_date DATE NOT NULL,
                address VARCHAR(50) NOT NULL,
                phone VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS address (
                id_address INT PRIMARY KEY,
                street VARCHAR (100),
                city VARCHAR (100),
                postcode INT,
                country VARCHAR (100)
);

CREATE TABLE IF NOT EXISTS room (
                id_room INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR (30),
                sum_table INT,
                sum_seats INT NOT NULL CHECK (sum_seats > 0)
);

CREATE TABLE IF NOT EXISTS menu (
                id_food INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR (100),
                price INT NOT NULL CHECK (price>0),
                ingredience VARCHAR (100),
                quantity INT
);

CREATE TABLE IF NOT EXISTS din_table (
                id_table INT AUTO_INCREMENT PRIMARY KEY,
                id_room INT,
                sum_seats INT NOT NULL CHECK (sum_seats > 0),
                FOREIGN KEY fk_room(id_room)
                REFERENCES room(id_room)
);

CREATE TABLE IF NOT EXISTS quantity (
                id_quantity INT AUTO_INCREMENT PRIMARY KEY,
                id_food INT,
                count_ks INT,
                FOREIGN KEY fk_food (id_food) REFERENCES menu (id_food)
);

CREATE TABLE IF NOT EXISTS tables_available (
				        avail_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  				      table_num varchar(50) NOT NULL,
                avail int(1) NOT NULL,
                FOREIGN KEY fk_table(avail_id) REFERENCES din_table (id_table)
);

CREATE TABLE IF NOT EXISTS tab_order (
                id_order INT AUTO_INCREMENT PRIMARY KEY,
                id_table INT,
                id_count_ks INT,
                date_pay DATE NOT NULL,
                id_employee INT,
                pay_method VARCHAR(10),
                sum_price INT NOT NULL CHECK (sum_price > 0),
                CONSTRAINT chk_pay_method CHECK (pay_method IN ('karta', 'hotovost')),
                FOREIGN KEY fk_table(id_table) REFERENCES din_table (id_table),
                FOREIGN KEY fk_quantity (id_count_ks) REFERENCES quantity (id_quantity),
                FOREIGN KEY fk_employee (id_employee) REFERENCES employee (id)
);

CREATE TABLE IF NOT EXISTS rooms_available (
				        avail_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  				      room_num varchar(50) NOT NULL,
                avail int(1) NOT NULL,
                FOREIGN KEY fk_room(avail_id) REFERENCES room (id_room)
);

CREATE TABLE IF NOT EXISTS rooms_reserve (
                id_reserve INT AUTO_INCREMENT PRIMARY KEY,
                id_room INT,
                date_reserve DATE NOT NULL,
                id_employee INT,
                FOREIGN KEY fk_room(id_room) REFERENCES room (id_room),
                FOREIGN KEY fk_employee (id_employee) REFERENCES employee (id)
);

CREATE TABLE IF NOT EXISTS din_tables_reserve (
                id_reserve INT AUTO_INCREMENT PRIMARY KEY,
                id_din_table INT,
                date_reserve DATE NOT NULL,
                id_employee INT,
                FOREIGN KEY fk_din_table(id_din_table) REFERENCES din_table (id_table),
                FOREIGN KEY fk_employee (id_employee) REFERENCES employee (id)
);