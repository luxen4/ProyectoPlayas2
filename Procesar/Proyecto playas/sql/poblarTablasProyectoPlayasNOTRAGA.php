<?php

/*1 MySql*/
$creaAGENCIABUSES="CREATE TABLE AGENCIABUSES(
  cod_AgenciaBuses   	INT NOT NULL AUTO_INCREMENT, 
  fecha_incripcion    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  nombre				      VARCHAR (30) NOT NULL,	
  nif					        VARCHAR (10) NOT NULL, 
  direccion			      VARCHAR (70) NOT NULL,	
  cp	  				      VARCHAR (6)  NOT NULL,
  localidad			      VARCHAR (20) NOT NULL, 
  provincia			      VARCHAR (20) NOT NULL, 
  comunidad			      VARCHAR (20) NOT NULL,	
  pais  				      VARCHAR (10) NOT NULL,	
  email				        VARCHAR (100) DEFAULT '-NO TIENE-' NOT NULL UNIQUE, 
  telefono_Reserva	  VARCHAR (15) NOT NULL, 
  telefono_Agencia 	  VARCHAR (15) NOT NULL,									
  horario_Agencia	    VARCHAR (80)  DEFAULT '10:00 a 13:00 y 17:00 a 20:00' NOT NULL, 
  pago_Online			    VARCHAR (15) NOT NULL, 
  numero_Cuenta 		  VARCHAR (64) NOT NULL,
  username			      VARCHAR (20) NOT NULL UNIQUE, 
  contrasena  		    VARCHAR (70) NOT NULL, 
  roll 				        VARCHAR(70)   DEFAULT 'agenciabuses' NOT NULL,
                        
  PRIMARY KEY (cod_AgenciaBuses)
);";



/*1 MySql  OK */
$pueblaAGENCIABUSES="INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_incripcion, nombre, nif,direccion, cp, localidad, provincia, comunidad,pais, 
        email, telefono_Reserva, telefono_Agencia, horario_Agencia, pago_Online, numero_Cuenta, username, contrasena, roll)

  VALUES (default,'Yanguas','A48265169','C/ Marques de Covarrubias 5','26003',   'Alberite', 'La Rioja','La Rioja','España',  
      'yanguas@yanguas.com','637117965','941-20-20-20', '10:15:00 a 13:30:00 y 17:30:00 a 20:30:00','SI','ES650123456789', 'yanguas21','$2y$10$91YosuvjXJim4.6eZcQccehkPJVKVNKjLbiJ9SJaGBoyUrThGNGDW',default),	
      /*username-> yanguas21		contrasena->yanguas21*/

      (default,'Autobuses Riojacar','A234567891','Calle la Nevera, 12','26006',    'Logroño','La Rioja','La Rioja','España',  
      'riojacar@riojacar.com','941 50 02 00','941 50 02 00', '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65123456789','riojacar21','$2y$10$FyUtPdH/FpUDdtmEfg697emLusRh8l9wdRmdc9uEbYDd1aKbUazVi',default),	
      /*username=> riojacar21     contrasena=> riojacar21 */

      (default,'Victor Bayo','B40156598','C/ Mayor, nº 10','40551','Campo de San Pedro','Segovia','Castilla y León','España',	
      'victorbayo@victorbayo.com','921 55 60 35','921 55 63 36', /*Lunes a viernes: 10:00-13:00 ; 17:00-19:00*/' 10:00 a 13:00 ; 17:00 a 19:00','SI','ES65412569863',
      'victorbayo21','$2y$10$WzAOf40fn03oxdAJ8cjUpuYWMo7zFgJfR.1Fm4j4ZMzlraNgeXZAG',default),
      /* username=> victorbayo21     contrasena=> victorbayo21 */

      (default,'Autobuses Jimenez','A48265190','C/ Santa María 8','26006',   'Logroño','La Rioja','La Rioja','España',	
      'jimenez@jimenez.com','941 20 27 77','941 20 27 77',  '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65234567890','jimenez21','$2y$10$YEqrNDwx800/PG7gxhS2iOtcNgwtE09c2B1Mxn4aJg60bBJuAkfuS',default),	
      /*username=> jimenez21      contrasena=> jimenez21 */

      (default,'Logrobus','A00125478','Calle Rodejón, 24','26006','Logroño','La Rioja','La Rioja','España',	
      'logrobus@logrobus.com','609411262',' 941 26 33 51',default,'SI','ES65547896258',
      'logrobus21','$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy',default);";	
      /*username=> logrobus21     contrasena=> logrobus21 */          /*Mirar que tiene unas animaciones muy bueneas de telefono, mundo y relog*/
      

/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/*2 MySql*/
$creaBUS="CREATE TABLE BUS(
  cod_Bus				      INT NOT NULL AUTO_INCREMENT,
  tipo_Bus			      ENUM ('Grande', 'Mediano', 'Pequeño', 'Minibus') NOT NULL DEFAULT 'Grande' ,
  plazas				      SMALLINT NOT NULL,
  matricula			      VARCHAR (15)  NOT NULL unique,
  ano_Matriculacion	  INT NOT NULL,	
  cod_AgenciaBuses	  INT NOT NULL,

  PRIMARY KEY (cod_Bus),
  FOREIGN KEY (cod_AgenciaBuses) REFERENCES AGENCIABUSES(cod_AgenciaBuses) ON DELETE CASCADE ON UPDATE CASCADE 
  /* https://qastack.mx/dba/74627/difference-between-on-delete-cascade-on-update-cascade-in-mysql */
);";

/*2 MySql OK */
$pueblaBUS="INSERT INTO BUS (tipo_Bus,plazas,matricula,ano_Matriculacion,cod_AgenciaBuses) 
VALUES  ('Grande','54','0001 ABC',2001,1),('Mediano','35','0002 ABC',2002,1), ('Pequeño','25','0003 ABC',2003,1), ('Minibus','19','0004 ABC',2004,1),		/* Para Yanguas */
    ('Grande','54','0005 ABC',2005,2),('Mediano','35','0006 ABC',2006,2), ('Pequeño','25','0007 ABC',2006,4), ('Minibus','19','0008 ABC',2006,2),		    /* Para Riojacar */
    ('Grande','54','0013 ABC',2008,3),('Mediano','35','0014 ABC',2007,3), ('Pequeño','25','0015 ABC',2010,3), ('Minibus','19','0016 ABC',2015,3),		    /* Para Victor Bayo */
    ('Grande','54','0009 ABC',2005,4),('Mediano','35','0010 ABC',2006,4), ('Pequeño','25','0011 ABC',2006,4), ('Minibus','19','0012 ABC',2008,4),		    /* Para LogroBus */
    ('Grande','54','0017 ABC',2007,5),('Mediano','35','0018 ABC',2009,5), ('Pequeño','25','0019 ABC',2012,5), ('Minibus','19','0020 ABC',2004,5);";		  /* Para Jimenez */
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */



/*3 Mysql*/
$creaAGENCIAVIAJES="CREATE TABLE AGENCIAVIAJES(
	cod_AgenciaViajes     int NOT NULL AUTO_INCREMENT,/* PRIMARY KEY NOT NULL,*/
	fecha_Inscripcion     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	nombre				        VARCHAR (90) NOT NULL,
  nif					          VARCHAR (100) NOT NULL, 
  direcion			        VARCHAR (70) NOT NULL, 
  cp					          VARCHAR (10) NOT NULL, /*varchar(4) NOT NULL default '',*/
	localidad			        VARCHAR (40) NOT NULL,	
  provincia			        VARCHAR (20) NOT NULL,	
  comunidad			        VARCHAR (20) NOT NULL,	
  pais				          VARCHAR (10) NOT NULL,	
	email				          VARCHAR (100)NOT NULL UNIQUE DEFAULT '-NO TIENE-',
	telefono_Reserva	    VARCHAR (15) NOT NULL DEFAULT 'NO',																									
	telefono_Agencia	    VARCHAR (15)  NOT NULL DEFAULT 'NO',																								
	horario_Agencia	      VARCHAR (80)  DEFAULT '10:00 a 13:00 y 17:00 a 20:00' NOT NULL,
	lugar_SalidaPredeterminado  VARCHAR (100)  DEFAULT 'Estación de autobuses (Logroño)' NOT NULL,	
	cod_CompaniaBusHabitual	    INT NOT NULL,	
	username             	VARCHAR (20) NOT NULL, 
  contrasena	 			    VARCHAR (70) NOT NULL UNIQUE,		
	pago_Online				    VARCHAR (15)   NOT NULL DEFAULT 'NO',																														
	num_CuentaPagosOnline VARCHAR (35),
	roll				          VARCHAR(70) DEFAULT 'agenciaviajes' NOT NULL,
					
		PRIMARY KEY (cod_AgenciaViajes),
		FOREIGN KEY (cod_CompaniaBusHabitual) REFERENCES AGENCIABUSES (cod_AgenciaBuses) ON DELETE CASCADE ON UPDATE CASCADE  
	);";


/*3 MySql OK */
$pueblaAGENCIAVIAJES="INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/fecha_Inscripcion,nombre,nif,direcion,cp,localidad,provincia,comunidad,pais,
											email,telefono_Reserva,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual, 
											username,contrasena,pago_Online,num_CuentaPagosOnline)

	VALUES (default,'Gran Reserva','A48265169','C/ Vara de Rey 42','26003','Logroño','La Rioja','La Rioja','España',
			'yanguas@yanguas.com','602263181','602263181','09:30:00 a 13:00:00 y 17:15:00 a 19:45:00','Estación de autobuses (Logroño)',1,
			'reser21','$2y$10$T.k.0Xfk3If3FPDJZnlKl.D6ByRd2..N4X2tHgKO.kYNa2iModk1O','SI','ES650123456789'),										/* Agencia de Viajes: Gran Reserva  username:reser21  contraseña:reser21 */

	(default,'GO TRAVELL','B26562918','C/ Avenida de la Solidaridad 9','26003','Logroño','La Rioja','La Rioja','España',
			'gotravell@gotravell.com','653107390','643674634',default,'C/ Avenida de la Solidaridad 9',2,
			'gotravell21','$2y$10$rwK1HGaQotvT0dkt9G3Fhu/4.55cZ2WEOxY.UP1VwCT/7RWnjpNkC','SI','ES65987654321'),										/* Agencia de Viajes: username:gotravell21  contrasena:gotravell21 */

	(default,'ROTUPRINT','R2600077H','Padre Claret, 1 bajo','26004', 'Logroño','La Rioja','La Rioja','España',
			'rotuprint@rotuprintrioja.com.','941235217','941235217','10:15:00 a 13:15:00 y 17:00:00 a 20:00:00','Varias Paradas',3,
			'rotu21','$2y$10$eO.U2FPgNtbGBgnRvvvsY.tpFGDoXCOmxZJXBAp0gAG5EqlsiDsbq', 'SI','ES65987654321'),											/* Agencia de Viajes: username:rotu21  contrasena:rotu21 */

	(default,'Azul Marino','B95860615','C/Gran Vía, 45 entrada por, Calle Lardero','26002','Logroño','La Rioja','La Rioja','España',
			'azulmarino@azulmarino.com','941 899 200','941 899 200',default,default,4,
			'azulmarino21','$2y$10$B.aNV5BQo8K7BwtQLs0lXuzLbjrmLkQ6j6A/rzSXTCHmi1YjQ373q','NO','NO'),												/* Agencia de Viajes: username:azulmarino21	contraseña:azulmarino21 */

	(default,'Zafiro Tours','A03357340','Cl. Río Miño, nº 1','26140','Lardero','La Rioja','La Rioja','España',
			'saltoangel@zafirotours.es','941 21 65 12','941 21 65 12','Iglesia de Lardero',default,4,
			'zafiro21','$2y$10$99PP47nOJr.RFed4ZO5NIepk5rpKYQTupLdAzYFguUWYBE43/oNxC','SI','ES65987654321');";										/* Agencia de Viajes: username:zafiro21	contraseña:zafiro21 */

			

/*4 MySql Estructura de tabla para la tabla `DESTINO` */

$creaDESTINO="CREATE TABLE DESTINO (
	cod_Destino				INT NOT NULL AUTO_INCREMENT,
	nombre_Lugar			VARCHAR (50) NOT NULL,
	prov_Depart				VARCHAR (50) NOT NULL,
	com_Reg					  VARCHAR (50) NOT NULL,
	pais					    ENUM('España', 'Francia', 'Portugal') NOT NULL  DEFAULT 'España',	
	dia_Semana				VARCHAR (15) NOT NULL,
	fecha_Viaje				VARCHAR (15) NOT NULL, 
	/*agencia_Oferta			VARCHAR (100) NOT NULL,*/
	cod_AgenciaOferta		  INT NOT NULL, 
	kilometrosIdaVuelta		INT NOT NULL,
	euros					        DECIMAL(19,4)DEFAULT '12', 	/*euros_Adulto y euros_Niño falta*/ /*tiempo_viaje*/
	cod_Bus					  INT NOT NULL,	
/*											   				                           
	direcion_Salida			NVARCHAR (100)   DEFAULT  (N'Estación de autobuses')NOT NULL,
	hora_Salida				TIME			 DEFAULT  (N'08:00:00.0000000') NOT NULL,

	direcion_Vuelta			NVARCHAR (100)	 DEFAULT  (N'Salida de la playa') NOT NULL,
	hora_Vuelta				TIME			 DEFAULT  (N'19:00:00') NOT NULL,
*/

		PRIMARY KEY (cod_Destino),
		FOREIGN KEY (cod_AgenciaOferta) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Bus) REFERENCES BUS (cod_Bus) ON UPDATE CASCADE ON DELETE CASCADE
);";


/* 4 MySql OK Volcado de datos para la tabla `BUS`

/*ACTUALIZADO SET lc_time_names = "es_ES"; /* Para que traduzca a Español el dia de la semana */
$pueblaDESTINO="INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_agenciaOferta,kilometrosIdaVuelta,euros,cod_bus)  
	VALUES	
	/*('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-25'),'2021-08-25',4,174,14,1)*/
	('Santoña','Cantabria','Cantabria','España',/*DAYNAME('2021-09-12') para Ingés*/ELT(WEEKDAY('2021-09-21') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-11',1,202.4,12,1),
	('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-12',1,174,12,2),
	('Castro Urdiales','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-18') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-18',1,118,12,2),
	('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-19',1,183,12,3),
	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-25') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-25',1,132,12,3),
	('San Sebastián','Guipúzcoaa','País Vasco','España',ELT(WEEKDAY('2021-09-26') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-26',1,102,12,4),

						
	('Hendaya','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2021-09-28') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-28',2,174,12,5),
	('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',ELT(WEEKDAY('2021-09-29') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-29',2,193,12,6),


	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-10-05') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-05',3,132,14,9),
	('Santander','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-05') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-05',3,157,14,10),
	('Castro Urdiales','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-06') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-06',3,118,14,10),
	('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-08') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-08',3,183,14,11),
	('Noja','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-10') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-10',3,174,14,12), 

						
	('San Juán de Luz','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2021-09-14') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-14',4,193,14,13),
	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-16') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-16',4,132,14,14),
	('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-25') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-25',4,174,14,15),
	('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-29') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-29',4,183,14,16),
						

	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-12',5,132,14,17),
	('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-19',5,174,14,18)
;";


/*4.5 Mysql*/
$creaAGENCIAVIAJESDESTINO="CREATE TABLE AGENCIAVIAJESDESTINO(
	cod_AgenciaViajesDestino  INT NOT NULL AUTO_INCREMENT, /*bigint unsigned not null primary key auto_increment,*/
	cod_AgenciaViajes	        INT NOT NULL, 
	cod_Destino			          INT NOT NULL, 
	
		PRIMARY KEY (cod_AgenciaViajesDestino),	
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Destino) REFERENCES DESTINO (cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE
);";


/*5 MySql*/
$creaCLIENTE="CREATE TABLE CLIENTE(
	cod_Cliente		      INT NOT NULL AUTO_INCREMENT,
	fecha_inscripcion   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	username      VARCHAR (20) NOT NULL UNIQUE,						
	nombre			  VARCHAR (20) NOT NULL,   
  apellidos		  VARCHAR (50) NOT NULL,	 
  nif 			    VARCHAR (15) NOT NULL,
	TlfnoParticular VARCHAR (10)  NOT NULL, 
  email 			  VARCHAR (100) NOT NULL UNIQUE,
  fNacimiento 	DATE NOT NULL, 
  sexo 			    VARCHAR(7) NOT NULL,
	calle			    VARCHAR(50)  NOT NULL,		
  cp				    VARCHAR (5)  NOT NULL,	
  localidad		  VARCHAR(50)  NOT NULL, 
  provincia		  VARCHAR(15)  NOT NULL,
	comunidad		  VARCHAR(15)  NOT NULL,		
  pais		      VARCHAR (10) NOT NULL,	
  contrasena		VARCHAR (70) NOT NULL,	
  roll        	VARCHAR(70) DEFAULT 'cliente' NOT NULL,

		PRIMARY KEY (cod_Cliente)
);";


/* 5 MySql OK */ 
$pueblaCLIENTE="INSERT INTO CLIENTE(username,nombre,apellidos,nif,TlfnoParticular,email,fNacimiento,sexo,calle,cp,localidad,provincia,comunidad,pais,contrasena,roll)
				VALUES(/*codCliente*/'adri82','Adrián','Laya García','16606852R','637117965','superlaya50@gmail.com','1982-06-17','H', 
						'Obispo Blanco Nájera 7, 5ºA','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','admin'),						/*	Username=>adri82,	Contraseña=>alberite    roll=>admin */

						(/*codCliente*/'edu82','Eduardo','Hormilla Urraca','00000000A','637117965','medico@medico.com','1982-01-01','H',	
						'Obispo Blanco Nájera 7, 3ºD','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','cliente'),					/*	Username=>edu82,	Contraseña=>alberite	roll=>cliente */

						(/*codCliente*/'dayanna82','Dayanna','Syrbley Carrero','01234567R','123456789','dayanna@dayanna50.com','2021-07-19','H', 
						'C/ Venezuela 8 5ºA','44003','Navarrete',
						'La Rioja','La Rioja','España','$2y$10$OF92TCIRXBH1giDrajCFou.muTfFstu7GA/qxVfxvi1RF.aWGq4ma','cliente'),					/*	Username=>dayanna82	Contrasena=>venezuela	roll=>cliente */

						(/*codCliente*/'borja82','Borja','García Barquín','00000000A','000000000','borja@borja.com','2000-01-01','H',	
						'Plaza de los Tilos 7, 5ºD','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','cliente')					/*	Username=>borja82,	Contraseña=>alberite	roll=>cliente */
						;";


/*6 Mysql*/
$creaAGENCIAVIAJESCLIENTE="CREATE TABLE AGENCIAVIAJESCLIENTE(
	 cod_AgenciaViajesCliente INT NOT NULL AUTO_INCREMENT,
	 cod_AgenciaViajes	      INT NOT NULL,  
	 cod_Cliente		          INT NOT NULL,
	 fecha_Inscripcion        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

   PRIMARY KEY (cod_AgenciaViajesCliente),

    CONSTRAINT UNIQUE_AgenciaViajesCliente UNIQUE (cod_AgenciaViajes,cod_Cliente),    
	/* o UNIQUE (ID)*/
    
   FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (cod_Cliente) REFERENCES CLIENTE (cod_Cliente) ON DELETE CASCADE ON UPDATE CASCADE
   );";



 /*7 Mysql*/
 $creaVIAJAR="CREATE TABLE VIAJAR(
  cod_Viajar		INT NOT NULL AUTO_INCREMENT,
  cod_Destino		INT NOT NULL,				
  cod_Cliente		INT NOT NULL, /*int(4) NOT NULL default '0',*/
  cod_Bus 		  INT NOT NULL, 
  plaza_Bus 		INT NOT NULL,

  /*UNIQUE(cod_Destino,cod_Cliente,cod_Bus),*/   
     /*https://suttonedfoundation.org/es/564227-i-need-to-auto_increment-a-field-in-mysql-that-is-not-primary-key-mysql-primary-key-auto-increment.html*/

  PRIMARY KEY (cod_Viajar),  

  CONSTRAINT UNIQUE_Viajar UNIQUE (cod_Destino,cod_Cliente),

  FOREIGN KEY (cod_Destino)	REFERENCES DESTINO	(cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (cod_Cliente)	REFERENCES CLIENTE	(cod_Cliente) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (cod_Bus)		REFERENCES BUS		(cod_Bus) ON UPDATE CASCADE ON DELETE CASCADE)/* ENGINE=InnoDB*/;";



                                      // Así para el host
$host="fdb30.awardspace.net";
$dbname="3714088_proyectoplayas";
$username="3714088_proyectoplayas";
$contrasena="alberite2";
              
try{
    $gbd = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena );
    $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected to at successfully.";
}catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


//$dfn="sqlsrv:server=(local);database=biblioteca;";


try {
  $con=new PDO($dfn);
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //$con->exec("use agenda");
  //$con->exec("go");
  $con->exec($creaAGENCIABUSES);
  $con->exec($creaBUS);
  $con->exec($creaAGENCIAVIAJES);
  $con->exec($creaDESTINO);
  $con->exec($creaAGENCIAVIAJESDESTINO);
  $con->exec($creaCLIENTE);
  $con->exec($creaVIAJAR);

  $con->beginTransaction();
  $stn=$con->prepare($pueblaAGENCIABUSES);
  $stn->execute();
  
  $stn=$con->prepare($pueblaBUS);
  $stn->execute();

  $stn=$con->prepare($pueblaAGENCIAVIAJES);
  $stn->execute();

  $stn=$con->prepare($pueblaDESTINO);
  $stn->execute();


  $con->commit();
  $stn->execute();


echo("Listo");?>


<!DOCTYPE html>         <!--Ya imprimiremos en un futuro, de momento esto que ya es bastante-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poblar tablas de proyectoplayas</title>
</head>
<body>
  <h1>Éxito!!!</h1>
  <h2>Contenido de la tabla provincia</h2>
  <table>
    <caption>Tabla Provincia</caption>
    <thead>
    <tr>
    <th>Código</th>
    <th>Provincia</th>
    </tr>
    </thead>
    <tbody>
  <?php 
      foreach($provs as $key=>$value ):
    ?>
    <tr>
      <td><?=$value['codProvincia']?></td>
      <td><?=$value['nombre']?></td>
    </tr>
  <?php  endforeach;
    $stn=$con->prepare($sql2);
    $stn->execute();
    if($fila=$stn->fetch(PDO::FETCH_ASSOC)):  
  ?>
  </tbody>
  </table>
  <h2>Contenido de la tabla agenda</h2>
  <table>
    <thead>
      <tr>
      <?php foreach($fila as $key=>$value): ?>
      <th><?=$key?></th>
      <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($fila as $value): ?>
      <td><?=$value?></td>
      <?php endforeach; ?>       
      </tr>
      <?php while($fila=$stn->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
        <?php foreach($fila as $value): ?>
        <td><?=$value?></td>
        <?php endforeach; ?>       
        </tr>
        <?php endwhile;?>
    </tbody>
  </table>
  <?php
  endif;
} catch (PDOException $ex) {
  die(print_r($ex->getMessage()));
  $con->rollBack();
} finally {
  $stn=null;
  $con = null;
}
            

















/*
$creaGenero="CREATE TABLE genero 
( idGenero INT identity (1,1) NOT NULL,
	nombre VARCHAR (200) NOT NULL,				
	descripcion VARCHAR (2000) NOT NULL								
	PRIMARY KEY (idGenero)
	);";

$pueblaGenero="INSERT INTO genero (nombre, descripcion)  
	VALUES	('<a href=''https://definicion.de/satira/Sátira''>Sátira</a>','Indignación hacia alguien o algo, con propósito moralizador, lúdico o meramente burlesco'),
			('<a href=''https://concepto.de/cuento/Cuento''>Cuento</a>','El cuento pertenece al género literario de la narración. Es un texto escrito en el que se narra una historia a través de unos personajes a los que les suceden hechos en un lugar y un espacio determinados.'),
			('<a href=''https://www.significados.com/novela/''>Novela</a>','Obra literaria en la que se narra una acción fingida en todo o en parte y cuyo fin es causar placer estético a los lectores'),
			('<a href=''https://tiposdearte.com/literatura/generos-literarios/epico/Poema+%C3%A9pico''>Poema épico</a>','El poema épico es un subgénero narrativo que consiste en un relato extenso que en general trata sobre grandes hazañas heroicas, en el cual el autor intenta presentar de manera objetiva sucesos reales o ficticios que acontecieron en un escenario espacial y temporal específico.'),
			('<a href=''https://definicion.de/cantar-de-gesta/Cantar''>Cantar de Gesta</a>','manifestación literaria extensa perteneciente a la épica que narra las hazañas de un héroe cuyas virtudes representan modelos para un pueblo o colectividad durante el Medievo.'),
			('<a href=''https://www.aboutespanol.com/romance-2206650Romance''>Romance</a>','Poema característico de la tradición literaria española, ibérica e hispanoamericana compuesto usando la combinación métrica homónima (octosílabos rimados en asonante en los versos pares). No debe confundirse con el subgénero narrativo de igual denominación.'),
			('<a href=''https://definicion.de/comedia/#:~:text=Aunque%20parezca%20contradictorio%2C%20la%20comedia,o%20avaro%2C%20por%20ejemplo).Comedia''>Comedia</a>','Las comedias se caracterizan por evocar la risa y tener un final feliz. '),	
			('<a href=''https://tiposdearte.com/literatura/generos-literarios/epico/Poema+%C3%A9pico''>Drama</a>','Representa algún episodio o conflicto de la vida de los seres humanos por medio del diálogo de los personajes.'),
			('<a href=''https://www.significados.com/tragedia/Comedia''>Tragedia</a>','forma literaria, teatral o dramática del lenguaje solemne, cuyos personajes protagónicos son ilustres y se ven enfrentados de manera misteriosa, invencible e inevitable, a causa de un error fatal o condición de carácter (la llamada hamartia) contra un destino fatal (fatum, hado o sino) o los dioses'),
			('<a href=''https://www.ensayistas.org/curso3030/genero/narrativa/''>História</a>','Descripcion del genero de historia'),
			('<a href=''https://www.literarysomnia.com/articulos-literatura/la-novela-historica-caracteristicas/''>Novela Histórica</a>',' subgénero narrativo que se configuró en el Romanticismo del siglo XIX'),
			('<a href=''https://literaturadeviajes.com/caracteristicas-de-la-literatura-de-viajes/''>Viajes</a>','Descripcion del genero de viajes'),
			('<a href=''https://concepto.de/novela-policiaca/''>Novela Policiaca</a>','Descripcion del género de novela policiaca')
	";



$creaLibro= "CREATE TABLE libro
( idLibro INT identity (1,1) NOT NULL,	
	titulo VARCHAR (100) NOT NULL,	
	autor VARCHAR (100) NOT NULL,
	idGenero int,
	idioma VARCHAR (20) NOT NULL,
	resumen VARCHAR (2000) NOT NULL,
	PRIMARY KEY (idLibro),
	Foreign key (idGenero)
	REFERENCES genero (idGenero),
);";


$pueblaLibro="INSERT INTO libro (titulo,autor,idGenero,idioma,resumen) 
	VALUES	('Rinconete y Cortadillo','Miguel de Cervantes',4, 'Castellano', '<a href=''https://sites.google.com/site/rinconeteycortadillolengua/argumento-resumen''>Resumen</a>'),
			('Much Ado About Nothing','William Shakespeare',8, 'Inglés', '<a href=''https://shakespeareobra.wordpress.com/mucho-ruido-y-pocas-nueces/''>Resumen</a>'),
			('La vida es sueño','Pedro Calderón de la Barca',9, 'Español', '<a href=''https://www.culturagenial.com/es/la-vida-es-sueno-de-pedro-calderon-de-la-barca/''>Resumen</a>'),
			('La tragedia de Hamlet','William Shakespeare',9, 'Inglés','<a href=''https://www.aboutespanol.com/hamlet-la-obra-maestra-de-william-shakespeare-resumen-y-comentarios-2174744''>Resumen</a>'),
			('Fausto','Johann Wolfgang von Goethe',9 , 'Alemán','<a href=''https://leereslomejor.com/c-literatura/fausto-goethe/''>Resumen</a>'),
			('L´Avare','Molière',5, 'Francés','<a href=''https://moliereproyecto.weebly.com/resumen.html''>Resumen</a>'),
			('Decamerón','Giovanni Boccaccio',3, 'Español', '<a href=''https://lafuentedelsaber.com/c-literatura/resumen-de-el-decameron/''>Resumen</a>'),
			('Veinte mil leguas de viaje submarino','Julio Verne',4, 'Francés','<a href=''https://www.arantxarufo.com/resena-de-veinte-mil-leguas-de-viaje-submarino/''>Resumen</a>'),			
			('Guerra y paz','León Tolstói',12, 'Ruso','<a href=''https://www.elresumen.com/libros/guerra_y_paz.htm''>Resumen</a>'),			
			('Tres tristes tigres','Guillermo Cabrera Infante',3, 'Español', '<a href=''http://www.lecturalia.com/libro/5065/tres-tristes-tigres''>Resumen</a>'),		
			('Pantaleón y las visitadoras','Mario Vargas Llosa',9 , 'Español', '<a href=''https://resumende.net/resumen-de-pantaleon-y-las-visitadoras-vargas-llosa/''>Resumen</a>'),
			('Bestiario','Julio Cortázar',3, 'Español', '<a href=''https://www.megustaleer.com/libros/bestiario/MES-065080''>Resumen</a>'),
			('Una historia de España','Arturo Pérez-Reverte',11 , 'Español', '<a href=''https://www.perezreverte.com/libro/724/una-historia-de-espana/''>Resumen</a>'),
			('After Dark','Haruki Murakami',4 , 'Japonés','<a href=''https://www.elquintolibro.es/2020/01/resena-de-after-dark-de-murakami/''>Resumen</a>'),
			('Las damas de oriente','Cristina Morató',12 ,'Español','<a href=''https://www.megustaleer.com/libros/las-damas-de-oriente/MES-010668''>Resumen</a>'),
			('La balsa de piedra','José Saramago', 4 ,'Español', '<a href=''https://resumiendolo.com/c-novela/la-balsa-de-piedra/''>Resumen</a>'),
			('El médico','Noah Gordon',12 ,'Español', '<a href=''http://www.lecturalia.com/libro/1512/el-medico''>Resumen</a>'),
			('El ocho','Katherine Neville', 9 , 'Español', '<a href=''https://turesumenya.com/c-literatura/el-ocho/''>Resumen</a>'
			)";


$creaUsuario="CREATE TABLE usuario(
	idUsuario INT identity (1,1) NOT NULL,
	nombre VARCHAR (80) NOT NULL,
	direccion VARCHAR (200) NOT NULL,
	PRIMARY KEY (idUsuario)
)";

$pueblaUsuario="INSERT INTO usuario (nombre,direccion) 
VALUES	('Adrián Laya García', 'Debajo del puente'),
    ('Dayanna Carrero', 'Gran via')";



$creaManipulador="CREATE TABLE manipulador(
	idManipulador INT identity (1,1) NOT NULL,
	nombre VARCHAR (80) NOT NULL,
	pass VARCHAR (500) NOT NULL,
	PRIMARY KEY (idManipulador)
)";

$pueblaManipulador="
INSERT INTO manipulador (nombre,pass)
	VALUES('admin','Abc123??')";




$creaEjemplar="CREATE TABLE ejemplar(
    idEjemplar INT identity (1,1) NOT NULL,
    idLibro INT,
    idUsuario INT,
    PRIMARY KEY (idEjemplar),
    Foreign key (idLibro)
    REFERENCES libro (idLibro),
    FOREIGN KEY (idUsuario)
    REFERENCES usuario (idUsuario)
  )";



  */