CREATE DATABASE IF NOT EXISTS gimnasio;
USE gimanasio;

CREATE TABLE IF NOT EXISTS `tbl_training` (

  `cod` int PRIMARY KEY auto_increment,   
  `entrenamiento` varchar(45)

);

CREATE TABLE IF NOT EXISTS `tbl_horarios` (

  `codhorario` int PRIMARY KEY auto_increment,   
  `nombre` varchar(45) NOT NULL,            
  `codentrenamiento` int NOT NULL,

  CONSTRAINT fk_codigo_entrenamiento FOREIGN KEY(codentrenamiento) REFERENCES tbl_training(cod)
  
);

CREATE TABLE IF NOT EXISTS `tbl_clientes` (

  `idcliente` int PRIMARY KEY auto_increment,   
  `cedula` varchar(45) NOT NULL ,       
  `nombre` varchar(45) NOT NULL ,     
  `telefono` varchar(45) NOT NULL ,     
  `correo` varchar(45) NOT NULL,
  `codentrenamiento` int NOT NULL,

  CONSTRAINT codigo_entrenamiento_fk FOREIGN KEY(codentrenamiento) REFERENCES tbl_training(cod)

);

