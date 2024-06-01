-- Dibujar el esquema de Entidad-Relación --
--Vamos a seguir la lógica: 1 Crear las agencias.
-- https://gestionbasesdatos.readthedocs.io/es/stable/Tema3/Actividades.html  para hacer ejercicios -- Muy util
-- En el futuro, una pantalla de dar de alta nuevas agencias y demás registros en tablas eligiendo por botón -- Lo hará el administrador 1
-- Meter más con una pantalla con cuadros de campos --

use proyectoplayas1;
go

--------------------------------------------------------------------------------------------------------------------------------------------------------------					
 CREATE TABLE AGENCIAVIAJES(
	codAgenciaViajes    INT identity (001,001) NOT NULL,
	nombre				NVARCHAR (100) NOT NULL,	
	nif					INT NOT NULL,
	direcion			NVARCHAR (70) NOT NULL,	
	localidad			NVARCHAR (20) NOT NULL,	
	provincia			NVARCHAR (20) NOT NULL,	
	comunidad			NVARCHAR (20) NOT NULL,	
	pais				NVARCHAR (10) NOT NULL,	
	lugarSalidaPredeterminado  NVARCHAR (100) NOT NULL,	
	compañiaBusHabitual	NVARCHAR (30) NOT NULL,	
	horarioAgencia	    NVARCHAR (80)  DEFAULT N'10:00 a 13:00 y 17:00 a 20:00' NOT NULL,	
	telefonoDeReserva	NVARCHAR (15)  CONSTRAINT dfTelefonoDeReservaAgenciaViajes DEFAULT N'NO' NOT NULL,	
	telefonoAgencia		NVARCHAR (15)  CONSTRAINT dfTelefonoAgenciaAgenciaViajes DEFAULT N'NO' NOT NULL,
	pagoOnline			NVARCHAR (15)  CONSTRAINT dfPagoOnlineAgenciaViajes DEFAULT N'NO' NOT NULL,
	email				NVARCHAR (100) DEFAULT N'-NO TIENE-' NOT NULL		-- Siempre meter el parentesis que si nó, trunca --
																			-- restricciones y foreign keys (LA DE PERSONAL)
		
		CONSTRAINT PkAgenciaViajes
			PRIMARY KEY (codAgenciaViajes),

		CONSTRAINT ckValTelefonoDeReservaAgenciaViajes 
			CHECK (UPPER (telefonoDeReserva) in ('SI','NO') or 
			(ISNUMERIC (telefonoDeReserva) = 1)), 

		CONSTRAINT ckValDfTelefonoAgenciaAgenciaViajes
			CHECK (UPPER (telefonoAgencia) in ('SI','NO') or 
				  (ISNUMERIC (telefonoAgencia) = 1)), 

		CONSTRAINT ckValPagoOnlineAgenciaViajes
			CHECK (UPPER (pagoOnline) in ('SI','NO'))																																							-- Meter con el tiempo más restricciones --
);

INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/nombre,nif,direcion,localidad,provincia,comunidad,pais,lugarSalidaPredeterminado,compañiaBusHabitual,horarioAgencia,telefonoDeReserva,telefonoAgencia,pagoOnline,email)
	VALUES	(N'PONIENTE',678912345,N'C/Beratua 36',N'Logroño',N'La Rioja',N'La Rioja',N'España',N'General Urrutia',N'Autobuses Jimenez',default,default,N'NO',N'NO',default),
		    (N'GO TRAVEL CLUB "PlayaBus"',234567890,N'Avda. Jorge Vigón 7-9',N'Logroño',N'La Rioja',N'La Rioja',N'España',N'Autobuses Logrobús',N'Avda. Jorge Vigón 7-9',default,N'643674634',N'NO',N'SI',N'info.gotraveltour@gmail.com'),										--Pago online a través de BBVA-PAYGOLD, "GO TRAVEL TOUR" AVDA JORGE VIGÓN 7-9,Logroño-La Rioja
			(N'VIAJES AZUL MARINO',345678901,N'C/Lardero 3',N'Logroño',N'La Rioja',N'La Rioja',N'España',N'Muro de la Mata (Cafetería Ibiza)',N'Autobuses Logrobús',default,default,N'NO',N'NO',default),
			(N'VIAJES GRAN RESERVA',456789123,N'C/Vara de Rey 41',N'Logroño',N'La Rioja',N'La Rioja',N'España',N'Estación de autobuses',N'Autobuses Yanguas',default,N'602263181',N'NO',N'NO',default),																		 --  autobuses propios de Yanguas.   14 adulto 11 euros niño(menores hasta 10años)
			(N'F.R.P. Y JUBILADOS DE CC.OO (LA RIOJA)',567891234,N'C/Pio XII 1',N'Logroño',N'La Rioja',N'La Rioja',N'España',N'Autobuses Riojacar',N'Estación de autobuses',N'Lunes Martes y Miercoles (de 11h a 13h)', N'602263181'/*Con la N*/,N'NO',N'NO',default  )				-- Precio de Billete 12euros (afiliados 10 euros)			
;
-- -----------------------------------
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
	codAgenciaViajes  INT     /*identity (001,001)*/ NOT NULL,
	puesto			NVARCHAR (10) NOT NULL

	CONSTRAINT pkPERSONALAGENCIAVIAJES
			PRIMARY KEY (codTrabajador),

	CONSTRAINT ckTlfnoParticularPERSONALAGENCIAVIAJES
		CHECK (UPPER (tlfnoParticular) in ('SI','NO','??') or 
			  (ISNUMERIC (tlfnoParticular) = 1)), 

	CONSTRAINT FkCodAgenciaViajesPERSONALAGENCIAVIAJES
			FOREIGN KEY (codAgenciaViajes)
			REFERENCES AGENCIAVIAJES (codAgenciaViajes)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT ckValSexoPersonalAgenciaViajes
		CHECK (UPPER (sexo) in ('H','M')),
 );
																																						-- DROP TABLE PERSONALAGENCIAVIAJES;

 INSERT INTO PERSONALAGENCIAVIAJES (/*codTrabajador,*/apellidos,nombre,sexo,nif,fNacimiento,calle,cp,ciudad,provincia,pais,tlfnoParticular,email,codAgenciaViajes,puesto)
	VALUES(N'Laya García',N'Adrián',N'H',N'16606852R',N'19820617',N'C/Obispo Blanco Nájera 7 5ºA',26004,N'La Rioja',N'La Rioja',N'España',637117965,N'superlaya50@gmail.com',1,N'director') -- EL codAgenciaViajes SI EXISTE METE EL REGISTRO --
 ;
 -- ------------------------------
  CREATE TABLE CLIENTE(
	codCliente		INT identity (1,1) NOT NULL,
    apellidos		NVARCHAR (50) NOT NULL,	
    nombre			NVARCHAR (20) NOT NULL,	
	sexo			NVARCHAR CONSTRAINT DfSexoEmpleado DEFAULT N'M' NOT NULL,
	fNacimiento		DATE          NOT NULL,
	Calle			NVARCHAR(50)  NOT NULL,
	Cp				NCHAR (5)     NOT NULL,
	localidad		NVARCHAR(50)  NOT NULL,
	provincia		NVARCHAR(15)  NOT NULL,
	comunidad		NVARCHAR(15)  NOT NULL,
	pais			NVARCHAR (10) NOT NULL,	
	TlfnoParticular NVARCHAR (10)  CONSTRAINT dfTlfnoParticularCliente DEFAULT N'NO TIENE' NOT NULL,
	socio			NVARCHAR (3)   CONSTRAINT dfSocioCliente DEFAULT N'NO' NOT NULL,
	email			NVARCHAR (100) DEFAULT N'-NO TIENE-' NOT NULL,
	fechaSocio      DATE	       CONSTRAINT dfFechaSocioCliente DEFAULT GETDATE () NOT NULL,	

	CONSTRAINT pkCLIENTE
		PRIMARY KEY (codCliente),
		
	CONSTRAINT ckValSexoEmpleado
		CHECK (UPPER (sexo) in ('H','M')),

 	CONSTRAINT ckValTlfnoParticularCliente
		CHECK (TlfnoParticular IN ('NO TIENE','PENDIENTE') OR
		(ISNUMERIC (TlfnoParticular) = 1 AND 
		    	(CAST(TlfnoParticular as BIGINT) BETWEEN 900000000 AND 999999999  OR
			     CONVERT(BIGINT, TlfnoParticular) between  600000000 AND 799999999))),

	CONSTRAINT ckValSocioCliente
		CHECK (UPPER (socio) in ('SI','NO')),

	CONSTRAINT ckValFechaSocioCliente                               
		CHECK (fechaSocio >= DATEADD(D, -5,GETDATE()) AND					-- Para registros 5 dias después--
			   fechaSocio<= DATEADD(D, 2 ,GETDATE())),					-- NI 2 DIAS MAYOR DE LA FECHA ACTUAL --
 );

 INSERT INTO CLIENTE(
 	/*codCliente*/apellidos,nombre,sexo,fNacimiento,Calle,Cp,localidad,provincia,comunidad,pais,TlfnoParticular,email,socio,fechaSocio)
	VALUES(/*codCliente*/N'Laya García', N'Adrián',N'H', N'19820617',N'C/Obispo Blanco Nájera 7 5ºA',26004,N'Logroño',N'La Rioja',N'La Rioja',N'España',637117965,N'superlaya50@gmail.com',N'SI',default)
 ;

-- -----------------------------------
CREATE TABLE AGENCIACLIENTE(
 codAgenciaViajes		INT /*identity (1,1) */ NOT NULL,  
 codCliente		INT /*identity (1,1) */ NOT NULL,
 fechaincripcion  DATE DEFAULT GETDATE () NOT NULL,

	 CONSTRAINT pkAGENCIACLIENTE
			PRIMARY KEY (codAgenciaViajes , codCliente),
  
 	CONSTRAINT FkCodAgenciaViajesCliente
			FOREIGN KEY (codAgenciaViajes)
			REFERENCES AGENCIAVIAJES (codAgenciaViajes)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT FkCodCliente
			FOREIGN KEY (codCliente)
			REFERENCES CLIENTE (codCliente)
			on update cascade
			ON DELETE CASCADE)
 ;

 INSERT INTO AGENCIACLIENTE ( codAgenciaViajes,codCliente,fechaincripcion)  -- Los valores dependerán de los datos de otras tablas que hemos metido --
	VALUES(1,1,default)
 ;

-- ------------------------------------
 CREATE TABLE AGENCIABUSES(
	codAgenciaAutobus   INT identity (1,1) NOT NULL,
	nombre				NVARCHAR (30) NOT NULL,	
	nif					NVARCHAR (10) NOT NULL,		
	direccion			NVARCHAR (70) NOT NULL,	
	localidad			NVARCHAR (20) NOT NULL,	
	provincia			NVARCHAR (20) NOT NULL,	
	comunidad			NVARCHAR (20) NOT NULL,	
	pais				NVARCHAR (10) NOT NULL,	
	horarioAgencia	    NVARCHAR (80) DEFAULT N'10:00 a 13:00 y 17:00 a 20:00' NOT NULL,	
	telefonoDeReserva	NVARCHAR (15) CONSTRAINT dfTelefonoDeReservaAGENCIABUSES DEFAULT N'NO' NOT NULL,	
	telefonoAgencia		NVARCHAR (15) CONSTRAINT dfTelefonoAgenciaAgenciaBuses DEFAULT N'NO' NOT NULL,	
	pagoOnline			NVARCHAR (15) CONSTRAINT dfPagoOnlineAGENCIBUSES DEFAULT N'NO' NOT NULL,
	email				NVARCHAR (100) DEFAULT N'-NO TIENE-'NOT NULL
																-- restricciones y foreign keys (LA DE PERSONAL)
		CONSTRAINT pkAGENCIABUSES
			PRIMARY KEY (codAgenciaAutobus),

		CONSTRAINT ckValdfTelefonoDeReservaAGENCIABUSES
			CHECK (UPPER (telefonoDeReserva) in ('SI','NO') or 
				  (ISNUMERIC (telefonoDeReserva) = 1)), 
				   
		CONSTRAINT ckValDfTelefonoAgenciaAgenciaBuses
			CHECK (UPPER (telefonoAgencia) in ('SI','NO') or 
				  (ISNUMERIC (telefonoAgencia) = 1)), 

		CONSTRAINT ckValPagoOnlineAGENCIBUSES
			CHECK (UPPER (pagoOnline) in ('SI','NO'))

);

INSERT INTO AGENCIABUSES(/*codAgenciaAutobus,*/nombre,nif,direccion,localidad,provincia,comunidad,pais,horarioAgencia,telefonoDeReserva,telefonoAgencia,pagoOnline,email)
	VALUES(N'Autobuses Yanguas',N'123456789',N'C/Marqués de Covarruvias 5',N'Alberite',N'La Rioja',N'La Rioja',N'España',default,941458796,941458796,N'SI',N'??'),   -- cod1
		  (N'Autobuses Riojacar',N'234567891',N'*',N'Logroño',N'La Rioja',N'La Rioja',N'España',default,941458796,941458796,N'SI',N'??'),
		  (N'Autobuses Jimenez',N'345678912',N'*',N'Logroño',N'La Rioja',N'La Rioja',N'España',default,000000000,000000000,N'SI',N'??'), -- cod3
		  (N'Autobuses Logrobus',N'456789123',N'*',N'Logroño',N'La Rioja',N'La Rioja',N'España',default,000000000,000000000,N'SI',N'??') -- cod4
;
-- ---------------------------------------
CREATE TABLE AUTOBUS(
	idBus				 INT identity (1,1) NOT NULL,
	codAgenciaAutobus    INT /*identity (1,1) */NOT NULL,
	nombreAgencia		 NVARCHAR (20)  NOT NULL,
	matricula			 NVARCHAR (15)  NOT NULL,
	tipoBus				 NVARCHAR (10)  CONSTRAINT dfTipoBusAutobus DEFAULT N'Grande' NOT NULL,
	plazas				 SMALLINT NOT NULL

	CONSTRAINT PkAUTOBUS
			PRIMARY KEY (idBuS)

	CONSTRAINT FkAgenciaAutobus
			FOREIGN KEY (codAgenciaAutobus)
			REFERENCES AGENCIABUSES (codAgenciaAutobus)
			on update cascade
			ON DELETE CASCADE,

	CONSTRAINT cKdfTipoBusAutobus
		CHECK ((tipoBus) in ('Grande','Mediano','Pequeño','Minibus')),
);

-- delete from agenciaautobus where codAgenciaAutobus = 1; -- Se carga todos los autobuses de esa agencia --
-- select * from autobus;

INSERT INTO AUTOBUS(/*idBus*/codAgenciaAutobus,nombreAgencia,matricula,tipoBus,plazas)
	VALUES(/*idBus*/1,N'Autobuses Riojacar',N'LO-9854-F',N'Grande',62)
			
																									-- Primero la logica es crear la agencia, y sobre el dato de la foránea meter buses, si metes buses en una compañía no dada de alta, no traga, LOGICO --
																									-- Meter en el futuro con una pantalla de campos por parte del administrador --
;
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
	codAgenciaAutobus  INT     /*identity (001,001)*/ NOT NULL, 
	puesto			NVARCHAR (10) NOT NULL

	CONSTRAINT pkPERSONALAGENCIABUSES
			PRIMARY KEY (codTrabajador),

	CONSTRAINT fkCodAgenciaAutobusPERSONALAGENCIABUSES
			FOREIGN KEY (codAgenciaAutobus)
			REFERENCES AGENCIABUSES (codAgenciaAutobus)
			on update cascade
			ON DELETE CASCADE,
			
	CONSTRAINT ckValSexoPERSONALAGENCIABUSES
		CHECK (UPPER (sexo) in ('H','M')),

 );
								-- Mirar esto para nif  https://ocw.unizar.es/ciencias-experimentales/modelos-matematicos-en-bases-de-datos/diseno/DisenoProgramacion.pdf

 INSERT INTO PERSONALAGENCIABUSES(/*codTrabajador,*/apellidos,nombre,sexo,nif,fNacimiento,Calle,Cp,Ciudad,Provincia,nacionalidad,TlfnoParticular,email,codAgenciaAutobus,puesto)
	VALUES(/*codTrabajador,*/N'Laya García',N'Adrián',N'H',N'16606852R',N'19820617',N'C/Obispo Blanco Nájera 7 5ºA',26004,N'Logroño',N'La Rioja',N'La Rioja',N'637117965',N'superlaya50@gmail.com',1,N'Chofer')  -- Tiene que estar la respectiva compañia creada su código, si nó no lo mete el registro --
 ;
 -- -------------------------------------

 CREATE TABLE DESTINO (
	codDestino				INT identity (1,1) NOT NULL,
	nombreLugar				NVARCHAR (50) NOT NULL,
	prov_Depart				NVARCHAR (50) NOT NULL,
	com_Reg					NVARCHAR (50) NOT NULL,
	pais					NVARCHAR (20) NOT NULL,
	kilometrosIdaVuelta		INT,

	CONSTRAINT pkDESTINO
		PRIMARY KEY (codDestino))
;

INSERT INTO DESTINO (/*codDestino,*/nombreLugar,prov_Depart,com_Reg,pais,kilometrosIdaVuelta)
VALUES	(N'Santander',N'Cantabria',N'Cantabria',N'España',0),   -- cod1
		(N'Isla',N'Cantabria',N'Cantabria',N'España',0),		-- cod2
		(N'Noja',N'Cantabria',N'Cantabria',N'España',0),		-- cod3
		(N'Plencia',N'Vizcaya',N'Pais Vasc',N'España',0),		-- cod4
		(N'Santoña',N'Cantabria',N'Cantabria',N'España',0),		-- cod5
		(N'San Sebastian',N'Guipuzcoa',N'Pais Vasco',N'España',0),       -- codDestino6
		(N'San Juan De Luz',N'(departamento)Pirineos Atlánticos',N'(región)Nueva Aquitania',N'Francia',0),  --codDestino7
		(N'Zarautz',N'Guipuzcoa',N'Pais Vasco',N'España',0),       -- codDestino8
		(N'Hondarribia',N'Guipuzcoa',N'Pais Vasco',N'España',0),	-- cod9
		(N'Hendaya',N'(departamento)Pirineos Atlánticos',N'(región) Aquitania',N'Francia',0),  -- codDestino10
		(N'Lekeitio',N'Vizcaya',N'Pais Vasco',N'España',0),
		(N'Laredo',N'Cantabria',N'Cantabria',N'España',0),    -- codDestino12
		(N'Castro',N'Cantabria',N'Cantabria',N'España',0),		-- codDestino13
		(N'Zaragoza',N'Zaragoza',N'Aragon',N'España',0),
		(N'Biarrtz',N'*',N'*',N'*',0),							-- codDestino15
		(N'Zumaia',N'*',N'*',N'*',0),							-- codDestino16
		(N'Guetaria',N'*',N'*',N'*',0),
		(N'Zaragoza',N'Zaragoza',N'Aragon',N'España',0)			-- cod18

		;



-- --------------------------------------
CREATE TABLE VIAJAR(
	codViajar/*no es suficiente las primarias*/ INT IDENTITY (1,1) NOT NULL,
	codDestino				INT /*identity (001,001)*/ NOT NULL,  -- La lógica dice que ya con datos metidos insertes los viajes --
	codAgenciaViajes		INT /*identity (001,001)*/ NOT NULL,
	codAgenciaBuses			INT /*identity (001,001)*/ NOT NULL,

	diaViaje				NVARCHAR (15)  CONSTRAINT dfDiaViajeViajar DEFAULT N'Domingo' NOT NULL,
	fecha					DATE NOT NULL,
	lugarViaje				NVARCHAR (100)	NOT NULL,											   				                           
	direcionSalida			NVARCHAR (100)   DEFAULT  (N'Estación de autobuses')NOT NULL,
	horaSalida				TIME			 DEFAULT  (N'08:00:00.0000000') NOT NULL,
	direcionVuelta			NVARCHAR (100)	 DEFAULT  (N'Salida de la playa') NOT NULL,
	horaVuelta				TIME			 DEFAULT  (N'19:00:00') NOT NULL,
	precio					MONEY			 DEFAULT  (14) NOT NULL

	CONSTRAINT pkVIAJAR
	PRIMARY KEY (codViajar,codDestino,codAgenciaViajes,codAgenciaBuses)

	CONSTRAINT FkCodLugarViajar		FOREIGN KEY (codDestino)		REFERENCES DESTINO (codDestino),
	CONSTRAINT FkCodAgenciaViajes	FOREIGN KEY (codAgenciaViajes)	REFERENCES AGENCIAVIAJES (codAgenciaViajes),
	CONSTRAINT FkCodAgenciaBuses	FOREIGN KEY (codAgenciaBuses)	REFERENCES AGENCIABUSES	(codAgenciaAutobus),

	CONSTRAINT cKDiaViajeViajar 
		CHECK ((diaViaje) in ('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'))
		);


INSERT INTO VIAJAR (codDestino/*Este es el distinto*/,codAgenciaViajes,codAgenciaBuses,  diaViaje,fecha,lugarViaje,  direcionSalida,horaSalida,direcionVuelta,horaVuelta,precio)	
	VALUES	(1,1,3,default,N'20200621',N'Santander' ,default,default,default,default,default),                                    
			(1,1,3,N'Miercoles',N'20200621',N'Santander'  ,default,default,default,default,default),		      -- Poniente --	 --Modelo a seguir --
			(2,1,3,default,N'20200628','Isla'  ,default,default,default,default,default),
			(3,1,3,default,N'20200705','Noja'  ,default,default,default,default,default),
			(4,1,3,default,N'20200705','Plencia'  ,default,default,default,default,default),
			(5,1,3,default,N'20200712','Santoña'  ,default,default,default,default,default),
			(6,1,3,default,N'20200719','SanSebastian'  ,default,default,default,default,default),
			(7,1,3,default,N'20200726','San Juan De Luz'  ,default,default,default,default,default),
			(8,1,3,default,N'20200809','Zarautz'  ,default,default,default,default,default),
			(9,1,3,default,N'20200816','Hondarribia'  ,default,default,default,default,default),
			(10,1,3,default,N'20200823','Endaya'  ,default,default,default,default,default),
			(11,1,3,default,N'20200830','Lekeitio'  ,default,default,default,default,default),
			(12,1,3,default,N'20200906','Laredo'  ,default,default,default,default,default),
			(13,1,3,default,N'20200913','Castro'  ,default,default,default,default,default),
	
			(18,1,3,default,N'20201011','Zaragoza'  ,default,default,default,default,default)
;	

-- 'GO TRAVEL' Septiembre
INSERT INTO VIAJAR(codDestino,codAgenciaViajes,codAgenciaBuses,diaViaje,fecha,lugarViaje,  direcionSalida,horaSalida,direcionVuelta,horaVuelta,precio)	-- Cuidado con los acentos que no es lo mismo Sábado que Sabado --
	VALUES  (12,2,2,N'Miercoles',N'20200902',N'Laredo',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,12),
			(15,2,2,default,N'20200906',N'Biarrtz',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,default),
			(12,2,2,N'Sabado',N'20200912',N'Laredo',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,13),
			(13,2,2,default,N'20200913',N'Castro',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,default),
			(16,2,2,N'Miercoles',N'20200916',N'Zumaia',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,12),
			(8,2,2,N'Sabado',N'20200919',N'Zarautz',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,13),
			(6,2,2,default,N'20200920',N'San Sebastian',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,default),
			(13,2,2,N'Miercoles',N'20200923',N'Castro',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,12),
			(12,2,2,N'Sabado',N'20200926',N'Laredo',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,13),
			(7,2,2,default,N'20200927',N'San Juan De Luz',N'Jorge Vigón 7 (Est. Labrador, lado Carmelitas)',default,default,default,default)
;

-- 'Azul Marino' 
-- Julio
INSERT INTO VIAJAR(codDestino,codAgenciaViajes,codAgenciaBuses,diaViaje,fecha,lugarViaje,  direcionSalida,horaSalida,direcionVuelta,horaVuelta,precio)
VALUES	(1,3,4,default,N'20200705',N'Santander',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(12,3,4,default,N'20200712',N'Laredo',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(3,3,4,default,N'20200719',N'Noja',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(4,3,4,default,N'20200726',N'Plencia',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
-- Agosto
		(1,3,4,default,N'20200802',N'San Sebastian',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(7,3,4,default,N'20200809',N'San Juan De Luz',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(15,3,4,default,N'20200816',N'Biarritz',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),		/*Sepodría quitar tanta redundancia de datos*/
		(16,3,4,default,N'20200823',N'Zumaia',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(09,3,4,default,N'20200830',N'Hondarribia',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
-- Septiembre
		(17,3,4,default,N'20200906',N'Guetaria',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default),
		(13,3,4,default,N'20200913',N'Castro Urdiales',N'Cafetería Ibiza-Muro de la Mata 7',default,default,default,default)
	;  


-- "VIAJES GRAN RESERVA" PLAYA BUS  4,1
-- Junio
INSERT INTO VIAJAR(codDestino,codAgenciaViajes,codAgenciaBuses,diaViaje,fecha,lugarViaje,direcionSalida,horaSalida,direcionVuelta,horaVuelta,precio)
VALUES	(12,4,1,N'Sabado',N'20200627',N'Laredo',N'Avenida de España 1',default,default,default,default),
		(13,4,1,default,N'20200628',N'Castro Urdiales',N'Avenida de España 1',default,default,default,default),
-- Julio
		(8,4,1,N'Sabado',N'20200704',N'Zarautz',N'Avenida de España 1',default,default,default,default),
		(12,4,1,default,N'20200705',N'Laredo',N'Avenida de España 1',default,default,default,default),
		(9,4,1,N'Sabado',N'20200711',N'Hondarribia',N'Avenida de España 1',default,default,default,default),
		(6,4,1,default,N'20200712',N'Santander',N'Avenida de España 1',default,default,default,default),
		(13,4,1,N'Sabado',N'20200718',N'Catro Urdiales',N'Avenida de España 1',default,default,default,default),
		(7,4,1,default,N'20200719',N'San Juan De Luz',N'Avenida de España 1',default,default,default,default),
		(5,4,1,N'Sabado',N'20200725',N'Santoña',N'Avenida de España 1',default,default,default,default),
		(6,4,1,default,N'20200726',N'San Sebastián',N'Avenida de España 1',default,default,default,default),
-- Agosto
		(16,4,1,N'Sabado',N'20200801',N'Zumaia',N'Avenida de España 1',default,default,default,default),
		(10,4,1,default,N'20200802',N'Hendaya',N'Avenida de España 1',default,default,default,default),
		(6,4,1,N'Sabado',N'20200808',N'San Sebastián',N'Avenida de España 1',default,default,default,default),
		(13,4,1,default,N'20200809',N'Castro Urdiales',N'Avenida de España 1',default,default,default,default),
		(12,4,1,N'Sabado',N'20200815',N'Laredo',N'Avenida de España 1',default,default,default,default),
		(15,4,1,default,N'20200816',N'Biarritz',N'Avenida de España 1',default,default,default,default),
		(7,4,1,N'Sabado',N'20200822',N'San Juan De Luz',N'Avenida de España 1',default,default,default,default),
		(1,4,1,default,N'20200823',N'Santander',N'Avenida de España 1',default,default,default,default),
		(4,4,1,N'Sabado',N'20200828',N'Plencia',N'Avenida de España 1',default,default,default,default),
		(1,4,1,default,N'20200830',N'San Sebastian',N'Avenida de España 1',default,default,default,default),
-- Septiembre
		(15,4,1,N'Sabado',N'20200905',N'Biarritz',N'Avenida de España 1',default,default,default,default),
		(7,4,1,default,N'20200906',N'San Juan De Luz',N'Avenida de España 1',default,default,default,default),
		(13,4,1,N'Sabado',N'20200912',N'Castro Urdiales',N'Avenida de España 1',default,default,default,default),
		(10,4,1,default,N'20200913',N'Hendaya',N'Avenida de España 1',default,default,default,default)
;

-- "FEDERACION REGIONAL DE PENSIONISTAS Y JUBILADOS DE CC.OO (LA RIOJA)"  5,2

INSERT INTO VIAJAR(codDestino,codAgenciaViajes,codAgenciaBuses,diaViaje,fecha,lugarViaje,direcionSalida,horaSalida,direcionVuelta,horaVuelta,precio)
	VALUES	(4,5,2,N'Jueves',N'20200625',N'Plencia',default,default,default,default,12),
-- Julio			
			(1,5,2,N'Jueves',N'20200709',N'Santander',default,default,default,default,12),
			(8,5,2,N'Jueves',N'20200716',N'Zarautz',default,default,default,default,12),
		   (12,5,2,N'Jueves',N'20200723',N'Laredo',default,default,default,default,12),
			(1,5,2,N'Jueves',N'20200730',N'San Sebastián',default,default,default,default,12),
-- Agosto
		   (13,5,2,N'Jueves',N'20200806',N'Castro Urdiales',default,default,default,default,12),
		   (11,5,2,N'Jueves',N'20200813',N'Lekeitio',default,default,default,default,12),
			(9,5,2,N'Jueves',N'20200820',N'Hondarribia',default,default,default,default,12),
			(5,5,2,N'Jueves',N'20200827',N'Santoña',default,default,default,default,12),
-- Septiembre
		   (16,5,2,N'Jueves',N'20200903',N'Zumaia',default,default,default,default,12)
;



/*


																												-- alter table PERSONALAGENCIAVIAJES
																												--  drop constraint FkCodAgenciaViajes;   -- Con esto reviento la foránea y puedo borrar la tabla pero los registros se borran tambien --
																												-- DROP TABLE AGENCIAVIAJES;
																												-- ALTER TABLE AGENCIAvIAJES
																												--NOCHECK CONSTRAINT ckValTelefonoDeReservaAgencia; 
																												-- select * from agenciaviajes;

	-- idViaje INT identity (001001,1) PRIMARY KEY NOT NULL,
	-- destino NVARCHAR (50) NOT NULL,
	-- compañiaTransporte NVARCHAR (50) DEFAULT  (N'Autobuses Jimenez') NOT NULL,     
	-- (N'C/General Urrutia (Col. Batalla De Clavijo)')

		
	-- Destino es u atributo multivalorado

		select * from destino;
		drop table destino;
---------------------------------------------------------------------------------------------------------------------


----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




'GO TRAVEL'

Septiembre
002001,Miercoles,20200902,Laredo,Cantabria,Cantabria,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,12
002002,Sábado,20200905,Hendaya,(departamento)Pirineos Atlánticos,(región) Aquitania,Francia,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,13
002003,Domingo,20200906,Biarritz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,14
002004,Miercoles,20200909,Zarautz,Guipuzcoa,Pais Vasco,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,12
002005,Sábado,20200912,Laredo,Cantabria,Cantabria,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,13
002006,Domingo,20200913,Castro urdiales,Cantabria,Cantabria,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,14
002007,Miercoles,20200916,Zumaia,Guipuzcoa,Pais Vasco,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,12
002008,Sabado,20200919,Zarautz,Guipuzcoa,Pais Vasco,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,13
002009,Domingo,20200920,San Sebastian,Guipuzcoa,Pais Vasco,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,14
002010,Miercoles,2020,Castro urdiales,Cantabria,Cantabria,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,12
002011,Sábado,20200926,Laredo,Cantabria,Cantabria,España,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,13
002012,Domingo,20200927,San Juan De Luz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Logrobús,Jorge Vigón 7 (estatua Labrador, lado Carmelitas)8h,Estacion de autobuses,19h,14

Viaje a la playa de Salou en San Mateo* Salida desde Logroño a las 7.00 h dia 19/09 y regreso el 21/09 después de comer (17.30 h).(Salimos con el desayuno)
3 dias y 2 noches. Hotel 3* en média pensión.*/
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



----------------------------------------------------------------------------------------------------------------------------
/*"VIAJES AZUL MARINO" PLAYA BUS
autobuses Logrobús.   14 adulto 
Eslogan/edición...Domingos a la playa

codigoAgencia 004
NIF *********
nombre "VIAJES AZUL MARINO" 
direcion C/Lardero 3
ciudad Logroño
provincia La Rioja
horarioAgencia 10:00 a 13:00 y 17:00 a 20:00
teléfonoContacto no sé
telefonoReservas nada // Pago online nada
email nada

Julio
004001,Domingo,20200705,Santander,Cantabria,Cantabria,España,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14
004002,Domingo,20200712,Laredo,Cantabria,Cantabria,España,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14
004003,Domingo,20200719,Noja,Cantabria,Cantabria,España,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14
004004,Domingo,20200726,Plencia,Vizcaya,Pais Vasco,España,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14

Agosto
004005,Domingo,20200802,San Sebastian,Guipuzcoa,Pais Vasco,España,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14
004006,Domingo,20200809,San Juan De Luz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14
004007,Domingo,20200816,Biarritz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Logrobús,Cafetería Ibiza-Muro de la Mata 7,8h,Salida de la playa,19h,14		/*Sepodría quitar tanta redundancia de datos*/
004008,Domingo.20200823,Zumaia,******,******
004009,Domingo,20200830,Fuenterrabia,****,****

Septiembre
004010,Domingo,20200906,Guetaria,***,****
004011,Domingo,20200913,Castro Urdiales,*****,******

*/


--------------------------------------------------------------------------------------------------
/*"FEDERACION REGIONAL DE PENSIONISTAS Y JUBILADOS DE CC.OO (LA RIOJA)"
			Precio de Billete 12euros (afiliados 10 euros)
			Salida de la estación de autobuses (8.00 H.)
codigoAgencia 005
NIF *********
nombre "FEDERACION REGIONAL DE PENSIONISTAS Y JUBILADOS DE CC.OO (LA RIOJA)"
direcion C/Pio XII 1
ciudad Logroño
provincia La Rioja
horarioAgencia Despacho de Billetes: Lunes Martes y Miercoles (de 11h a 13h)
teléfonoContacto 602263181
telefonoReservas nada // Pago online nada
email nada


Julio
005001,Jueves,Plencia,Vizcaya,Pais Vasco,España,Autobuses***,Estación autobuses de Logroño, Avenida de España 1,8h,Estacion de autobuses,19h,14
005002,Jueves,Santander,
005003,Jueves,Zarautz,
005004,Jueves,Laredo,
005005,Jueves,San Sebastián,




Agosto
005006,Jueves,Castro Urdiales,
005007,Jueves,Lekeitio,Vizcaya,Pais Vasco,España,***,***
005008,Jueves,Fuerterrabia,
005009,Jueves,Santoña,


Septiembre
005010,Jueves,Zumaia,


*/


-------------------------------------------------------------------------------------------------------
/*"VIAJES GRAN RESERVA" PLAYA BUS
autobuses propios de Yanguas.   14 adulto 11 euros niño(menores hasta 10años)

codigoAgencia 003
NIF *********
nombre "VIAJES GRAN RESERVA" 
direcion C/Vara de Rey 41
ciudad Logroño
provincia La Rioja
horarioAgencia 10:00 a 13:00 y 17:00 a 20:00
teléfonoContacto 602263181
telefonoReservas nada // Pago online nada
email nada


salidas 7:30H Albelda de Iregua 
	7:40H Alberite de Iregua
	7:50H Lardero
	8:00H Logroño

14 euros en Septiembre, los otros meses era los Miercoles a 12 euros.


Junio
003001,Sabado,20200627,Laredo,Cantabria,Cantabria,España,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14
003002,Domingo,20200628,Castro Urdiales,****,*****

Julio
004003,Sabado,20200704,Zarautz,****,****
004004,Domingo,20200705,Laredo,******,****
004005,Sabado,20200711,Hondarribia,****,****
004006,Domingo,20200712,Santander,*****,****
004007,Sabado,20200718,Catro Urdiales,*****,****
004008,Domingo,20200719,San Juan De Luz,****,****
004009,Sabado,20200725,Santoña,Cantabria,Cantabria,España,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14
004010,Domingo,2020726,San Sebastián,*****,*****

Agosto
004011,Sabado,20200801,Zumaia,****,****
004012,Domingo,20200802,Hendaya,*****,****
004013,Sabado,20200808,San Sebastián,****,****
004014,Domingo,20200809,Castro Urdiales,******,****
004015,Sabado,20200815,Laredo,****,****
004016,Domingo,20200816,Biarritz,*****,*****
004016,Sabado,20200822,San Juan De Luz,****,****
004017,Domingo,20200823,Santander,****,****
004018,Sabado,20200828,Plencia,****,****
004019,Domingo,20200830,San Sebastian,****,*****




Septiembre
003001,Sabado,20200905,Biarritz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14
003002,Domingo,20200906,San Juan De Luz,(departamento)Pirineos Atlánticos,(región)Nueva Aquitania,Francia,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14
003003,Sabado,20200912,Castro Urdiales,Castro urdiales,Cantabria,Cantabria,España,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14
003004,Domingo,20200913,Hendaya,(departamento)Pirineos Atlánticos,(región) Aquitania,Francia,Autobuses Yanguas,Estación autobuses de Logroño, Avenide de España 1,8h,Estacion de autobuses,19h,14


----------------------------------------------------------------------------------------------------------------------
<Zafiro Tour>
	Paradas de recoger gente.
						tabla de personas







						select * from viaje;
 INSERT INTO ope_prodqa_dev  
    (
      staff, 
      turn,
      date_prodqa, 
      hour_dev  
    ) 
   VALUES 
   (
      1,
      481,
      CAST ('2016-10-23 20:44:11' AS DATETIME), 
      CAST ('12:05:06.0000000' AS TIME)
    );

	
	*/