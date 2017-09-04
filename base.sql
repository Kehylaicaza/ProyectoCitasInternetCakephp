create DATABASE InPlanet2;
use InPlanet2;

create table Departments(id int primary key auto_increment, name varchar(30), salary double);
create table Cities(id int primary key auto_increment, name varchar(30), province varchar(30));
create table typeOfEmployees(id int primary key auto_increment, description varchar(30) not null);
create table Roles(id int primary key auto_increment, role varchar(30) not null);


CREATE TABLE Users(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255),
    password varchar(255),
    name varchar(30),
    last_name varchar(30),
    role_id int NOT NULL,
    ci varchar(30), city_id int not null,
    address varchar(50), 
     email varchar(30),
    FOREIGN KEY (city_id) REFERENCES Cities(id),
       PRIMARY KEY (id));
       
       ALTER TABLE Users
ADD CONSTRAINT fk_roles_Users
FOREIGN KEY (role_id) REFERENCES Roles(id);


create table Clients(id int primary key auto_increment, client_status varchar(30) not null, user_id int not null ,
        FOREIGN KEY (user_id) REFERENCES Users(id));

CREATE TABLE Employees(
    id int NOT NULL AUTO_INCREMENT,
    date_recruiting date NOT NULL,
    department_id int not null,
    user_id int not null,
    type_employee_id int not null,
        FOREIGN KEY (type_employee_id) REFERENCES typeOfEmployees(id),
            FOREIGN KEY (user_id) REFERENCES Users(id),
       PRIMARY KEY (id)
);

create table Plans(id int primary key auto_increment, price double, rank int);
create table Modems(id int primary key auto_increment, model varchar(30), serial varchar(30));

create table Instalations(id int primary key auto_increment, date_instalation date, date_time time, client_id int not null, employee_id int not null, modem_id int not null);


ALTER TABLE Instalations
 ADD CONSTRAINT fk_employee_instalation
FOREIGN KEY (employee_id) REFERENCES Employees(id);
ALTER TABLE Instalations
ADD CONSTRAINT fk_modem_instalation
FOREIGN KEY (modem_id) REFERENCES Modems(id);
ALTER TABLE Instalations
ADD CONSTRAINT fk_client_instalation
FOREIGN KEY (client_id) REFERENCES Clients(id);


create table Internet_Services(id int primary key auto_increment, active_date date, date_expiry date, internet_status varchar(10) , client_id int not null, modem_id int not null, plan_id int not null);

ALTER TABLE Internet_Services
ADD CONSTRAINT fk_Internet_Services_Client
FOREIGN KEY (client_id) REFERENCES Clients(id);

ALTER TABLE Internet_Services
ADD CONSTRAINT fk_Internet_Services_Plans
FOREIGN KEY (plan_id) REFERENCES Plans(id);

ALTER TABLE Internet_Services
ADD CONSTRAINT fk_Internet_Services_Modem
FOREIGN KEY (modem_id) REFERENCES Modems(id);

create table Payements(id int primary key auto_increment, plan_id int not null, client_id int not null, dates date, credit_card varchar(30), limit_date date, internet_service_id int not null );
ALTER TABLE Payements 
ADD CONSTRAINT fk_Plan_Payement_
FOREIGN KEY (plan_id) REFERENCES Plans(id);

ALTER TABLE Payements 
ADD CONSTRAINT fk_internet_Payement_
FOREIGN KEY (internet_service_id) REFERENCES Internet_Services (id);

CREATE TABLE Schedules(
    id int NOT NULL AUTO_INCREMENT,
    time_appointments time not null,
    day date not null,
    state varchar(150),
   
       PRIMARY KEY (id)
);

CREATE TABLE Appointments(
    id int NOT NULL AUTO_INCREMENT,
            description varchar(150),
            state varchar(150),
    schedule_id int not null,
    client_id int not null,
    employee_id int not null,
    FOREIGN KEY (client_id) REFERENCES Clients(id),
       PRIMARY KEY (id)
);

ALTER TABLE Appointments
ADD CONSTRAINT fk_schedule_Appointment_
FOREIGN KEY (schedule_id) REFERENCES Schedules(id);

ALTER TABLE Appointments
ADD CONSTRAINT fk_Employee_Appointment_
FOREIGN KEY (employee_id) REFERENCES Employees(id);

INSERT INTO `Cities` ( `name`, `province`) VALUES
('La Troncal','Cañar'),
('Milagro','Guayas'),
('Durán','Guayas');

INSERT INTO Roles (role) VALUES ("administrador");
INSERT INTO Roles (role) VALUES ("empleado");
INSERT INTO Roles (role) VALUES ("cliente");
INSERT INTO Roles (role) VALUES ("empleadoCliente");
INSERT INTO Roles (role) VALUES ("adminCliente");
INSERT INTO Roles (role) VALUES ("empleadoAdmin");
INSERT INTO Roles (role) VALUES ("empleadoAdminCliente");

