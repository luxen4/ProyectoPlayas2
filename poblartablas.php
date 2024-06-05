<?php                                           /* https://www.baulphp.com/como-crear-una-tabla-en-mysql-con-php/  */  
                                                        /* Llenar la base de datos desde un archivo php */
/*
$host="fdb30.awardspace.net";
$dbname="3714088_proyectoplayas";
$username="3714088_proyectoplayas";
$contrasena="alberite2";
*/

/*
$host="localhost";
$dbname="proyectoplayasdefinitivo";
$username="root";
$contrasena="";
*/

if($_SERVER['SERVER_NAME']=="localhost"){
  $host="localhost";
  $dbname="playas";
  $username="root";
  $contrasena="";   

}else{
  $host="fdb30.awardspace.net";
  $dbname="3714088_proyectoplayas";
  $username="3714088_proyectoplayas";
  $contrasena="alberite2";   
}


// Creamos la conexión con la base de datos
$conn = mysqli_connect($host, $username, $contrasena, $dbname);
$conn->set_charset("utf8");                    /* https://www.oscarperez.es/problemas-con-las-enes-acentos-y-demas-caracteres-cuando-usas-mysql-y-php/*/
// Aquí se revisa la conexión con MySQL
if (!$conn) {
    die("la conexión ha fallado: " . mysqli_connect_error());
}


$foreing_keysOff="SET FOREIGN_KEY_CHECKS=0";

if (mysqli_query($conn, $foreing_keysOff)) {
  echo "ForeignKeys anuladas<br>";
} else {
  echo "Error al anular las ForeignKeys: " . mysqli_error($conn) . "<br>";}


$dropTABLE_AGENCIABUSES="DROP TABLE IF EXISTS AGENCIABUSES";
$dropTABLE_AGENCIAVIAJES="DROP TABLE IF EXISTS AGENCIAVIAJES";
$dropTABLE_AGENCIAVIAJESCLIENTE="DROP TABLE IF EXISTS AGENCIAVIAJESCLIENTE";
$dropTABLE_AGENCIAVIAJESDESTINO="DROP TABLE IF EXISTS AGENCIAVIAJESDESTINO";
$dropTABLE_BUS="DROP TABLE IF EXISTS BUS";
$dropTABLE_CLIENTE="DROP TABLE IF EXISTS CLIENTE";
$dropTABLE_DESTINO="DROP TABLE IF EXISTS DESTINO";
$dropTABLE_RELACIONAGENCIAS="DROP TABLE IF EXISTS RELACIONAGENCIAS";
$dropTABLE_VIAJAR="DROP TABLE IF EXISTS VIAJAR";


if (mysqli_query($conn, $dropTABLE_AGENCIABUSES)) {echo "Tabla AGENCIABUSES eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla AGENCIABUSES: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_AGENCIAVIAJES)) {echo "Tabla AGENCIAVIAJES eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla AGENCIAVIAJES: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_AGENCIAVIAJESCLIENTE)) {echo "Tabla AGENCIAVIAJESCLIENTE eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla AGENCIAVIAJESCLIENTE: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_AGENCIAVIAJESDESTINO)) {echo "Tabla AGENCIAVIAJESDESTINO eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla AGENCIAVIAJESDESTINO: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_BUS)) {echo "Tabla BUS eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla BUS: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_CLIENTE)) {echo "Tabla CLIENTE eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla CLIENTE: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_DESTINO)) {echo "Tabla DESTINO eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla DESTINO: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_RELACIONAGENCIAS)) {echo "Tabla RELACIONAGENCIAS eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla RELACIONAGENCIAS: " . mysqli_error($conn) . "<br>";}
if (mysqli_query($conn, $dropTABLE_VIAJAR)) {echo "Tabla VIAJAR eliminada exitosamente <br>";} else { echo "Error al eliminar la tabla VIAJAR: " . mysqli_error($conn) . "<br>";}






/*1 MySql  OK */
// La variable que creara la tabla en la base de datos.
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



// Condicional PHP que creará la tabla
if (mysqli_query($conn, $creaAGENCIABUSES)) {
  // Mostramos mensaje si la tabla ha sido creado correctamente!
      echo "Table AGENCIABUSES created successfully <br>";
  } else {
      // Mostramos mensaje si hubo algún error en el proceso de creación
      echo "Error al crear la tabla AGENCIABUSES: <br>" . mysqli_error($conn);
  }


/*1 MySql  OK */
$pueblaAGENCIABUSES="INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_incripcion, nombre, nif,direccion, cp, localidad, provincia, comunidad,pais, 
  email, telefono_Reserva, telefono_Agencia, horario_Agencia, pago_Online, numero_Cuenta, username, contrasena, roll)

VALUES (default,'Yanguas','A48265169','C/ Marques de Covarrubias 5','26003',   'Alberite', 'La Rioja','La Rioja','España',  
'yanguas@yanguas.com','637117965','941-20-20-20', '10:15:00 a 13:30:00 y 17:30:00 a 20:30:00','SI','ES650123456789', 'yanguas21','$2y$10$91YosuvjXJim4.6eZcQccehkPJVKVNKjLbiJ9SJaGBoyUrThGNGDW',default),	
/*username-> yanguas21		contrasena->yanguas21*/

(default,'Autobuses Riojacar','A234567891','Calle la Nevera, 12','26006',    'Logroño','La Rioja','La Rioja','España',  
'riojacar@riojacar.com','941 50 02 00','941 50 02 00', '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65123456789','riojacar21','$2y$10\$FyUtPdH/FpUDdtmEfg697emLusRh8l9wdRmdc9uEbYDd1aKbUazVi',default),	
/*username=> riojacar21     contrasena=> riojacar21 */

(default,'Victor Bayo','B40156598','C/ Mayor, nº 10','40551','Campo de San Pedro','Segovia','Castilla y León','España',	
'victorbayo@victorbayo.com','921 55 60 35','921 55 63 36', /*Lunes a viernes: 10:00-13:00 ; 17:00-19:00*/' 10:00 a 13:00 ; 17:00 a 19:00','SI','ES65412569863',
'victorbayo21','$2y$10\$WzAOf40fn03oxdAJ8cjUpuYWMo7zFgJfR.1Fm4j4ZMzlraNgeXZAG',default),
/* username=> victorbayo21     contrasena=> victorbayo21 */

(default,'Autobuses Jimenez','A48265190','C/ Santa María 8','26006',   'Logroño','La Rioja','La Rioja','España',	
'jimenez@jimenez.com','941 20 27 77','941 20 27 77',  '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00','SI','ES65234567890','jimenez21','$2y$10\$YEqrNDwx800/PG7gxhS2iOtcNgwtE09c2B1Mxn4aJg60bBJuAkfuS',default),	
/*username=> jimenez21      contrasena=> jimenez21 */

(default,'Logrobus','A00125478','Calle Rodejón, 24','26006','Logroño','La Rioja','La Rioja','España',	
'logrobus@logrobus.com','609411262',' 941 26 33 51',default,'SI','ES65547896258',
'logrobus21','$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy',default);";	
/*username=> logrobus21     contrasena=> logrobus21 */          /*Mirar que tiene unas animaciones muy bueneas de telefono, mundo y relog*/


// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaAGENCIABUSES)) {
  // Mostramos mensaje si la tabla ha sido creado correctamente!
      echo "Inserción en la Tabla AGENCIABUSES exitosa <br>";
  } else {
      // Mostramos mensaje si hubo algún error en el proceso de creación
      echo "Error al insertar en la tabla AGENCIABUSES: " . mysqli_error($conn) . "<br>";
  }



  
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


  if (mysqli_query($conn, $creaBUS)) {
      echo "Table AGENCIABUSES created successfully <br>";
  } else {
      echo "Error al crear la tabla BUS: " . mysqli_error($conn) . "<br>";
  }

/*2 MySql OK */
$pueblaBUS="INSERT INTO BUS (tipo_Bus,plazas,matricula,ano_Matriculacion,cod_AgenciaBuses) 
VALUES  ('Grande','63','0063 YAN',2001,1),('Mediano','55','0055 YAN',2002,1), ('Mediano','51','0051 YAN',2002,1), ('Pequeño','28','0028 YAN',2003,1), ('Minibus','19','0019 YAN',2004,1),		  /* Para Yanguas     */
        ('Grande','63','0063 RIO',2005,2),('Mediano','55','0055 RIO',2006,2), ('Pequeño','51','0051 RIO',2006,2), ('Minibus','28','0028 RIO',2006,2),	('Minibus','19','0019 RIO',2004,2),	    /* Para Riojacar    */
        ('Grande','63','0063 VIC',2008,3),('Mediano','55','0055 VIC',2007,3), ('Pequeño','51','0051 VIC',2010,3), ('Minibus','28','0028 VIC',2015,3),	('Minibus','19','0019 VIC',2004,3),	    /* Para Victor Bayo */
        ('Grande','63','0063 LOG',2005,4),('Mediano','55','0055 LOG',2006,4), ('Pequeño','51','0051 LOG',2006,4), ('Minibus','28','0028 LOG',2008,4),	('Minibus','19','0019 LOG',2004,4),	    /* Para LogroBus    */
        ('Grande','63','0063 JIM',2007,5),('Mediano','55','0055 JIM',2009,5), ('Pequeño','51','0051 JIM',2012,5), ('Minibus','28','0028 JIM',2004,5), ('Minibus','19','0019 JIM',2004,5);";		/* Para Jimenez     */
/* --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */


// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaBUS)) {
      echo "Inserción en la tabla BUS exitosa <br>";
  } else {
      echo "Error al insertar en la tabla BUS: " . mysqli_error($conn) . "<br>";
  }




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
	telefono_Reserva	    VARCHAR (15)  NOT NULL DEFAULT 'NO',																									
	telefono_Agencia	    VARCHAR (15)  NOT NULL DEFAULT 'NO',																								
	horario_Agencia	      VARCHAR (80)  DEFAULT '10:00 a 13:00 y 17:00 a 20:00' NOT NULL,
	lugar_SalidaPredeterminado  VARCHAR (100)  DEFAULT 'Estación de autobuses (Logroño)' NOT NULL,	
	cod_CompaniaBusHabitual	    INT NOT NULL,	
	username             	VARCHAR (20) NOT NULL UNIQUE, 
  contrasena	 			    VARCHAR (70) NOT NULL UNIQUE,		
	pago_Online				    VARCHAR (15) NOT NULL DEFAULT 'NO',																														
	num_CuentaPagosOnline VARCHAR (35),
	roll				          VARCHAR(70) DEFAULT 'agenciaviajes' NOT NULL,
					
		PRIMARY KEY (cod_AgenciaViajes),
		FOREIGN KEY (cod_CompaniaBusHabitual) REFERENCES AGENCIABUSES (cod_AgenciaBuses) ON DELETE CASCADE ON UPDATE CASCADE  
	);";

if (mysqli_query($conn, $creaAGENCIAVIAJES)) {
  echo "Table AGENCIAVIAJES created successfully <br>";
} else {
  echo "Error al crear la tabla AGENCIAVIAJES: " . mysqli_error($conn) . "<br>";
}





/*-------------------------------------------------------------------------------- */
/*3.1 Mysql*/
$creaRELACIONAGENCIAS="CREATE TABLE RELACIONAGENCIAS(
  cod_RelacionAgencias      INT NOT NULL AUTO_INCREMENT,
	cod_AgenciaViajes         INT NOT NULL, /*bigint unsigned not null primary key auto_increment,*/
	cod_AgenciaBuses	        INT NOT NULL, 
	fecha_Inscripcion			    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (cod_RelacionAgencias),	
    CONSTRAINT UNIQUE_RelacionAgencias UNIQUE (cod_AgenciaViajes,cod_AgenciaBuses),  
		FOREIGN KEY (cod_AgenciaBuses)  REFERENCES AGENCIABUSES (cod_AgenciaBUSES) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE
);";

if (mysqli_query($conn, $creaRELACIONAGENCIAS)) {
  echo "Table RELACIONAGENCIAS created successfully <br>";
} else {
  echo "Error al crear la tabla RELACIONAGENCIAS: " . mysqli_error($conn) . "<br>";
}

/*---------------------------------------------------------------------------------- */


/* 3.2 MySql OK */ 
$pueblaRELACIONAGENCIAS="INSERT INTO RELACIONAGENCIAS(/*cod_Viajar,*/	cod_AgenciaViajes,cod_AgenciaBuses,fecha_Inscripcion)
  VALUES(1,2,default),(1,3,default),(1,4,default),(1,5,default),
                      (2,3,default),(2,4,default),(2,5,default),
                                    (3,4,default),(3,5,default), 
                                                  (4,5,default)
        
;";

// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaRELACIONAGENCIAS)) {
echo "Inserción en la tabla RELACIONESAGENCIAS exitosa <br>";
} else {
echo "Error al insertar en la tabla RELACIONESAGENCIAS: " . mysqli_error($conn) . "<br>";
}













/*3 MySql OK */
$pueblaAGENCIAVIAJES="INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/fecha_Inscripcion,nombre,nif,direcion,cp,localidad,provincia,comunidad,pais,
											email,telefono_Reserva,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual, 
											username,contrasena,pago_Online,num_CuentaPagosOnline)

	VALUES (default,'Gran Reserva','A48265169','C/ Vara de Rey 42','26003','Logroño','La Rioja','La Rioja','España',
			'yanguas@yanguas.com','602263181','602263181','09:30:00 a 13:00:00 y 17:15:00 a 19:45:00','Estación de autobuses (Logroño)',1,
			'reser21','$2y$10\$T.k.0Xfk3If3FPDJZnlKl.D6ByRd2..N4X2tHgKO.kYNa2iModk1O','SI','ES650123456789'),										/* Agencia de Viajes: Gran Reserva  username:reser21  contraseña:reser21 */

	(default,'GO TRAVELL','B26562918','C/ Avenida de la Solidaridad 9','26003','Logroño','La Rioja','La Rioja','España',
			'gotravell@gotravell.com','653107390','643674634',default,'C/ Avenida de la Solidaridad 9',2,
			'gotravell21','$2y$10\$rwK1HGaQotvT0dkt9G3Fhu/4.55cZ2WEOxY.UP1VwCT/7RWnjpNkC','SI','ES65987654321'),										/* Agencia de Viajes: username:gotravell21  contrasena:gotravell21 */

	(default,'ROTUPRINT','R2600077H','Padre Claret, 1 bajo','26004', 'Logroño','La Rioja','La Rioja','España',
			'rotuprint@rotuprintrioja.com.','941235217','941235217','10:15:00 a 13:15:00 y 17:00:00 a 20:00:00','Varias Paradas',3,
			'rotu21','$2y$10\$eO.U2FPgNtbGBgnRvvvsY.tpFGDoXCOmxZJXBAp0gAG5EqlsiDsbq', 'SI','ES65987654321'),											/* Agencia de Viajes: username:rotu21  contrasena:rotu21 */

	(default,'Azul Marino','B95860615','C/Gran Vía, 45 entrada por, Calle Lardero','26002','Logroño','La Rioja','La Rioja','España',
			'azulmarino@azulmarino.com','941 899 200','941 899 200',default,default,4,
			'azulmarino21','$2y$10\$B.aNV5BQo8K7BwtQLs0lXuzLbjrmLkQ6j6A/rzSXTCHmi1YjQ373q','NO','NO'),												/* Agencia de Viajes: username:azulmarino21	contraseña:azulmarino21 */

	(default,'Zafiro Tours','A03357340','C/ Río Miño, nº 1','26140','Lardero','La Rioja','La Rioja','España',
			'saltoangel@zafirotours.es','941 21 65 12','941 21 65 12','Iglesia de Lardero',default,4,
			'zafiro21','$2y$10$99PP47nOJr.RFed4ZO5NIepk5rpKYQTupLdAzYFguUWYBE43/oNxC','SI','ES65987654321');";										/* Agencia de Viajes: username:zafiro21	contraseña:zafiro21 */

// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaAGENCIAVIAJES)) {
  echo "Inserción en la tabla AGENCIAVIAJES exitosa <br>";
} else {
  echo "Error al insertar en la tabla AGENCIAVIAJES: " . mysqli_error($conn) . "<br>";
}





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


if (mysqli_query($conn, $creaDESTINO)) {
  echo "Table DESTINO created successfully <br>";
} else {
  echo "Error al crear la tabla DESTINO: " . mysqli_error($conn) . "<br>";
}

/* 4 MySql OK Volcado de datos para la tabla `BUS`

/*ACTUALIZADO SET lc_time_names = "es_ES"; /* Para que traduzca a Español el dia de la semana */

$pueblaDESTINO="INSERT INTO DESTINO (/*codDestino,*/nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,fecha_Viaje,cod_agenciaOferta,kilometrosIdaVuelta,euros,cod_bus)  
	VALUES	
/* Gran Reserva */
  ('Alberite','La Rioja','La Rioja','España',/*DAYNAME('2021-09-12') para Ingés*/ELT(WEEKDAY('2022-06-06') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-06',1,202.4,FORMAT(12.75,2),5),
	('Naldo','La Rioja','La Rioja','España',/*DAYNAME('2021-09-12') para Ingés*/ELT(WEEKDAY('2022-06-13') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-13',1,202.4,FORMAT(12.75,2),5),
	
  ('Santoña','Cantabria','Cantabria','España',/*DAYNAME('2021-09-12') para Ingés*/ELT(WEEKDAY('2022-06-10') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-10',1,202.4,12,3),
	('Zarautz','Guipuzkoa','País Vasco','España',ELT(WEEKDAY('2022-06-11') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-11',1,174,12,4),
	('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2022-06-17') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-17',1,183,12,1),
	('San Sebastián','Guipúzcoa','País Vasco','España',ELT(WEEKDAY('2022-06-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-19',1,102,12,2),

/* GO TRAVELL */	
  ('Noja','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-05') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-05',2,174,14,7),
	('Biarritz','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2022-06-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-12',2,284,14,6),	
	('Hendaya','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2022-06-16') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-16',2,174,14,8),
	('Saint-Jean-de-Luz','Pirineos Atlanticos','Nueva Aquitania','Francia',ELT(WEEKDAY('2022-06-27') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-27',2,193,14,9),
	('Santander','Guipúzkoa','Pais Vasco','España',ELT(WEEKDAY('2022-06-25') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-25',2,157,14,10),

/* ROTUPRINT */
	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-14') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-06-14',3,132,12,11),
	('Santander','Guipúzkoa','País Vasco','España',ELT(WEEKDAY('2022-06-15') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2021-06-15',3,157,12,12),
	('Castro Urdiales','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-18') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-18',3,118,12,13),
	('Isla','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-19') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-19',3,216,14,14), 
  ('Ajo','Pirineos Atlanticos','N. Aquitania','Francia',ELT(WEEKDAY('2022-06-22') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-22',3,216,14,15),		

/* Azul Marino */
	('Getaria','Guipúzcoa','País Vasco','España',ELT(WEEKDAY('2022-06-20') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-20',4,171,14,16),
	('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-12') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-12',4,132,14,17),
	
  ('Lekeitio','Bizkaia','País Vasco','España',ELT(WEEKDAY('2022-06-21') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-21',4,178.6,14,18),
	
  ('Zumaia','Guipúzkoa','Pais Vasco','España',ELT(WEEKDAY('2022-06-26') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-26',4,165,14,19),					
  ('Fuenterrabía','Bizkaia','País Vasco','España',ELT(WEEKDAY('2022-07-03') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-07-03',4,183,12,20),
	

/* Zafiro Tours */
	('Orio','Guipúzcoa','País Vasco','España',ELT(WEEKDAY('2022-06-16') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-16',5,168,14,21),
	('Somo','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-06-26') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-06-26',5,224,14,22),
	('Plentzia','Bizkaia','País Vasco','España',ELT(WEEKDAY('2022-07-03') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-07-03',5,164,14,23),
	('Santander','Guipúzkoa','Pais Vasco','España',ELT(WEEKDAY('2022-07-10') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-07-10',5,157,14,24),
  ('Laredo','Cantabria','Cantabria','España',ELT(WEEKDAY('2022-07-20') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),'2022-07-20',5,132,14,25)
;";


// Condicional PHP que creará la tabla


if (mysqli_query($conn, $pueblaDESTINO)) {
  echo "Inserción en la tabla DESTINO exitosa <br>";
} else {
  echo "Error al insertar en la tabla DESTINO: " . mysqli_error($conn) . "<br>";
}



/*4.5 Mysql*/
$creaAGENCIAVIAJESDESTINO="CREATE TABLE AGENCIAVIAJESDESTINO(
	cod_AgenciaViajesDestino  INT NOT NULL AUTO_INCREMENT, /*bigint unsigned not null primary key auto_increment,*/
	cod_AgenciaViajes	        INT NOT NULL, 
	cod_Destino			          INT NOT NULL, 
	
		PRIMARY KEY (cod_AgenciaViajesDestino),	
		FOREIGN KEY (cod_AgenciaViajes) REFERENCES AGENCIAVIAJES (cod_AgenciaViajes) ON UPDATE CASCADE ON DELETE CASCADE,
		FOREIGN KEY (cod_Destino) REFERENCES DESTINO (cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE
);";

if (mysqli_query($conn, $creaAGENCIAVIAJESDESTINO)) {
  echo "Table AGENCIADESTINO created successfully <br>";
} else {
  echo "Error al crear la tabla AGENCIADESTINO: " . mysqli_error($conn) . "<br>";
}


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
  sexo 			    VARCHAR (7) NOT NULL,
	calle			    VARCHAR (50)  NOT NULL,		
  cp				    VARCHAR (5)  NOT NULL,	
  localidad		  VARCHAR (50)  NOT NULL, 
  provincia		  VARCHAR (15)  NOT NULL,
	comunidad		  VARCHAR (15)  NOT NULL,		
  pais		      VARCHAR (10) NOT NULL,	
  contrasena		VARCHAR (70) NOT NULL,	
  num_cuenta    VARCHAR (50) NOT NULL,
  roll        	VARCHAR (70) DEFAULT 'cliente' NOT NULL,

		PRIMARY KEY (cod_Cliente)
);";

if (mysqli_query($conn, $creaCLIENTE)) {
  echo "Table CLIENTE created successfully <br>";
} else {
  echo "Error al crear la tabla CLIENTE: " . mysqli_error($conn) . "<br>";
}



/* 5 MySql OK */   /* Los símbolos de $ se escapan con: \$ */
$pueblaCLIENTE="INSERT INTO CLIENTE(username,nombre,apellidos,nif,TlfnoParticular,email,fNacimiento,sexo,calle,cp,localidad,provincia,comunidad,pais,contrasena,num_Cuenta,roll)
				VALUES(/*codCliente*/'adri82','Adrián','Laya García','16606852R','637117965','superlaya50@gmail.com','1982-06-17','H', 
						'Obispo Blanco Nájera 7, 5ºA','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10\$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','ES0000000000000000000000','admin'),						/*	Username=>adri82,	Contraseña=>alberite    roll=>admin */

            (/*codCliente*/'javi82','Javier','Hernan Martinez','16606999R','636359531','hernan@hernan.com','1982-07-19','H', 
            'C/ Najerilla 4 2ºA','44003','Nájera',
						'La Rioja','La Rioja','España','$2y$10\$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','ES3333333333333333333333','cliente'),					/*	Username=>dayanna82	Contrasena=>venezuela	roll=>cliente */


						(/*codCliente*/'edu82','Eduardo','Hormilla Urraca','16606101A','637117965','medico@medico.com','1982-01-01','H',	
						'Obispo Blanco Nájera 7, 3ºD','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10\$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','ES2222222222222222222222','cliente'),					/*	Username=>edu82,	Contraseña=>alberite	roll=>cliente */

						(/*codCliente*/'dayanna82','Dayanna','Syrbley Carrero','16606102R','637117965','dayanna@dayanna50.com','1978-07-19','H', 
						'C/ Venezuela 8 5ºA','44003','Navarrete',
						'La Rioja','La Rioja','España','$2y$10\$OF92TCIRXBH1giDrajCFou.muTfFstu7GA/qxVfxvi1RF.aWGq4ma','ES3333333333333333333333','cliente'),					/*	Username=>dayanna82	Contrasena=>venezuela	roll=>cliente */

						(/*codCliente*/'borja82','Borja','García Barquín','16606852Q','637117965','borja@borja.com','2000-01-01','H',	
						'Plaza de los Tilos 7, 5ºD','26004','Logroño',
						'La Rioja','La Rioja','España','$2y$10\$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m','ES4444444444444444444444','cliente')					/*	Username=>borja82,	Contraseña=>alberite	roll=>cliente */
						;";

// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaCLIENTE)) {
  echo "Inserción en la tabla CLIENTE exitosa <br>";
} else {
  echo "Error al insertar en la tabla CLIENTE: " . mysqli_error($conn) . "<br>";
}


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


if (mysqli_query($conn, $creaAGENCIAVIAJESCLIENTE)) {
  echo "Table AGENCIAVIAJESCLIENTE created successfully <br>";
} else {
  echo "Error al crear la tabla AGENCIAVIAJESCLIENTE: " . mysqli_error($conn) . "<br>";
}



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

  CONSTRAINT UNIQUE_Viajar  UNIQUE (cod_Destino/*,cod_Cliente*/,plaza_bus),

  FOREIGN KEY (cod_Destino)	REFERENCES DESTINO	(cod_Destino) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (cod_Cliente)	REFERENCES CLIENTE	(cod_Cliente) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (cod_Bus)		  REFERENCES BUS		  (cod_Bus)     ON UPDATE CASCADE ON DELETE CASCADE) /* ENGINE=InnoDB*/;";



if (mysqli_query($conn, $creaVIAJAR)) {
  echo "Table VIAJAR created successfully <br>";
} else {
  echo "Error al crear la tabla VIAJAR: " . mysqli_error($conn) . "<br>";
}



/* 7 MySql OK */  /* 2Eduardo 3Dayanna	4 Username=>borja82,	Contraseña=>alberite	roll=>cliente */
$pueblaViajar="INSERT INTO VIAJAR(/*cod_Viajar,*/cod_Destino,cod_Cliente,cod_Bus,plaza_Bus)
                  VALUES(16,4,16,25),(16,4,16,26),(16,4,16,29),(16,4,16,30),
                        (16,3,16,13),(16,3,16,14),(16,3,16,17),(16,3,16,18),
                        (16,2,16,1),(16,2,16,2),(16,2,16,5),(16,2,16,6),

                        (1,4,1,1),(1,4,1,2),(1,4,1,3),(1,4,1,4),
                        (1,4,1,5),(1,4,1,6),(1,4,1,7),(1,4,1,8),
                        (1,4,1,9),(1,4,1,10),(1,4,1,11),(1,4,1,12),
                        (1,4,1,13),(1,4,1,14),(1,4,1,15),(1,4,1,16),
                        (1,4,1,17),(1,4,1,18),(1,4,1,19)


        ;";

// Condicional PHP que creará la tabla
if (mysqli_query($conn, $pueblaViajar)) {
  echo "Inserción en la tabla VIAJAR exitosa <br>";
} else {
  echo "Error al insertar en la tabla VIAJAR: " . mysqli_error($conn) . "<br>";
}


$foreing_keysOn="SET FOREIGN_KEY_CHECKS=1";

if (mysqli_query($conn, $foreing_keysOn)) {
  echo "ForeignKeys activadas<br>";
} else {
  echo "Error al anular las ForeignKeys: " . mysqli_error($conn) . "<br>";}



  // Cerramos la conexión
  mysqli_close($conn);
  ?>