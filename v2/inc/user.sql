SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

create table user_details (
  u_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
  u_email varchar(255) not null,
  u_unique_id varchar(255) not null UNIQUE KEY,
  u_name varchar(255) not null,
  u_photo_id varchar(255) not null UNIQUE KEY
);

