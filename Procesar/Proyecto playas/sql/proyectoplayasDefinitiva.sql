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
--1 SqlServer
CREATE TABLE AGENCIABUSES(
	cod_AgenciaBuses   INT identity (1,1) NOT NULL, 
	fecha_Inscripcion  DATE DEFAULT GETDATE () NOT NULL,
	nombre				NVARCHAR (30) NOT NULL,	
	nif					NVARCHAR (10) NOT NULL, 
	direccion			NVARCHAR (70) NOT NULL,	
	cp					NVARCHAR (6)  NOT NULL,
	localidad			NVARCHAR (20) NOT NULL, 
	provincia			NVARCHAR (20) NOT NULL, 
	comunidad			NVARCHAR (20) NOT NULL,	
	pais				NVARCHAR (10) NOT NULL,	
	email				NVARCHAR (100) DEFAULT N'-NO TIENE-'NOT NULL UNIQUE, 
	telefono_Reserva	NVARCHAR (15)  NOT NULL, 
	telefono_Agencia	NVARCHAR (15)  NOT NULL,									
	horario_Agencia	    NVARCHAR (80) DEFAULT N'10:00 a 13:00 y 17:00 a 20:00' NOT NULL, 
	pago_Online			NVARCHAR (15) NOT NULL, 
	numero_Cuenta		NVARCHAR (64) NOT NULL,
	username			NVARCHAR (20) NOT NULL UNIQUE, 
	contrasena			NVARCHAR (70) NOT NULL,
	roll				NVARCHAR(70) DEFAULT N'agenciabuses' NOT NULL,
													
	CONSTRAINT pkAGENCIABUSES PRIMARY KEY (cod_AgenciaBuses));

	--select * from cliente;
	drop table AGENCIABUSES;

	INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_Inscripcion, nombre, nif, direccion, cp, localidad, provincia, comunidad, pais, email, telefono_Reserva,
	telefono_Agencia, horario_Agencia,pago_Online,numero_Cuenta, username,contrasena,roll) VALUES (default,'Autocares Laya', 'A00000000', 'C/ Obispo Blanco Nájera 7 5ºA',
	'26004', 'Logroño', 'La Rioja','La Rioja','España', 'layabus@layabus.comm','637117965','637117965',
	'00:00:02 a 00:00:02 y 02:00:00 a 00:02:00','SI','ES0123456789', 'layabus21','$2y$10$sHj9j4GWxO712fbuMEBpleS0i/y37o7Td66Qoup2HD.yjVcNXUcqu',default);

	INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_Inscripcion, nombre, nif, direccion, cp, localidad, provincia, comunidad, pais, email, 
	telefono_Reserva,telefono_Agencia, horario_Agencia,pago_Online,numero_Cuenta, username,contrasena,roll) VALUES (default,'Autocares Laya', 'A00000000',
	'C/ Obispo Blanco Nájera 7 5ºA','26004', 'Logroño', 'La Rioja','La Rioja','España', 'layabus@layabus.coma','637117965','637117965', 
	'00:00:02 a 00:00:02 y 02:00:00 a 00:02:00','SI','ES0123456789', 'layabus21q','$2y$10$Rs9glrh8OdLJFmm6voJMluOioTLKeIEenE9aZU8bDE37w5APfHPh.',default);
-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--2 SqlServer
CREATE TABLE BUS(
	cod_Bus				 INT identity (1,1) NOT NULL,
	tipo_Bus			 NVARCHAR (10)  CONSTRAINT dfTipoBusAutobus DEFAULT N'Grande' NOT NULL,
	plazas				 SMALLINT NOT NULL,
	matricula			 NVARCHAR (15)  NOT NULL unique,
	ano_Matriculacion	 INT NOT NULL,	
	cod_AgenciaBuses	 INT NOT NULL,

	CONSTRAINT PkAUTOBUS
			PRIMARY KEY (cod_Bus),

	CONSTRAINT FkAgenciaAutobus
			FOREIGN KEY (cod_AgenciaBuses) REFERENCES AGENCIABUSES (cod_AgenciaBuses) ON UPDATE CASCADE ON DELETE CASCADE,

	CONSTRAINT cKdfTipoBusAutobus
		CHECK ((tipo_Bus) in ('Grande','Mediano','Pequeño','Minibus')),
);
----------------------------------------------------------------------------------------------------
--3 SqlServer
 CREATE TABLE AGENCIAVIAJES(
	cod_AgenciaViajes			INT identity (001,001) NOT NULL,
	fecha_Inscripcion			DATE  DEFAULT GetDate(),
	nombre						NVARCHAR (90) NOT NULL, 
	nif							VARCHAR (100) NOT NULL, 
	direcion					NVARCHAR (70) NOT NULL, 
	cp							NVARCHAR (10) NOT NULL,
	localidad					NVARCHAR (40) NOT NULL,	
	provincia					NVARCHAR (20) NOT NULL,	
	comunidad					NVARCHAR (20) NOT NULL,	
	pais						NVARCHAR (10) NOT NULL,	
	email						NVARCHAR (100)NOT NULL UNIQUE,											/* DEFAULT N'-NO TIENE-' se pone antes del NOT NULL*/ 
	telefono_Reserva			NVARCHAR (15) NOT NULL,													/* CONSTRAINT dfTelefonoDeReservaAgenciaViajes DEFAULT N'NO'*/	
	telefono_Agencia			NVARCHAR (15)  NOT NULL,												/* CONSTRAINT dfTelefonoAgenciaAgenciaViajes DEFAULT N'NO' */
	horario_Agencia				NVARCHAR (80)	DEFAULT N'10:00 a 13:00 y 17:00 a 20:00' NOT NULL,
	lugar_SalidaPredeterminado  NVARCHAR (100)  DEFAULT N'Estación de autobuses (Logroño)' NOT NULL,	
	cod_CompaniaBusHabitual		INT NOT NULL,	
	username					NVARCHAR (20) NOT NULL, 
	contrasena					NVARCHAR (70) NOT NULL UNIQUE,		
	pago_Online					NVARCHAR (15) NOT NULL,													/*CONSTRAINT dfPagoOnlineAgenciaViajes DEFAULT N'NO'*/
	num_CuentaPagosOnline		NVARCHAR (35),
	roll						NVARCHAR(70) DEFAULT N'agenciaviajes' NOT NULL,
						
	CONSTRAINT PkAgenciaViajes PRIMARY KEY (cod_AgenciaViajes),
	
	CONSTRAINT FkCompaniaBusHabitual
			FOREIGN KEY (cod_CompaniaBusHabitual) REFERENCES AGENCIABUSES (cod_AgenciaBuses) ON UPDATE CASCADE ON DELETE CASCADE
	);
			/*	CONSTRAINT ckValTelefonoDeReservaAgenciaViajes CHECK (UPPER (telefonoDeReserva) in ('SI','NO') or (ISNUMERIC (telefonoDeReserva) = 1)), */
			/*	CONSTRAINT ckValDfTelefonoAgenciaAgenciaViajes CHECK (UPPER (telefonoAgencia) in ('SI','NO') or (ISNUMERIC (telefonoAgencia) = 1)),  */
			/*	CONSTRAINT ckValPagoOnlineAgenciaViajes CHECK (UPPER (pagoOnline) in ('SI','NO'))	*/


----------------------------------------------------------------------------------------------------------------------------------------------------------------

 --4 SqlServer
 CREATE TABLE DESTINO (
	cod_Destino				INT identity (1,1) NOT NULL,
	nombre_Lugar			NVARCHAR (50) NOT NULL,
	prov_Depart				NVARCHAR (50) NOT NULL,
	com_Reg					NVARCHAR (50) NOT NULL,
	pais					NVARCHAR (20) CONSTRAINT dfpaisDestino DEFAULT N'España',	
	dia_Semana				NVARCHAR (15) NOT NULL,
	fecha_Viaje				NVARCHAR (15) NOT NULL,  /*TIME			 DEFAULT  (N'19:00:00') NOT NULL,*/
	/*agencia_Oferta		NVARCHAR (100) NOT NULL, /*A eliminar*/*/
	cod_AgenciaViajes		INT NOT NULL,
	kilometrosIdaVuelta		INT NOT NULL,
	euros					MONEY		  DEFAULT  (14) NOT NULL,			/*euros_Adulto y euros_Niño falta*/ /*tiempo_viaje*/
	cod_Bus					INT NOT NULL,						
/*											   				                           
	direcion_Salida			NVARCHAR (100)   DEFAULT  (N'Estación de autobuses')NOT NULL,
	hora_Salida				TIME			 DEFAULT  (N'08:00:00.0000000') NOT NULL,

	direcion_Vuelta			NVARCHAR (100)	 DEFAULT  (N'Salida de la playa') NOT NULL,
	hora_Vuelta				TIME			 DEFAULT  (N'19:00:00') NOT NULL,
*/

	CONSTRAINT pkDESTINO	
		PRIMARY KEY (cod_destino/*nombre_Lugar,prov_Depart,com_Reg*/),		/*Decido cod_destino como clave primaria ya que puede haber registros duplicados*/

		CONSTRAINT cKdfpaisDestino CHECK ((pais) in ('España','Francia','Portugal')),
		
 	CONSTRAINT FkCodBusDestino
		FOREIGN KEY (cod_Bus) REFERENCES BUS (cod_Bus) ON UPDATE CASCADE ON DELETE CASCADE,

	CONSTRAINT FkCodAgenciaViajes
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) /*ON UPDATE CASCADE ON DELETE CASCADE,*/

);


--4.5 SqlServer
CREATE TABLE AGENCIAVIAJESDESTINO(
	cod_AgenciaViajesDestino	INT identity (1,1) NOT NULL,
	cod_AgenciaViajes			INT NOT NULL, 
	cod_Destino					INT NOT NULL, 

	CONSTRAINT pkAgenciaViajesDestino	
		PRIMARY KEY (cod_AgenciaViajesDestino),	

 	CONSTRAINT FkCodAgenciaViajesDestino
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,

	CONSTRAINT FkCodDestino
		FOREIGN KEY (cod_Destino) REFERENCES DESTINO (cod_Destino) /*ON UPDATE CASCADE ON DELETE CASCADE*/
);


--5 SqlServer
  CREATE TABLE CLIENTE(
	cod_Cliente		INT identity (1,1) NOT NULL,
	fecha_inscripcion  DATE DEFAULT GETDATE () NOT NULL,
	username        NVARCHAR (20) NOT NULL UNIQUE,							/*Para que solo devuelva un solo elemento contraseña en el array*/
	nombre			NVARCHAR (20) NOT NULL,   apellidos	NVARCHAR (50) NOT NULL,	 nif NVARCHAR (15) NOT NULL,

	TlfnoParticular NVARCHAR (10)  NOT NULL, email NVARCHAR (100) NOT NULL UNIQUE, fNacimiento DATE NOT NULL, sexo NVARCHAR NOT NULL,
	calle			NVARCHAR(50)  NOT NULL,		cp		NCHAR (5)  NOT NULL,	localidad	NVARCHAR(50)  NOT NULL, provincia	NVARCHAR(15)  NOT NULL,
	comunidad		NVARCHAR(15)  NOT NULL,		pais	NVARCHAR (10) NOT NULL,	contrasena	NVARCHAR (70) NOT NULL,	roll        NVARCHAR(70) DEFAULT N'cliente' NOT NULL,

	CONSTRAINT pkCLIENTE
		PRIMARY KEY (cod_Cliente)
);

 -----------------------------------------------------------------------------------------
--6	SqlServer
CREATE TABLE AGENCIAVIAJESCLIENTE(
 cod_AgenciaViajesCliente INT identity (1,1) NOT NULL, 
 cod_AgenciaViajes	INT /*identity (1,1) */ NOT NULL,  
 cod_Cliente		INT /*identity (1,1) */ NOT NULL,
 fecha_Inscripcion  DATE DEFAULT GETDATE () NOT NULL,

	CONSTRAINT pkAGENCIACLIENTE
			PRIMARY KEY (cod_AgenciaViajes , cod_Cliente),
  
 
 	CONSTRAINT FkCodAgenciaViajesCliente
			FOREIGN KEY (cod_AgenciaViajes)
			REFERENCES AGENCIAVIAJES (cod_AgenciaViajes)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT FkCodiCliente
			FOREIGN KEY (cod_Cliente) REFERENCES CLIENTE (cod_Cliente) ON UPDATE CASCADE ON DELETE CASCADE)
 ;
-- ----------------------------------------------------------------------------------------------------------
--7 SqlServer
CREATE TABLE VIAJAR(
	cod_Viajar		INT IDENTITY (1,1) NOT NULL,
	cod_Destino		INT NOT NULL,				
	cod_Cliente		INT NOT NULL, 
	cod_Bus INT NOT NULL, 
	plaza_Bus INT NOT NULL,

	CONSTRAINT pkVIAJAR
	PRIMARY KEY (cod_Destino,cod_Cliente),  

	CONSTRAINT FkCodDestinoViajar		FOREIGN KEY (cod_Destino)	REFERENCES DESTINO	(cod_Destino),
	CONSTRAINT FkCodCliente		FOREIGN KEY (cod_Cliente)	REFERENCES CLIENTE	(cod_Cliente) on update cascade ON DELETE CASCADE,
	CONSTRAINT FkIdBus			FOREIGN KEY (cod_Bus)		REFERENCES BUS		(cod_Bus) on update cascade ON DELETE CASCADE);

------------------------------------------------------------
------------------------------------------------------------

--1 SqlServer
INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_Inscripcion, nombre,nif,direccion,cp, localidad,provincia,comunidad,pais,email,
							telefono_Reserva,telefono_Agencia,horario_Agencia,pago_Online,numero_Cuenta,username,contrasena,roll)

VALUES (default,'Yanguas','A48265169','C/ Marques de Covarrubias 5','26003',   'Alberite', 'La Rioja','La Rioja','España',  'yanguas@yanguas.com',
				'637117965','941-20-20-20', '10:15:00 a 13:30:00 y 17:00:00 a 19:45:00','SI','ES650123456789', 'yanguas21','$2y$10$91YosuvjXJim4.6eZcQccehkPJVKVNKjLbiJ9SJaGBoyUrThGNGDW',default),	
				--username-> yanguas21		contrasena->yanguas21

		(default,'Autobuses Riojacar','A234567891','Calle la Nevera, 12','26006',    'Logroño','La Rioja','La Rioja','España',  'riojacar@riojacar.com',
				'941 50 02 00','941 50 02 00', '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65123456789',
				'riojacar21','$2y$10$FyUtPdH/FpUDdtmEfg697emLusRh8l9wdRmdc9uEbYDd1aKbUazVi',default),	
				--username=> riojacar21     contrasena=> riojacar21

		(default,'Victor Bayo','B40156598','C/ Mayor, nº 10','40551','Campo de San Pedro','Segovia','Castilla y León','España',	'victorbayo@victorbayo.com',
				'921 55 60 35','921 55 63 36', /*Lunes a viernes: 10:00-13:00 ; 17:00-19:00*/' 10:00 a 13:00 ; 17:00 a 19:00','SI','ES65412569863',
				'victorbayo21','$2y$10$WzAOf40fn03oxdAJ8cjUpuYWMo7zFgJfR.1Fm4j4ZMzlraNgeXZAG',default),
				--username=> victorbayo21     contrasena=> victorbayo21    

		(default,'Logrobus','A00125478','Calle Rodejón, 24','26006','Logroño','La Rioja','La Rioja','España',	'logrobus@logrobus.com',
				'609411262',' 941 26 33 51', /*Lunes a viernes: 10:00-13:00 ; 17:00-19:00*/' 10:00 a 13:00 ; 17:00 a 19:00','SI','ES65547896258',
				'logrobus21','$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy',default),
				--username=> logrobus21     contrasena=> logrobus21          /*Mirar que tiene unas animaciones muy bueneas de telefono, mundo y relog*/
				      
		(default,'Autobuses Jimenez','A48265190','C/ Santa María 8','26006',   'Logroño','La Rioja','La Rioja','España',	'jimenez@jimenez.com',
				'941 20 27 77','941 20 27 77',  '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65234567890',
				'jimenez21','$2y$10$YEqrNDwx800/PG7gxhS2iOtcNgwtE09c2B1Mxn4aJg60bBJuAkfuS',default);	
				--username=> jimenez21      contrasena=> jimenez21

-- use proyectoplayasDefinitivo;
--DELETE FROM AGENCIABUSES WHERE username='logrobus21' AND contrasena='$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy';
-- use proyectoplayasDefinitivo;
-- SELECT * FROM agenciabuses;
-- SELECT DISTINCT nombre FROM AGENCIAVIAJES;
-- DROP TABLE AGENCIABUSES;
-- DELETE FROM DESTINO;
--DELETE FROM CLIENTE;/*where username='edu82'*/; SELECT * FROM VIAJAR;  /*Hace lo de la cascada*/



-- SELECT c.nombre,c.apellidos,c.tlfnoParticular FROM CLIENTE c INNER JOIN VIAJAR v on c.cod_Cliente = v.cod_Cliente;

/*
SELECT			d.cod_Destino,	d.nombre_Lugar, d.fecha_Viaje,
                    av.nombre, av.telefono_Reserva,	av.lugar_SalidaPredeterminado,
                    v.cod_Bus,v.plaza_Bus FROM VIAJAR v

                    INNER JOIN DESTINO d ON v.cod_Destino=d.cod_Destino
                    INNER JOIN AGENCIAVIAJES av ON d.agencia_Oferta=av.nombre
                    WHERE v.cod_Cliente=1;
*/

-- select datename(dw,'2021-08-19');  --Para saber el dia de la semana a partir de una fecha
--SELECT DISTINCT nombre_Lugar FROM DESTINO; 

/*
SELECT cod_Destino,nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,agencia_Oferta,euros FROM DESTINO 
where fecha_Viaje >=CAST( DATEADD(DAY, -0,GETDATE()) AS DATE)  ORDER BY fecha_Viaje asc;
*/

-- SELECT * FROM DESTINO WHERE dia_Semana='Viernes';
/*
	-- alter table PERSONALAGENCIAVIAJES
	-- drop constraint FkCodAgenciaViajes;   -- Con esto reviento la foránea y puedo borrar la tabla pero los registros se borran tambien --
	-- DROP TABLE AGENCIAVIAJES;
	-- ALTER TABLE AGENCIAvIAJES
	-- NOCHECK CONSTRAINT ckValTelefonoDeReservaAgencia; 

SELECT TOP (1000) [idUsuario],[nombre] FROM [agenciaviajes].[dbo].[usuario]
/*UPDATE CLIENTE SET username='adrian82' nombre='a', apellidos='a', nif='a',TlfnoParticular='a', email='algo@algo.com',fNacimiento='2021-06-15',sexo='H', calle='a',cp='a', localidad=' a ',provincia='a',comunidad='a',pais='a',contrasena='$2y$10$5/My3xwoVqGfMSVanaqhi.CRedVaQofWkSCluo4KkcdthSoTT2L46' WHERE contrasena='alberite';*/
*/






--2 SqlServer
INSERT INTO BUS (tipo_Bus,plazas,matricula,ano_Matriculacion,cod_AgenciaBuses) 
	VALUES  ('Grande','54','LO-6497-M',2000,1),
			('Grande','54','LO-6498-M',2000,2),
			('Grande','54','LO-6499-M',2000,3);

--UPDATE BUS SET tipo_Bus='Minibus', plazas='19', matricula='8796 JHY', ano_Matriculacion='9999' WHERE cod_Bus='19';


--3 SqlServer
INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/fecha_Inscripcion,nombre,nif,direcion,cp,
											localidad,provincia,comunidad,pais,
											email,telefono_Reserva,telefono_Agencia,
											horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual, 
											username,contrasena,
											pago_Online,num_CuentaPagosOnline)

	VALUES (default,'Gran Reserva','A48265169','C/ Vara de Rey 42','26003',
	'Logroño','La Rioja','La Rioja','España',
	'yanguas@yanguas.com','602263181','602263181',
	'09:30:00 a 13:00:00 y 17:15:00 a 19:45:00','Estación de autobuses (Logroño)',1,
	'reser21','$2y$10$T.k.0Xfk3If3FPDJZnlKl.D6ByRd2..N4X2tHgKO.kYNa2iModk1O',
	'SI','ES650123456789'),																		--Agencia de Viajes: Gran Reserva  username:reser21  contraseña:reser21

	(default,'GO TRAVELL','B26562918','C/ Avenida de la Solidaridad 9','26003',
	'Logroño','La Rioja','La Rioja','España',
	'gotravell@gotravell.com','653107390','643674634',
	'10:15:00 a 13:15:00 y 17:00:00 a 20:00:00','C/ Avenida de la Solidaridad 9',2,
	'gotravell21','$2y$10$rwK1HGaQotvT0dkt9G3Fhu/4.55cZ2WEOxY.UP1VwCT/7RWnjpNkC',
	'SI','ES65987654321'),																		--Agencia de Viajes: username:gotravell21  contrasena:gotravell21

	(default,'ROTUPRINT','B00000000','C/ Cantabria, 3 - BJ','26004',					
	'Logroño','La Rioja','La Rioja','España',
	'rotuprint@rotuprintrioja.com.','941235217','941235217',
	'10:15:00 a 13:15:00 y 17:00:00 a 20:00:00','Varias Paradas',3,
	'rotu21','$2y$10$eO.U2FPgNtbGBgnRvvvsY.tpFGDoXCOmxZJXBAp0gAG5EqlsiDsbq',					--Agencia de Viajes: username:rotuprint21  contrasena:rotu21
	'SI','ES65987654321'),	

	(default,'Azul Marino','SIC 4722','C/Gran Vía, 45 entrada por, Calle Lardero','26002',
	'Logroño','La Rioja','La Rioja','España',
	'azulmarino@azulmarino.com','941 899 200','941 899 200',
	'10:15:00 a 14:00:00 y 16:30:00 a 20:00:00',default,4,
	'azulmarino21','$2y$10$B.aNV5BQo8K7BwtQLs0lXuzLbjrmLkQ6j6A/rzSXTCHmi1YjQ373q',				--Agencia de Viajes: username:azulmarino21	contraseña:azulmarino21
	'NO','NO');
 




/*4 SqlServer*/
INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_AgenciaViajes,kilometrosIdaVuelta,euros,cod_bus)  /*Dia de la semana*/
						VALUES	
					/*	('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-07-16'),'2021-07-16','Gran Reserva',132,12,1),
						('San Sebastián','Guipúzcoaa','Pais Vasco','España',datename(dw,'2021-07-17'),'2021-07-17','Gran Reserva',102,12,1),
						('Santander','Cantabria','Cantabria','España',datename(dw,'2021-07-18'),'2021-07-18','Gran Reserva',157,12,1),
						('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-23'),'2021-07-23','Gran Reserva',174,12,1),

						('Plentzia','Cantabria','Cantabria','España',datename(dw,'2021-07-24'),'2021-07-24','Gran Reserva',119,12,1),
						('Fuenterrabia','Bizkaia','Pais Vasco','España',datename(dw,'2021-07-25'),'2021-07-25','Gran Reserva',183,12),
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-07-30'),'2021-07-30','Gran Reserva',157,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-31'),'2021-07-31','Gran Reserva',174,12),

						('Zumaia','Cantabria','Cantabria','España',datename(dw,'2021-08-01'),'2021-08-1','Gran Reserva',165,14),
						('San Sebastián','Guipúzcoaa','Pais Vasco','España',datename(dw,'2021-08-06'),'2021-08-06','Gran Reserva',102,12),
						('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-08-07'),'2021-08-07','Gran Reserva',118,14),	
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-08-08'),'2021-08-08','Gran Reserva',157,12),
						('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-08-13'),'2021-08-13','Gran Reserva',118,14),	
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-08-14'),'2021-08-14','Gran Reserva',157,12),
						('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-08-15'),'2021-08-15','Gran Reserva',132,12),
						('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-08-20'),'2021-08-20','Gran Reserva',132,12,2),

					*/	('Zumaia','Cantabria','Cantabria','España',datename(dw,'2021-08-21'),'2021-08-21','1',165,14,2),
						('Plentzia','Cantabria','Cantabria','España',datename(dw,'2021-08-22'),'2021-08-22','1',119,12,2),
						('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-27'),'2021-08-27','1',174,12,2),
						('Fuenterrabia','Bizkaia','Pais Vasco','España',datename(dw,'2021-08-28'),'2021-08-28','1',183,12,2),
						('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-08-29'),'2021-08-29','1',118,14,2),


					/*	('San Sebastián','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-14'),'2021-07-14','GO TRAVELL',174,12),
						('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-07-17'),'2021-07-17','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-07-18'),'2021-07-18','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España', datename(dw,'2021-07-21'),'2021-07-21','GO TRAVELL',174,12),

						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-07-24'),'2021-07-24','GO TRAVELL',193,12),
						('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-07-25'),'2021-07-25','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-07-28'),'2021-07-28','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España', datename(dw,'2021-07-31'),'2021-07-31','GO TRAVELL',174,12),

						('Santander','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-01'),'2021-08-01','GO TRAVELL',157,14),
						('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-04'),'2021-08-04','GO TRAVELL',174,12),
						('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-08-07'),'2021-08-07','GO TRAVELL',174,12),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-08'),'2021-08-08','GO TRAVELL',284,12),
						('Fuenterrabia','Bizkaia','País Vasco','España',datename(dw,'2021-08-11'),'2021-08-11','GO TRAVELL',183,14),
						('San Sebastián','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-14'),'2021-08-14','GO TRAVELL',174,12),
						('Zarautz','Guipuzkoa','Pais Vasco','España', datename(dw,'2021-07-15'),'2021-08-15','GO TRAVELL',174,12),
						('Noja','Cantabria','Cantabria','España',datename(dw,'2021-07-18'),'2021-08-18','GO TRAVELL',174,12),
					*/	('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-08-21'),'2021-08-21','2',118,14,2),
						('San Sebastián','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-22'),'2021-08-22','2',174,12,2),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-25'),'2021-08-25','2',193,12,2),
						('Hendaya','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-28'),'2021-08-28','2',174,12,2),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-29'),'2021-08-29','2',193,12,2),


					/*	('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-18'),'2021-07-18','Azul Marino',174,12),
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-07-25'),'2021-07-25','Azul Marino',193,12),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-1'),'2021-08-01','Azul Marino',284,12),
						('Santander','Guipuzkoa','Pais Vasco','España', datename(dw,'2021-08-08'),'2021-08-08','Azul Marino',157,12),
                    */


					/*	('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-07-02'),'2021-07-02','Playa Bus',132,14),
						('Santander','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-03'),'2021-07-03','Playa Bus',157,14),
						('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-07-05'),'2021-07-05','Playa Bus',118,14),
						('Fuenterrabia','Bizkaia','País Vasco','España',datename(dw,'2021-07-07'),'2021-07-07','Playa Bus',183,14),
						('Noja','Cantabria','Cantabria','España', datename(dw,'2021-07-09'),'2021-07-09','Playa Bus',174,14), /*Falta más fechas*/
						('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-07-10'),'2021-07-10','Playa Bus',193,14),
						('Orio','Guipuzcoa','País Vasco','España',datename(dw,'2021-07-12'),'2021-07-12','Playa Bus',168,14),
						('Plentzia','Bizkaia','País Vasco','España',datename(dw,'2021-07-13'),'2021-07-13','Playa Bus',164,14),
						('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-14'),'2021-07-14','Playa Bus',174,14),
						('Somo','Cantabria','Cantabria','España',datename(dw,'2021-07-16'),'2021-07-16','Playa Bus',224,14),
						('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-07-17'),'2021-07-17','Playa Bus',284,12),
						('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-07-19'),'2021-07-19','Playa Bus',118,14),
						('Zumaia','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-20'),'2021-07-20','Playa Bus',165,14),
						('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-21'),'2021-07-21','Playa Bus',174,14),
						('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-07-23'),'2021-07-23','Playa Bus',132,14),
						('Santander','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-07-24'),'2021-07-24','Playa Bus',157,14),
						('Fuenterrabia','Bizkaia','País Vasco','España',datename(dw,'2021-07-26'),'2021-07-26','Playa Bus',183,14),
						('Plentzia','Bizkaia','País Vasco','España',datename(dw,'2021-07-27'),'2021-07-27','Playa Bus',164,14),
						('Orio','Guipuzcoa','País Vasco','España',datename(dw,'2021-07-28'),'2021-07-28','Playa Bus',168,14),
						('Somo','Cantabria','Cantabria','España',datename(dw,'2021-07-30'),'2021-07-30','Playa Bus',224,14),


							('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-02'),'2021-08-02','Playa Bus',174,14),
							('Castro Urdiales','Cantabria','Cantabria','España',datename(dw,'2021-08-03'),'2021-08-03','Playa Bus',118,14),
							('Zumaia','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-04'),'2021-08-04','Playa Bus',165,14),
							('Noja','Cantabria','Cantabria','España', datename(dw,'2021-08-06'),'2021-08-06','Playa Bus',174,14), /*Falta más fechas*/
							('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-07'),'2021-08-07','Playa Bus',193,14),
							('Fuenterrabia','Bizkaia','País Vasco','España',datename(dw,'2021-08-09'),'2021-08-09','Playa Bus',183,14),
							('Plentzia','Bizkaia','País Vasco','España',datename(dw,'2021-08-10'),'2021-08-10','Playa Bus',164,14),
							('Guetaria','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-11'),'2021-08-11','Playa Bus',171,14),
							('Santander','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-14'),'2021-08-14','Playa Bus',157,14),
							('Castro Urdiales','Cantabria','Cantabria','España', datename(dw,'2021-08-16'),'2021-08-16','Playa Bus',118,14),
							('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-17'),'2021-08-17','Playa Bus',174,14),
							('Fuenterrabia','Bizkaia','País Vasco','España',datename(dw,'2021-08-18'),'2021-08-18','Playa Bus',183,14),
							('Somo','Cantabria','Cantabria','España',datename(dw,'2021-08-20'),'2021-08-20','Playa Bus',224,14,2),
						*/	('Biarritz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-08-21'),'2021-08-21','3',284,12,2),
							('Orio','Guipuzcoa','País Vasco','España',datename(dw,'2021-08-23'),'2021-08-23','3',168,14,2),
							('Plentzia','Cantabria','Cantabria','España',datename(dw,'2021-08-24'),'2021-08-24','3',119,12,2),
							('Zarautz','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-25'),'2021-08-25','3',174,14,3),
							('Noja','Cantabria','Cantabria','España', datename(dw,'2021-08-27'),'2021-08-27','3',174,14,3), /*Falta más fechas*/
							('San Sebastián','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-08-28'),'2021-08-28','3',174,12,3),
							('Castro Urdiales','Cantabria','Cantabria','España', datename(dw,'2021-08-30'),'2021-08-30','3',118,14,3),
							('Zarautz','Guipuzkoa','Pais Vasco','España', datename(dw,'2021-08-31'),'2021-08-31','3',174,12,3),
							

							('Zumaia','Guipuzkoa','Pais Vasco','España',datename(dw,'2021-09-01'),'2021-09-01','4',165,14,3),
							('Laredo','Cantabria','Cantabria','España',datename(dw,'2021-09-03'),'2021-09-03','4',132,14,3),
							('San Juán de Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',datename(dw,'2021-09-04'),'2021-09-04','4',193,14,3);


/*5 Sql Server*/
INSERT INTO CLIENTE(username,nombre,apellidos,nif,TlfnoParticular,email,fNacimiento,sexo,calle,cp,localidad,provincia,comunidad,pais,contrasena,roll)
				VALUES(/*codCliente*/'adri82','Adrián','Laya García','16606852R','637117965','superlaya50@gmail.com','1982-06-17','H', 
					'Obispo Blanco Nájera 7, 5ºA','26004','Logroño',
					'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','admin'),		--	Username=>adri82,	Contraseña=>alberite    roll=>admin
					(/*codCliente*/'edu82','Eduardo','Hormilla Urraca','00000000A','637117965','medico50@medico.com','1982-01-01','H', 
					'Obispo Blanco Nájera 7, 3ºD','26004','Logroño',
					'La Rioja','La Rioja','España','$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','cliente'),	--	Username=>edu82,	Contraseña=>alberite	roll=>cliente
					(/*codCliente*/'dayanna82','Dayanna','Syrbley Carrero','01234567R','123456789','dayanna50@dayanna50.com','2021-07-19','H', 
					'C/ Venezuela 8 5ºA','44003','Navarrete',
					'La Rioja','La Rioja','España','$2y$10$OF92TCIRXBH1giDrajCFou.muTfFstu7GA/qxVfxvi1RF.aWGq4ma','cliente');	--	Username=>dayanna82	Contrasena=>venezuela	roll=>cliente




-- INSERT INTO VIAJAR (cod_Destino,cod_Cliente,cod_Bus,plaza_Bus) VALUES   (1053,1,8,39);
-- INSERT INTO VIAJAR (cod_Destino,cod_Cliente,cod_Bus,plaza_Bus) VALUES   (1053,2,8,29);



	/*6 SqlServer*/				
-- Los valores dependerán de los datos de otras tablas que hemos metido --
INSERT INTO AGENCIAVIAJESCLIENTE ( cod_AgenciaViajes,cod_Cliente,fecha_Inscripcion) VALUES (2,1,default);				
INSERT INTO AGENCIAVIAJESCLIENTE ( cod_AgenciaViajes, cod_Cliente/*,fechaInscripcion*/) VALUES (1,1);
SELECT * FROM AGENCIAVIAJESCLIENTE; DROP TABLE AGENCIAVIAJESCLIENTE;
DROP TABLE CLIENTE;	
--------------------------------------------------------------------------------------------------------------------------------------------------------------	
--------------------------------------------------------------------------------------------------------------------------------------------------------------	

CREATE TABLE DESTINOBUS(
cod_DestinoBus	INT identity (1,1) NOT NULL, 
cod_Destino		INT  NOT NULL, 
cod_Bus			INT NOT NULL,

CONSTRAINT pkDESTINOBUS
	PRIMARY KEY (cod_Destino, cod_Bus),


	CONSTRAINT FkCodDestinoDestinoBus
			FOREIGN KEY (cod_Destino)
			REFERENCES DESTINO (cod_Destino)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT FkCodBusDestinoBus
			FOREIGN KEY (cod_Bus)
			REFERENCES BUS (cod_Bus)
			on update cascade
			ON DELETE CASCADE,
);

SELECT * FROM DESTINOBUS;
SELECT * FROm AGENCIAVIAJES;



-- ---------------------------------------------------------------------------------------------------------------------



















------------------------------------------
 CREATE TABLE PERSONALAGENCIABUSES (
	codTrabajador		INT identity (1,1) NOT NULL,
	apellidos			NVARCHAR (50) NOT NULL,	
	nombre				NVARCHAR (20) NOT NULL,	
	sexo				NVARCHAR CONSTRAINT dfSexoPERSONALAGENCIABUSES DEFAULT N'M' NOT NULL,
	nif					NVARCHAR (10) NOT NULL,																-- Mirar esto para nif  https://ocw.unizar.es/ciencias-experimentales/modelos-matematicos-en-bases-de-datos/diseno/DisenoProgramacion.pdf
	fNacimiento			DATE		  NOT NULL,
	Calle			NVARCHAR(50) NOT NULL,
	Cp				NCHAR (5)  NOT NULL,
	Ciudad			NVARCHAR(50) NOT NULL,
	Provincia		NVARCHAR(15) NOT NULL,
	nacionalidad	NVARCHAR (10) NOT NULL,	
	TlfnoParticular NVARCHAR (10) CONSTRAINT dfTlfnoParticularPERSONALAGENCIABUSES DEFAULT N'NO TIENE' NOT NULL,
	email			NVARCHAR (100) DEFAULT N'-NO TIENE-'NOT NULL,
/*	codAgenciaAutobus  INT     /*identity (001,001)*/ NOT NULL, */
	puesto			NVARCHAR (10) NOT NULL

	CONSTRAINT pkPERSONALAGENCIABUSES
			PRIMARY KEY (codTrabajador),

/*	CONSTRAINT fkCodAgenciaAutobusPERSONALAGENCIABUSES
			FOREIGN KEY (codAgenciaAutobus)
			REFERENCES AGENCIABUSES (codAgenciaAutobus)
			on update cascade
			ON DELETE CASCADE,*/
			
	CONSTRAINT ckValSexoPERSONALAGENCIABUSES
		CHECK (UPPER (sexo) in ('H','M')),

 );
								-- Mirar esto para nif  https://ocw.unizar.es/ciencias-experimentales/modelos-matematicos-en-bases-de-datos/diseno/DisenoProgramacion.pdf

 INSERT INTO PERSONALAGENCIABUSES(/*codTrabajador,*/apellidos,nombre,sexo,nif,fNacimiento,Calle,Cp,Ciudad,Provincia,nacionalidad,TlfnoParticular,email,/*codAgenciaAutobus,*/puesto)
	VALUES(/*codTrabajador,*/N'Laya García',N'Adrián',N'H',N'16606852R',N'19820617',N'C/Obispo Blanco Nájera 7 5ºA',26004,N'Logroño',N'La Rioja',N'La Rioja',N'637117965',N'superlaya50@gmail.com',/*1,*/N'Chofer')  -- Tiene que estar la respectiva compañia creada su código, si nó no lo mete el registro --
 ;

 --DROP TABLE PERSONALAGENCIABUSES;
 --SELECT * FROM PERSONALAGENCIABUSES;
 ------------------------------------------------------------








 */








 


-- ----------------------------------------------------------------------------------------------
CREATE TABLE PERSONALAGENCIAVIAJES (
	codTrabajador		INT identity (1,1) NOT NULL,
	apellidos			NVARCHAR (50) NOT NULL,	
	nombre				NVARCHAR (20) NOT NULL,	
	sexo				NVARCHAR CONSTRAINT dfSexoPERSONALAGENCIAVIAJES DEFAULT N'M' NOT NULL,
	nif					NVARCHAR (10) NOT NULL,															-- Mirar esto para nif  https://ocw.unizar.es/ciencias-experimentales/modelos-matematicos-en-bases-de-datos/diseno/DisenoProgramacion.pdf
	fNacimiento			DATE		  NOT NULL,
	calle			NVARCHAR(30) NOT NULL,
	cp				NCHAR (5)  NOT NULL,
	ciudad			NVARCHAR(50) NOT NULL,
	provincia		NVARCHAR(15) NOT NULL,
	pais			NVARCHAR (10) NOT NULL,	
	tlfnoParticular NVARCHAR (10) CONSTRAINT dfTlfnoParticularPERSONALAGENCIAVIAJES DEFAULT N'NO TIENE' NOT NULL,
	email			NVARCHAR  (100) DEFAULT N'-NO TIENE-' NOT NULL,
	/*codAgenciaViajes  INT     /*identity (001,001)*/ NOT NULL,*/
	puesto			NVARCHAR (10) NOT NULL

	CONSTRAINT pkPERSONALAGENCIAVIAJES
			PRIMARY KEY (codTrabajador),

	CONSTRAINT ckTlfnoParticularPERSONALAGENCIAVIAJES
		CHECK (UPPER (tlfnoParticular) in ('SI','NO','??') or 
			  (ISNUMERIC (tlfnoParticular) = 1)), 

/*	CONSTRAINT FkCodAgenciaViajesPERSONALAGENCIAVIAJES
			FOREIGN KEY (codAgenciaViajes)
			REFERENCES AGENCIAVIAJES (codAgenciaViajes)
			on update cascade
			ON DELETE CASCADE,*/

	CONSTRAINT ckValSexoPersonalAgenciaViajes
		CHECK (UPPER (sexo) in ('H','M')),
 );
																																						-- DROP TABLE PERSONALAGENCIAVIAJES;


 INSERT INTO PERSONALAGENCIAVIAJES (/*codTrabajador,*/apellidos,nombre,sexo,nif,fNacimiento,calle,cp,ciudad,provincia,pais,tlfnoParticular,email,/*codAgenciaViajes,*/puesto)
	VALUES(N'Laya García',N'Adrián',N'H',N'16606852R',N'19820617',N'C/Obispo Blanco Nájera 7 5ºA',26004,N'La Rioja',N'La Rioja',N'España',637117965,N'superlaya50@gmail.com',/*1,*/N'director') -- EL codAgenciaViajes SI EXISTE METE EL REGISTRO --
 ;

  drop table PERSONALAGENCIAVIAJES;
 --SELECT * FROM PERSONALAGENCIAVIAJES;

 --------------------------------------------------------------------------------------------------


 

 CREATE TABLE PERSONALAGENCIAVIAJESAGENCIAVIAJES(
	codTrabajador INT NOT NULL, 
	codAgenciaViajes INT NOT NULL,
	fechaincripcion  DATE DEFAULT GETDATE () NOT NULL,


	CONSTRAINT pkPERSONALAGENCIAVIAJESAGENCIAVIAJES
			PRIMARY KEY (codTrabajador , codAgenciaViajes),


 	CONSTRAINT FkcodAgenciaViajess
			FOREIGN KEY (codAgenciaViajes)
			REFERENCES AGENCIAVIAJES (codAgenciaViajes)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT FkCodAgenciaViajes
			FOREIGN KEY (codTrabajador)
			REFERENCES PERSONALAGENCIAVIAJES (codTrabajador)
			on update cascade
			ON DELETE CASCADE)
 ;

 
 drop table PERSONALAGENCIAVIAJESAGENCIAVIAJES;


/* 
	INSERT INTO PERSONALAGENCIAVIAJESAGENCIAVIAJES (codTrabajador, codAgenciaViajes, fechaincripcion) 
		VALUES(1,1,default);
*/
--SELECT * FROM PERSONALAGENCIAVIAJESAGENCIAVIAJES;

 -- ------------------------------























 
  CREATE TABLE AGENCIABUSESPERSONALAGENCIABUSES(
	codTrabajador INT NOT NULL, 
	codAgenciaAutobus INT NOT NULL,
	fechaincripcion  DATE DEFAULT GETDATE () NOT NULL,


	CONSTRAINT AGENCIABUSESPERSONALAGENCIABUSESS
			PRIMARY KEY (codTrabajador , codAgenciaAutobus),


 	CONSTRAINT FkcodAgenciaAutobusS
			FOREIGN KEY (codAgenciaAutobus)
			REFERENCES AGENCIABUSES (codAgenciaAutobus)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT FkcodTrabajador
			FOREIGN KEY (codTrabajador)
			REFERENCES  PERSONALAGENCIABUSES(codTrabajador)
			on update cascade
			ON DELETE CASCADE)
 ;

drop table AGENCIABUSESPERSONALAGENCIABUSES;
-- SELECT * FROM AGENCIABUSESPERSONALAGENCIABUSES;









--3
 CREATE TABLE BUSAGENCIABUSES(
	cod_Bus INT NOT NULL, 
	cod_AgenciaBus INT NOT NULL,
	fechaincripcion  DATE DEFAULT GETDATE () NOT NULL,


	CONSTRAINT AUTOBUSESAGENCIABUSES
			PRIMARY KEY (cod_Bus , cod_AgenciaBus),

	CONSTRAINT FkcodBus
			FOREIGN KEY (cod_Bus)
			REFERENCES BUS (cod_Bus)
			on update cascade
			ON DELETE CASCADE,


 	CONSTRAINT FkcodAgenciaAutobus
			FOREIGN KEY (cod_AgenciaBus)
			REFERENCES AGENCIABUSES(cod_AgenciaBus)
			on update NO ACTION
			ON DELETE NO ACTION,
)
 ;

 --DROP TABLE BUSAGENCIABUSES;
 --DROP TABLE DESTINO;
 --DROP TABLE BUS;
 --DROP TABLE AGENCIABUSES;
 --SELECT * FROM BUSAGENCIABUSES;
 --SELECT * FROM AGENCIABUSES;
 --SELECT * FROM AGENCIAVIAJES;
 











 				/*	CONSTRAINT ckValTelefonoDeReservaAgenciaViajes CHECK (UPPER (telefonoDeReserva) in ('SI','NO') or (ISNUMERIC (telefonoDeReserva) = 1)), */
				/*	CONSTRAINT ckValDfTelefonoAgenciaAgenciaViajes CHECK (UPPER (telefonoAgencia) in ('SI','NO') or (ISNUMERIC (telefonoAgencia) = 1)),  */
				/*	CONSTRAINT ckValPagoOnlineAgenciaViajes CHECK (UPPER (pagoOnline) in ('SI','NO'))	*/