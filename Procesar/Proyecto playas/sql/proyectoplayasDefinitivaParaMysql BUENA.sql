-- https://gestionbasesdatos.readthedocs.io/es/stable/Tema3/Actividades.html  para hacer ejercicios -- Muy util

use proyectoplayasDefinitivo;
go
1.-tabla AGENCIABUSES	
2.-tabla BUS

3.-tabla AGENCIAVIAJES

4.-tabla DESTINO
4.5-tabla AGENCIAVIAJESDESTINO


5.-tabla CLIENTE
6.-tabla AGENCIAVIAJESCLIENTE

7.-tabla VIAJAR

--------------------------------------------------------------------------------------------------------------------------------------------------------------

/*1 MySql*/
		CREATE TABLE AGENCIABUSES(
		cod_AgenciaBuses   	INT NOT NULL AUTO_INCREMENT, 
		fecha_incripcion    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		nombre				VARCHAR (30) NOT NULL,	
		nif					VARCHAR (10) NOT NULL, 
		direccion			VARCHAR (70) NOT NULL,	
		cp	  				VARCHAR (6)  NOT NULL,
		localidad			VARCHAR (20) NOT NULL, 
		provincia			VARCHAR (20) NOT NULL, 
		comunidad			VARCHAR (20) NOT NULL,	
		pais  				VARCHAR (10) NOT NULL,	
		email				VARCHAR (100) DEFAULT '-NO TIENE-' NOT NULL UNIQUE, 
		telefono_Reserva	VARCHAR (15)  NOT NULL, 
		telefono_Agencia 	VARCHAR (15)  NOT NULL,									
		horario_Agencia	    VARCHAR (80) DEFAULT '10:00 a 13:00 y 17:00 a 20:00' NOT NULL, 
		pago_Online			VARCHAR (15) NOT NULL, 
		numero_Cuenta 		VARCHAR (64) NOT NULL,
		username			VARCHAR (20) NOT NULL UNIQUE, 
		contrasena  		VARCHAR (70) NOT NULL, 
		roll 				VARCHAR(70) DEFAULT 'agenciabuses' NOT NULL,
													
		PRIMARY KEY (cod_AgenciaBuses)
);

/*2 MySql*/
	CREATE TABLE BUS(
		cod_Bus				 INT NOT NULL AUTO_INCREMENT,
		tipo_Bus			 ENUM ('Grande', 'Mediano', 'Pequeño', 'Minibus') NOT NULL DEFAULT 'Grande' ,
		plazas				 SMALLINT NOT NULL,
		matricula			 VARCHAR (15)  NOT NULL unique,
		ano_Matriculacion	 INT NOT NULL,	
		cod_AgenciaBuses	 INT NOT NULL,

		PRIMARY KEY (cod_Bus),
		FOREIGN KEY (cod_AgenciaBuses) REFERENCES AGENCIABUSES(cod_AgenciaBuses) ON DELETE CASCADE ON UPDATE CASCADE 
		/*
		https://qastack.mx/dba/74627/difference-between-on-delete-cascade-on-update-cascade-in-mysql
		*/
);

/*3 Mysql*/
  CREATE TABLE AGENCIAVIAJES(
	cod_AgenciaViajes    int NOT NULL AUTO_INCREMENT,/* PRIMARY KEY NOT NULL,*/
	fecha_Inscripcion    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	nombre				VARCHAR (90) NOT NULL,
    nif					VARCHAR (100) NOT NULL, 
    direcion			VARCHAR (70) NOT NULL, 
    cp					VARCHAR (10) NOT NULL,	/*varchar(4) NOT NULL default '',*/
	localidad			VARCHAR (40) NOT NULL,	/*CHARSET utf8 COLLATE utf8_spanish_ci NOT NULL,*/
    provincia			VARCHAR (20) NOT NULL,	
    comunidad			VARCHAR (20) NOT NULL,	
    pais				VARCHAR (10) NOT NULL,	
	email				VARCHAR (100)NOT NULL UNIQUE DEFAULT '-NO TIENE-',
	telefono_Reserva	VARCHAR (15) NOT NULL DEFAULT 'NO',																									
	telefono_Agencia	VARCHAR (15)  NOT NULL DEFAULT 'NO',																								
	horario_Agencia	    VARCHAR (80)  DEFAULT '10:00 a 13:00 y 17:00 a 20:00' NOT NULL,
	lugar_SalidaPredeterminado  VARCHAR (100)  DEFAULT 'Estación de autobuses (Logroño)' NOT NULL,	
	cod_CompaniaBusHabitual	INT NOT NULL,	
	username             	VARCHAR (20) NOT NULL, 
    contrasena	 			VARCHAR (70) NOT NULL UNIQUE,		
	pago_Online				VARCHAR (15)   NOT NULL DEFAULT 'NO',																														
	num_CuentaPagosOnline VARCHAR (35),
	roll				VARCHAR(70) DEFAULT 'agenciaviajes' NOT NULL,
					
		PRIMARY KEY (cod_AgenciaViajes),
		FOREIGN KEY (cod_CompaniaBusHabitual) REFERENCES AGENCIABUSES (cod_AgenciaBuses) ON DELETE CASCADE ON UPDATE CASCADE  
	)/*ENGINE=MyISAM*/;


/*4.5 Mysql*/
CREATE TABLE AGENCIAVIAJESDESTINO(
	cod_AgenciaViajesDestino INT NOT NULL AUTO_INCREMENT, /*bigint unsigned not null primary key auto_increment,*/
	cod_AgenciaViajes	INT NOT NULL, 
	cod_Destino			INT NOT NULL, 
	
		PRIMARY KEY (cod_AgenciaViajesDestino),	
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Destino) REFERENCES DESTINO (cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE
);





/*6 Mysql*/
CREATE TABLE AGENCIAVIAJESCLIENTE(
	 cod_AgenciaViajesCliente INT NOT NULL AUTO_INCREMENT,
	 cod_AgenciaViajes	INT NOT NULL,  
	 cod_Cliente		INT NOT NULL,
	 fecha_Inscripcion  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

   PRIMARY KEY (cod_AgenciaViajesCliente),
    UNIQUE( cod_AgenciaViajes,cod_Cliente),   
   FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (cod_Cliente) REFERENCES CLIENTE (cod_Cliente) ON DELETE CASCADE ON UPDATE CASCADE);



 /*7 Mysql*/
   CREATE TABLE VIAJAR(
		cod_Viajar		INT NOT NULL AUTO_INCREMENT,
		cod_Destino		INT NOT NULL,				
		cod_Cliente		INT NOT NULL, /*int(4) NOT NULL default '0',*/
		cod_Bus 		INT NOT NULL, 
		plaza_Bus 		INT NOT NULL,

		UNIQUE(cod_Destino,cod_Cliente,cod_Bus),   
       /*https://suttonedfoundation.org/es/564227-i-need-to-auto_increment-a-field-in-mysql-that-is-not-primary-key-mysql-primary-key-auto-increment.html*/

		PRIMARY KEY (cod_Viajar),  

		FOREIGN KEY (cod_Destino)	REFERENCES DESTINO	(cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Cliente)	REFERENCES CLIENTE	(cod_Cliente) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Bus)		REFERENCES BUS		(cod_Bus) ON UPDATE CASCADE ON DELETE CASCADE);
----------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------


/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/*1 MySql  OK */
INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_incripcion, nombre, nif,direccion, cp, localidad, provincia, comunidad,pais, 
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
				'logrobus21','$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy',default);	
				/*username=> logrobus21     contrasena=> logrobus21 */          /*Mirar que tiene unas animaciones muy bueneas de telefono, mundo y relog*/
				
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */


/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/*2 MySql OK */
INSERT INTO BUS (tipo_Bus,plazas,matricula,ano_Matriculacion,cod_AgenciaBuses) 
	VALUES  ('Grande','54','0001 ABC',2001,1),('Mediano','35','0002 ABC',2002,1), ('Pequeño','25','0003 ABC',2003,1), ('Minibus','19','0004 ABC',2004,1),		/* Para Yanguas */
			('Grande','54','0005 ABC',2005,2),('Mediano','35','0006 ABC',2006,2), ('Pequeño','25','0007 ABC',2006,4), ('Minibus','19','0008 ABC',2006,2),		/* Para Riojacar */
			('Grande','54','0017 ABC',2007,3),('Mediano','35','0018 ABC',2009,3), ('Pequeño','25','0019 ABC',2012,3), ('Minibus','19','0020 ABC',2004,3),		/* Para Jimenez */
			('Grande','54','0009 ABC',2005,4),('Mediano','35','0010 ABC',2006,4), ('Pequeño','25','0011 ABC',2006,4), ('Minibus','19','0012 ABC',2008,4),		/* Para LogroBus */
			('Grande','54','0013 ABC',2008,5),('Mediano','35','0014 ABC',2007,5), ('Pequeño','25','0015 ABC',2010,5), ('Minibus','19','0016 ABC',2015,5);		/* Para Victor Bayo */
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
/*3 MySql OK */																																						
INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/fecha_Inscripcion,nombre,nif,direcion,cp,localidad,provincia,comunidad,pais,
											email,telefono_Reserva,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual, 
											username,contrasena,pago_Online,num_CuentaPagosOnline)

	VALUES (default,'Gran Reserva','A48265169','C/ Vara de Rey 42','26003','Logroño','La Rioja','La Rioja','España',
			'yanguas@yanguas.com','602263181','602263181','09:30:00 a 13:00:00 y 17:15:00 a 19:45:00','Estación de autobuses (Logroño)',1,
			'reser21','$2y$10$T.k.0Xfk3If3FPDJZnlKl.D6ByRd2..N4X2tHgKO.kYNa2iModk1O','SI','ES650123456789'),										/* Agencia de Viajes: Gran Reserva  username:reser21  contraseña:reser21 */

	(default,'GO TRAVELL','B26562918','C/ Avenida de la Solidaridad 9','26003','Logroño','La Rioja','La Rioja','España',
			'gotravell@gotravell.com','653107390','643674634',default,'C/ Avenida de la Solidaridad 9',2,
			'gotravell21','$2y$10$rwK1HGaQotvT0dkt9G3Fhu/4.55cZ2WEOxY.UP1VwCT/7RWnjpNkC','SI','ES65987654321'),										/* Agencia de Viajes: username:gotravell21  contrasena:gotravell21 */

	(default,'ROTUPRINT','B00000000','C/ Cantabria, 3 - BJ','26004', 'Logroño','La Rioja','La Rioja','España',
			'rotuprint@rotuprintrioja.com.','941235217','941235217','10:15:00 a 13:15:00 y 17:00:00 a 20:00:00','Varias Paradas',3,
			'rotu21','$2y$10$eO.U2FPgNtbGBgnRvvvsY.tpFGDoXCOmxZJXBAp0gAG5EqlsiDsbq', 'SI','ES65987654321'),											/* Agencia de Viajes: username:rotuprint21  contrasena:rotu21 */

	(default,'Azul Marino','SIC 4722','C/Gran Vía, 45 entrada por, Calle Lardero','26002','Logroño','La Rioja','La Rioja','España',
			'azulmarino@azulmarino.com','941 899 200','941 899 200',default,default,4,
			'azulmarino21','$2y$10$B.aNV5BQo8K7BwtQLs0lXuzLbjrmLkQ6j6A/rzSXTCHmi1YjQ373q','NO','NO'),												/* Agencia de Viajes: username:azulmarino21	contraseña:azulmarino21 */

	(default,'Zafiro Tours','A03357340','C/Rio Miño, nº1','26140','Lardero','La Rioja','La Rioja','España',
			'saltoangel@zafirotours.es','941 21 65 12','941 21 65 12',default,'Iglesia de Lardero',5,
			'zafiro21','$2y$10$99PP47nOJr.RFed4ZO5NIepk5rpKYQTupLdAzYFguUWYBE43/oNxC','NO','NO');													/* Agencia de Viajes: username:zafiro21	contraseña:zafiro21 */



/*----------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*4 MySql*/
 CREATE TABLE DESTINO (
	cod_Destino				INT NOT NULL AUTO_INCREMENT,
	nombre_Lugar			VARCHAR (50) NOT NULL,
	prov_Depart				VARCHAR (50) NOT NULL,
	com_Reg					VARCHAR (50) NOT NULL,
	pais					ENUM('España', 'Francia', 'Portugal') NOT NULL  DEFAULT 'España',	
	dia_Semana				VARCHAR (15) NOT NULL,
	fecha_Viaje				VARCHAR (15) NOT NULL, 
	/*agencia_Oferta			VARCHAR (100) NOT NULL,*/
	cod_AgenciaOferta		INT NOT NULL, 
	kilometrosIdaVuelta		INT NOT NULL,
	euros					DECIMAL(19,4)DEFAULT '12', 	/*euros_Adulto y euros_Niño falta*/ /*tiempo_viaje*/
	cod_Bus					INT NOT NULL,	
/*											   				                           
	direcion_Salida			NVARCHAR (100)   DEFAULT  (N'Estación de autobuses')NOT NULL,
	hora_Salida				TIME			 DEFAULT  (N'08:00:00.0000000') NOT NULL,

	direcion_Vuelta			NVARCHAR (100)	 DEFAULT  (N'Salida de la playa') NOT NULL,
	hora_Vuelta				TIME			 DEFAULT  (N'19:00:00') NOT NULL,
*/

		PRIMARY KEY (cod_Destino),
		FOREIGN KEY (cod_AgenciaOferta) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Bus) REFERENCES BUS (cod_Bus) ON UPDATE CASCADE ON DELETE CASCADE
);

/* 4 MySql */
INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_agenciaOferta,kilometrosIdaVuelta,euros,cod_bus)  /*Dia de la semana*/
						VALUES	
					/*	Gran Reserva (1) Yanguas (1) */
					/*
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-07-16'),'2021-07-16','Gran Reserva',132,12,1),
						('San Sebastián','Guipúzcoaa','Pais Vasco','España',DAYNAME('2021-07-17'),'2021-07-17','Gran Reserva',102,12,1),
						('Santander','Cantabria','Cantabria','España'DAYNAME('2021-07-18'),'2021-07-18','Gran Reserva',157,12,1),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-23'),'2021-07-23','Gran Reserva',174,12,1),

						('Plentzia','Cantabria','Cantabria','España',DAYNAME('2021-07-24'),'2021-07-24','Gran Reserva',119,12,1),
						('Fuenterrabia','Bizkaia','Pais Vasco','España',DAYNAME('2021-07-25'),'2021-07-25','Gran Reserva',183,12),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-07-30'),'2021-07-30','Gran Reserva',157,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-31'),'2021-07-31','Gran Reserva',174,12),

						('Zumaia','Cantabria','Cantabria','España',DAYNAME('2021-08-01'),'2021-08-1','Gran Reserva',165,14),
						('San Sebastián','Guipúzcoaa','Pais Vasco','España',DAYNAME('2021-08-06'),'2021-08-06','Gran Reserva',102,12),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-07'),'2021-08-07','Gran Reserva',118,14),	
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-08-08'),'2021-08-08','Gran Reserva',157,12),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-13'),'2021-08-13','Gran Reserva',118,14),	
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-08-14'),'2021-08-14','Gran Reserva',157,12),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-08-15'),'2021-08-15','Gran Reserva',132,12),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-08-20'),'2021-08-20','Gran Reserva',132,12,2),
						('Zumaia','Cantabria','Cantabria','España',DAYNAME('2021-08-21'),'2021-08-21','Gran Reserva',165,14,2),
						('Plentzia','Cantabria','Cantabria','España',DAYNAME('2021-08-22'),'2021-08-22','Gran Reserva',119,12,2),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-27'),'2021-08-27',1,174,12,1),
						('Fuenterrabia','Bizkaia','Pais Vasco','España',DAYNAME('2021-08-28'),'2021-08-28',1,183,12,1),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-29'),'2021-08-29',1,118,12,1),

						('San Sebastián','Guipúzcoaa','Pais Vasco','España',DAYNAME('2021-09-04'),'2021-09-04',1,102,12,1),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-09-05'),'2021-09-05',1,157,12,1),
					*/	('Santoña','Cantabria','Cantabria','España',DAYNAME('2021-09-11'),'2021-09-11',1,202.4,12,2),
						('Zarautz','Guipuzkoa','País Vasco','España', DAYNAME('2021-09-12','es_ES'),'2021-09-12',1,174,12,3),

						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-09-18'),'2021-09-18',1,118,12,1),
						('Fuenterrabía','Bizkaia','País Vasco','España',DAYNAME('2021-09-19'),'2021-09-19',1,183,12,1),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-25'),'2021-09-25',1,132,12,1),
						('San Sebastián','Guipúzcoaa','País Vasco','España',DAYNAME('2021-09-26'),'2021-09-26',1,102,12,3);


					/* GO TRAVELL (2) Y RIOJACAR (2) */
					/*	('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-14'),'2021-07-14','GO TRAVELL',174,12),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-07-17'),'2021-07-17','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-07-18'),'2021-07-18','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-21'),'2021-07-21','GO TRAVELL',174,12),

						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-07-24'),'2021-07-24','GO TRAVELL',193,12),
						('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-07-25'),'2021-07-25','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-07-28'),'2021-07-28','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-31'),'2021-07-31','GO TRAVELL',174,12),

						('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-01'),'2021-08-01','GO TRAVELL',157,14),
						('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-04'),'2021-08-04','GO TRAVELL',174,12),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-08-07'),'2021-08-07','GO TRAVELL',174,12),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-08'),'2021-08-08','GO TRAVELL',284,12),
						('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-08-11'),'2021-08-11','GO TRAVELL',183,14),
						('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-14'),'2021-08-14','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España', DAYNAME('2021-07-15'),'2021-08-15','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-07-18'),'2021-08-18','GO TRAVELL',174,12),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-21'),'2021-08-21','GO TRAVELL',118,14,2),
						('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-22'),'2021-08-22','GO TRAVELL',174,12,2),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-25'),'2021-08-25','GO TRAVELL',193,12,2),
					*/	('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-28'),'2021-08-28',2,174,12,1),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-29'),'2021-08-29',2,193,12,1),
					


					/* Rotuprint (3) Victor Bayo (3)*/
					/*
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-07-02'),'2021-07-02',3,132,14,1),
						('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-03'),'2021-07-03',3,157,14,1),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-07-05'),'2021-07-05',3,118,14,1),
						('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-07-07'),'2021-07-07',3,183,14,1),
						('Noja','Cantabria','Cantabria','España', DAYNAME('2021-07-09'),'2021-07-09',3,174,14,1), /*Falta más fechas*/
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-07-10'),'2021-07-10',3,193,14,1),
						('Orio','Guipuzcoa','País Vasco','España',DAYNAME('2021-07-12'),'2021-07-12',1,168,14,1),
						('Plentzia','Bizkaia','País Vasco','España',DAYNAME('2021-07-13'),'2021-07-13',1,164,14,1),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-14'),'2021-07-14','Playa Bus',174,14),
						('Somo','Cantabria','Cantabria','España',DAYNAME('2021-07-16'),'2021-07-16','Playa Bus',224,14),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-07-17'),'2021-07-17','Playa Bus',284,12),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-07-19'),'2021-07-19','Playa Bus',118,14),
						('Zumaia','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-20'),'2021-07-20','Playa Bus',165,14),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-21'),'2021-07-21','Playa Bus',174,14),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-07-23'),'2021-07-23','Playa Bus',132,14),
						('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-24'),'2021-07-24','Playa Bus',157,14),
						('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-07-26'),'2021-07-26','Playa Bus',183,14),
						('Plentzia','Bizkaia','País Vasco','España',DAYNAME('2021-07-27'),'2021-07-27','Playa Bus',164,14),
						('Orio','Guipuzcoa','País Vasco','España',DAYNAME('2021-07-28'),'2021-07-28','Playa Bus',168,14),
						('Somo','Cantabria','Cantabria','España',DAYNAME('2021-07-30'),'2021-07-30','Playa Bus',224,14),

						/*Agosto*/
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-02'),'2021-08-02','Playa Bus',174,14),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-03'),'2021-08-03','Playa Bus',118,14),
						('Zumaia','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-04'),'2021-08-04','Playa Bus',165,14),
						('Noja','Cantabria','Cantabria','España',DAYNAME('2021-08-06'),'2021-08-06','Playa Bus',174,14), /*Falta más fechas*/
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-07'),'2021-08-07','Playa Bus',193,14),
						('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-08-09'),'2021-08-09','Playa Bus',183,14),
						('Plentzia','Bizkaia','País Vasco','España',DAYNAME('2021-08-10'),'2021-08-10','Playa Bus',164,14),
						('Guetaria','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-11'),'2021-08-11','Playa Bus',171,14),
						('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-14'),'2021-08-14','Playa Bus',157,14),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-16'),'2021-08-16','Playa Bus',118,14),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-17'),'2021-08-17','Playa Bus',174,14),
						('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-08-18'),'2021-08-18','Playa Bus',183,14),
						('Somo','Cantabria','Cantabria','España',DAYNAME('2021-08-20'),'2021-08-20','Playa Bus',224,14,2),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-21'),'2021-08-21','Playa Bus',284,12,2),
						('Orio','Guipuzcoa','País Vasco','España',DAYNAME('2021-08-23'),'2021-08-23','Playa Bus',168,14,2),
						('Plentzia','Cantabria','Cantabria','España',DAYNAME('2021-08-24'),'2021-08-24','Playa Bus',119,12,2),
						('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-25'),'2021-08-25','Playa Bus',174,14,3),
						('Noja','Cantabria','Cantabria','España', DAYNAME('2021-08-27'),'2021-08-27',3,174,14,1), 
						('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-28'),'2021-08-28',3,174,12,1),
						('Castro Urdiales','Cantabria','Cantabria','España', DAYNAME('2021-08-30'),'2021-08-30',3,118,14,1),
						('Zarautz','Guipuzkoa','Pais Vasco','España', DAYNAME('2021-08-31'),'2021-08-31',3,174,12,1),
							
						('Zumaia','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-09-01'),'2021-09-01',3,165,14,1),
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-03'),'2021-09-03',3,132,14,3),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-09-04'),3,3,193,14,3),   /*Fin de temporada*/
					*/
						('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-10-05'),'2021-10-05',3,132,14,1),
						('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-10-05'),'2021-10-05',3,157,14,1),
						('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-10-06'),'2021-10-06',3,118,14,1),
						('Fuenterrabía','Bizkaia','País Vasco','España',DAYNAME('2021-10-08'),'2021-10-08',3,183,14,1),
						('Noja','Cantabria','Cantabria','España', DAYNAME('2021-10-10'),'2021-10-10',3,174,14,1), /*Falta más fechas*/
						
							
							/* Azul Marino (4) Logrobus (4)*/ 
							/*
								('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-07-18'),'2021-07-18',4,174,12),
								('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-07-25'),'2021-07-25',4,193,12),
								('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-1'),'2021-08-01',4,284,12),
								('Santander','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-08'),'2021-08-08',4,157,12),
								('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-15'),'2021-08-15',4,174,14,1),
								('Isla','Cantabria','Cantabria','España',DAYNAME('2021-08-22'),'2021-08-22',4,216,14,1),
							*/	('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-08-29'),'2021-08-29',4,183,14,1),
								('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-03'),'2021-09-03',4,132,14,1),
								('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-09-04'),3,4,193,14,1),
								('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-25'),'2021-08-25',4,174,14,1),


							/* Zafiro Tours (5) Logrobus (4)*/ 
								('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-12'),'2021-09-12',5,132,14,1),
								('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-09-19'),'2021-09-19',5,174,14,1),
							;




		/*ACTUALIZADO*/
							INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_agenciaOferta,kilometrosIdaVuelta,euros,cod_bus)  
						VALUES	
						('Santoña','Cantabria','Cantabria','España',/*DAYNAME('2021-09-12') para Ingés*/ELT(WEEKDAY('2021-09-21') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-11',1,202.4,12,1),
						('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-12',1,174,12,1),
						('Castro Urdiales','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-18') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-18',1,118,12,1),
						('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-19',1,183,12,1),
						('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-25') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-25',1,132,12,1),
						('San Sebastián','Guipúzcoaa','País Vasco','España',ELT(WEEKDAY('2021-09-26') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-26',1,102,12,1),

						

						('Hendaya','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2021-09-28') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-28',2,174,12,1),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',ELT(WEEKDAY('2021-09-29') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-29',2,193,12,1),

						('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-10-05') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-05',3,132,14,1),
						('Santander','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-05') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-05',3,157,14,1),
						('Castro Urdiales','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-06') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-06',3,118,14,1),
						('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-08') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-08',3,183,14,1),
						('Noja','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-10') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-10-10',3,174,14,1), 

						
						('San Juán de Luz','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2021-09-14') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-14',4,193,14,1),
						('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-16') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-16',4,132,14,1),
						('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-25') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-25',4,174,14,1),
						('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2021-09-29') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-29',4,183,14,1),
						

						('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2021-09-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-12',5,132,14,1),
						('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2021-09-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-09-19',5,174,14,1)
	;






/*5 MySql*/
  CREATE TABLE CLIENTE(
	cod_Cliente		INT NOT NULL AUTO_INCREMENT,
	fecha_inscripcion   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	username        VARCHAR (20) NOT NULL UNIQUE,						
	nombre			VARCHAR (20) NOT NULL,   
    apellidos		VARCHAR (50) NOT NULL,	 
    nif 			VARCHAR (15) NOT NULL,
	TlfnoParticular VARCHAR (10)  NOT NULL, 
    email 			VARCHAR (100) NOT NULL UNIQUE,
    fNacimiento 	DATE NOT NULL, 
    sexo 			VARCHAR(7) NOT NULL,
	calle			VARCHAR(50)  NOT NULL,		
    cp				VARCHAR (5)  NOT NULL,	
    localidad		VARCHAR(50)  NOT NULL, 
    provincia		VARCHAR(15)  NOT NULL,
	comunidad		VARCHAR(15)  NOT NULL,		
    pais			VARCHAR (10) NOT NULL,	
    contrasena		VARCHAR (70) NOT NULL,	
    roll        	VARCHAR(70) DEFAULT 'cliente' NOT NULL,

		PRIMARY KEY (cod_Cliente));
				
/*5 MySql OK */ 
INSERT INTO CLIENTE(username,nombre,apellidos,nif,TlfnoParticular,email,fNacimiento,sexo,calle,cp,localidad,provincia,comunidad,pais,contrasena,roll)
				VALUES(/*codCliente*/'adri82','Adrián','Laya García','16606852R','637117965','superlaya50@gmail.com','1982-06-17','H', 
						'Obispo Blanco Nájera 7, 5ºA','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','admin'),						/*	Username=>adri82,	Contraseña=>alberite    roll=>admin */

						(/*codCliente*/'edu82','Eduardo','Hormilla Urraca','00000000A','637117965','medico50@medico.com','1982-01-01','H',	
						'Obispo Blanco Nájera 7, 3ºD','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','cliente'),					/*	Username=>edu82,	Contraseña=>alberite	roll=>cliente */

						(/*codCliente*/'dayanna82','Dayanna','Syrbley Carrero','01234567R','123456789','dayanna50@dayanna50.com','2021-07-19','H', 
						'C/ Venezuela 8 5ºA','44003','Navarrete',
						'La Rioja','La Rioja','España','$2y$10$OF92TCIRXBH1giDrajCFou.muTfFstu7GA/qxVfxvi1RF.aWGq4ma','cliente'),					/*	Username=>dayanna82	Contrasena=>venezuela	roll=>cliente */
 
						(/*codCliente*/'biri82','Diego','Birigay','01234567R','123456789','biri21@biri21.com','2000-01-01','H', 
						'C/ Madre de dios 8 5ºA','26003','Logroño',
						'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','cliente');					/*  Username=>biri21	Contrasena=>alberite	roll=>cliente */

 -----------------------------------------------------------------------------------------
																																					






































 /*DROP DATABASE base_de_datos;*/

 --Para MySql

	/*CREATE TABLE prueba (
  uno int(4) NOT NULL default '0',
  dos int(4) NOT NULL default '0',
  tres varchar(4) NOT NULL default '',
  cuatro varchar(4) NOT NULL default '',
  PRIMARY KEY  (uno,dos)
) ENGINE=InnoDB;*/


	CREATE TABLE club
(
    key SERIAL PRIMARY KEY,
    name TEXT UNIQUE
);

CREATE TABLE band
(
    key SERIAL PRIMARY KEY,
    name TEXT UNIQUE
);

CREATE TABLE concert
(
    key SERIAL PRIMARY KEY,
    club_name TEXT REFERENCES club(name) ON UPDATE CASCADE,
    band_name TEXT REFERENCES band(name) ON UPDATE CASCADE,
    concert_date DATE
);


CREATE TABLE child (
        id INT, 
        parent_id INT,
        INDEX par_ind (parent_id),
        FOREIGN KEY (parent_id) 
            REFERENCES parent(id)
            ON UPDATE CASCADE ON DELETE CASCADE
    ) ENGINE=INNODB;
	/*https://qastack.mx/dba/74627/difference-between-on-delete-cascade-on-update-cascade-in-mysql*/




	/* UPDATE BUS SET tipo_Bus='Minibus', plazas='19', matricula='8796 JHY', ano_Matriculacion='9999' WHERE cod_Bus='19'; */




	DROP TABLE DESTINO; DROP TABLE AGENCIAVIAJES;
SELECT * FROM AGENCIAVIAJES;
SELECT * FROM DESTINO;

















	--6	
-- Los valores dependerán de los datos de otras tablas que hemos metido --
INSERT INTO AGENCIAVIAJESCLIENTE ( cod_AgenciaViajes,cod_Cliente,fecha_Inscripcion) VALUES (2,1,default);				
INSERT INTO AGENCIAVIAJESCLIENTE ( cod_AgenciaViajes, cod_Cliente/*,fechaInscripcion*/) VALUES (1,1);
SELECT * FROM AGENCIAVIAJESCLIENTE; DROP TABLE AGENCIAVIAJESCLIENTE;
DROP TABLE CLIENTE;	
-- ----------------------------------------------------------------------------------------------------------



	INSERT INTO VIAJAR (cod_Destino,cod_Cliente,cod_Bus,plaza_Bus)	
					VALUES   (1053,1,8,39);

		INSERT INTO VIAJAR (cod_Destino,cod_Cliente,cod_Bus,plaza_Bus) VALUES (1053,2,8,29);

		

	-- ALTER TABLE VIAJAR ADD PRIMARY KEY ( cod_Destino , cod_Cliente, cod_Bus  );
	









	






				/* 4 MySql OK */
INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_agenciaOferta,kilometrosIdaVuelta,euros,cod_bus)  /*Dia de la semana*/
						VALUES	
							('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-27'),'2021-08-27',1,174,12,1),
							('Fuenterrabia','Bizkaia','Pais Vasco','España',DAYNAME('2021-08-28'),'2021-08-28',1,183,12,1),
							('Castro Urdiales','Cantabria','Cantabria','España',DAYNAME('2021-08-29'),'2021-08-29',1,118,14,1),
                            
							('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-28'),'2021-08-28',2,174,12,1),
							('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-08-29'),'2021-08-29',2,193,12,1),

							('Noja','Cantabria','Cantabria','España', DAYNAME('2021-08-27'),'2021-08-27',3,174,14,1), 
							('San Sebastián','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-28'),'2021-08-28',3,174,12,1),
							('Castro Urdiales','Cantabria','Cantabria','España', DAYNAME('2021-08-30'),'2021-08-30',3,118,14,1),
							('Zarautz','Guipuzkoa','Pais Vasco','España', DAYNAME('2021-08-31'),'2021-08-31',3,174,12,1),

							('Zumaia','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-09-01'),'2021-09-01',3,165,14,1),
							('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-03'),'2021-09-03',3,132,14,3),
							('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-09-04'),3,3,193,14,3),
							
								('Fuenterrabia','Bizkaia','País Vasco','España',DAYNAME('2021-08-29'),'2021-08-29',4,183,14,1),
								('Laredo','Cantabria','Cantabria','España',DAYNAME('2021-09-03'),'2021-09-03',4,132,14,1),
								('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',DAYNAME('2021-09-04'),3,4,193,14,1),
								('Zarautz','Guipuzkoa','Pais Vasco','España',DAYNAME('2021-08-25'),'2021-08-25',4,174,14,1)

							;