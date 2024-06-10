create database empresa


create table empleado (
    emp_codigo serial,
    emp_nombre varchar (50)not null,
    emp_apellido varchar (50)not null,
    emp_edad integer,
    emp_sexo varchar (50)not null,
    emp_nit varchar (50),
    emp_telefono integer,
    emp_puesto integer,
    emp_situacion smallint default 1,
    primary key (emp_codigo),
    FOREIGN KEY (emp_puesto) REFERENCES puesto (pue_codigo)
)

create table puesto (
    pue_codigo serial,
    pue_nombre varchar (50) not null,
    pue_sueldo integer,
    pue_situacion smallint default 1,
    primary key (pue_codigo)
)

create table area (
    are_codigo serial,
    are_nombre varchar (50)not null,
    are_observacion varchar (50),
    are_situacion smallint default 1,
    primary key (are_codigo)
)

create table asignacion_area (
    asig_codigo serial,
    asig_empleado int,
    asig_area int,
    asig_situacion smallint default 1,
    primary key (asig_codigo),
    FOREIGN KEY (asig_empleado) REFERENCES empleado (emp_codigo),
    FOREIGN KEY (asig_area) REFERENCES area (are_codigo)
)


   select asig_codigo, emp_nombre || ' ' || emp_apellido AS nombre_completo, are_nombre FROM asignacion_area 
    INNER JOIN empleado ON asig_empleado = emp_codigo
    INNER JOIN area ON asig_area = are_codigo
    WHERE asig_situacion = 1



SELECT * FROM empleado inner join puesto on emp_puesto = pue_codigo where emp_situacion = 1