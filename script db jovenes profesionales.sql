CREATE SCHEMA IF NOT EXISTS  `jovenes_profesionales`  ;

CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`domicilio` (
  `id_domicilio` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `pais` VARCHAR(45) NOT NULL,
  `provincia` VARCHAR(45) NOT NULL,
  `ciudad` VARCHAR(45) NOT NULL,
  `calle` VARCHAR(45) NOT NULL,
  `altura` VARCHAR(45) NOT NULL,
  `id_persona` int,
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_domicilio`));

INSERT INTO  `jovenes_profesionales`.`domicilio` (pais,provincia,ciudad,calle,altura,id_persona)
VALUES ("Argentina","Santa Fe","Santa Fe","San Martin",1560,1);
INSERT INTO  `jovenes_profesionales`.`domicilio` (pais,provincia,ciudad,calle,altura,id_persona)
VALUES ("Argentina","Entre Ríos","Paraná","Rosas",1760,2);
INSERT INTO  `jovenes_profesionales`.`domicilio` (pais,provincia,ciudad,calle,altura,id_persona)
VALUES ("Argentina","Salta","Salta","Belgrano Av.",1810,3);


CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`sexo` (
  `id_sexo` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `descripcion` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`id_sexo`));

INSERT INTO `jovenes_profesionales`.`sexo` (`descripcion`)
VALUES ("MASCULINO");
INSERT INTO `jovenes_profesionales`.`sexo` (`descripcion`)
VALUES ("FEMENINO");
INSERT INTO `jovenes_profesionales`.`sexo` (`descripcion`)
VALUES ("NO CONTESTA");

CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`estado_civil` (
  `id_estado_civil` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `descripcion` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`id_estado_civil`));

INSERT INTO `jovenes_profesionales`.`estado_civil` (`descripcion`)
VALUES ("CASADO");
INSERT INTO `jovenes_profesionales`.`estado_civil` (`descripcion`)
VALUES ("SOLTERO");
INSERT INTO `jovenes_profesionales`.`estado_civil` (`descripcion`)
VALUES ("NO CONTESTA");

CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`personas` (
  `id_persona` INT NOT NULL AUTO_INCREMENT UNIQUE,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `id_sexo` INT NOT NULL,
  `id_estado_civil` INT NOT NULL,
  `dni` VARCHAR(45) NOT NULL,
  `telefono_fijo` BIGINT NULL,
  `telefono_celular` BIGINT NULL,
  `id_domicilio` INT,
  `objetivo_laboral` VARCHAR(2000),
	CONSTRAINT `id_sexo` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `id_estado_civil` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `id_domicilio` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    #CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  PRIMARY KEY (`id_persona`));

INSERT INTO `jovenes_profesionales`.`personas`  (nombre,apellido,id_sexo,id_estado_civil,dni,telefono_fijo,telefono_celular,id_domicilio,objetivo_laboral)
VALUES ("Mario","Martinez",1,2,38156423,49781243,1548265915,1,"Tener mi primer trabajo en Capital Federal");

INSERT INTO `jovenes_profesionales`.`personas`  (nombre,apellido,id_sexo,id_estado_civil,dni,telefono_fijo,telefono_celular,id_domicilio,objetivo_laboral)
VALUES ("Lucia","Paz",2,1,38451234,49336251,1513468557,2,"Conseguir un trabajo que me permita poder mantener a mi familia");

INSERT INTO `jovenes_profesionales`.`personas`  (nombre,apellido,id_sexo,id_estado_civil,dni,telefono_fijo,telefono_celular,id_domicilio,objetivo_laboral)
VALUES ("Martín","Soyar",3,3,34784515,43124652,1542516253,3,"Poder progresar dentro de una PyME");


CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`estudios` (
  `id_estudio` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `casa_de_estudios` VARCHAR(45) NOT NULL,
  `nivel` VARCHAR(45) NULL,
  `especialidad` VARCHAR(45) NOT NULL,
  `inicio_estudios` DATE NOT NULL,
  `fin_estudios` DATE null, 	# puede que todavia esté estudiando
  PRIMARY KEY (`id_estudio`),
	CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  UNIQUE INDEX `id_estudios_UNIQUE` (`id_estudio` ASC));

INSERT INTO `jovenes_profesionales`.`estudios` (id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios)
VALUES (1,"Colegio nro 1","Secundario","Colegio Técnico",'2000-03-01','2005-12-01');

INSERT INTO `jovenes_profesionales`.`estudios` (id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios)
VALUES (2,"Colegio nro 2","Secundario","Perito Mercantil",'2000-03-01','2005-12-01');

INSERT INTO `jovenes_profesionales`.`estudios` (id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios)
VALUES (2,"Colegio nro 2","Terciario","Contador",'2006-03-01',NULL);

INSERT INTO `jovenes_profesionales`.`estudios` (id_persona,casa_de_estudios,nivel,especialidad,inicio_estudios,fin_estudios)
VALUES (3,"Colegio nro 3","Secundario","Bachiller Básico",'2000-03-01',NULL);


CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`idiomas` (
  `id_idioma` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `sabe_oral` BIT NOT NULL,
  `sabe_escrito` BIT NOT NULL,
  PRIMARY KEY (`id_idioma`),
	CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  UNIQUE INDEX `id_idioma_UNIQUE` (`id_idioma` ASC));

INSERT INTO `jovenes_profesionales`.`idiomas` (id_persona,descripcion,sabe_oral,sabe_escrito)
VALUES (1,"Español",1,1);

INSERT INTO `jovenes_profesionales`.`idiomas` (id_persona,descripcion,sabe_oral,sabe_escrito)
VALUES (1,"Ingles",1,0);

INSERT INTO `jovenes_profesionales`.`idiomas` (id_persona,descripcion,sabe_oral,sabe_escrito)
VALUES (2,"Español",1,1);

INSERT INTO `jovenes_profesionales`.`idiomas` (id_persona,descripcion,sabe_oral,sabe_escrito)
VALUES (3,"Español",1,1);

CREATE TABLE IF NOT EXISTS  `jovenes_profesionales`.`experiencia_laboral` (
  `id_experiencia_laboral` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `empresa` VARCHAR(45) NOT NULL,
  `actividad` VARCHAR(45) NOT NULL,
  `puesto` VARCHAR(45) NOT NULL,
  `nivel` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NOT NULL,
  `inicio_actividad` DATE NOT NULL,
  `fin_actividad` DATE null, 	# puede que todavia esté trabajando 
  `area_del_puesto` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `cantidad_personas_a_cargo` INT NOT NULL,
  `nombre_persona_de_referencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_experiencia_laboral`),
	CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  UNIQUE INDEX `id_experiencia_laboral_UNIQUE` (`id_experiencia_laboral` ASC));

INSERT INTO `jovenes_profesionales`.`experiencia_laboral` (id_persona,empresa,actividad,puesto,nivel,pais,inicio_actividad,fin_actividad,area_del_puesto,descripcion,cantidad_personas_a_cargo,nombre_persona_de_referencia)
VALUES (1,"Empresa1 S.A.","Actividad A","Supervisor","Nivel 1","Argentina",'2010-06-02','2012-02-06',"Seguridad","La descripcion del primer trabajo1",2,"Pablo Calamaro");

INSERT INTO `jovenes_profesionales`.`experiencia_laboral` (id_persona,empresa,actividad,puesto,nivel,pais,inicio_actividad,fin_actividad,area_del_puesto,descripcion,cantidad_personas_a_cargo,nombre_persona_de_referencia)
VALUES (1,"Empresa2 S.A.","Actividad B","Jefe de Area","Nivel 3","Argentina",'2012-06-02','2012-07-01',"Seguridad","La descripcion del segundo trabajo",12,"Carlos Muñoz");

INSERT INTO `jovenes_profesionales`.`experiencia_laboral` (id_persona,empresa,actividad,puesto,nivel,pais,inicio_actividad,fin_actividad,area_del_puesto,descripcion,cantidad_personas_a_cargo,nombre_persona_de_referencia)
VALUES (2,"Empresa3 S.A.","Actividad C","Cadete","Nivel X","Argentina",'2017-07-01',NULL,"Administracion","Encargado de coordinar actividades",0,"Marta García");


SELECT p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,objetivo_laboral, count(el.id_experiencia_laboral) as 'cantidad de trabajos'
from personas p join sexo s on (p.id_sexo = s.id_sexo) join estado_civil ec on (ec.id_estado_civil = p.id_estado_civil) join domicilio d on (p.id_domicilio = d.id_domicilio) left join experiencia_laboral el on (el.id_persona = p.id_persona)
group by p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,p.objetivo_laboral;


select * from experiencia_laboral;
SELECT p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,objetivo_laboral, count(el.id_experiencia_laboral) as 'cantidad de trabajos' from personas p join sexo s on (p.id_sexo = s.id_sexo) join estado_civil ec on (ec.id_estado_civil = p.id_estado_civil) join domicilio d on (p.id_domicilio = d.id_domicilio) left join experiencia_laboral el on (el.id_persona = p.id_persona) group by p.nombre,p.apellido,s.descripcion,ec.descripcion,dni,telefono_fijo,telefono_celular,d.pais,p.objetivo_laboral