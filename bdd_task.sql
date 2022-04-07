create database task;
use task;
CREATE TABLE cat(
  id_cat int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name_cat varchar(50)  
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE utilisateur (
  id_user int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name_user varchar(50) NOT NULL,
  first_name_user varchar(50) NOT NULL,
  login_user varchar(50) NOT NULL,
  mdp_user varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE task (
  id_task int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name_task varchar(50),
  content_task text,
  date_task date,
  validate_task tinyint(1),
  id_user int,
  id_cat int
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table task
add constraint fk_cat 
FOREIGN KEY (id_cat)
REFERENCES cat (id_cat);

alter table task
add constraint fk_utilsateur 
FOREIGN KEY (id_user)
REFERENCES utilisateur (id_user);

