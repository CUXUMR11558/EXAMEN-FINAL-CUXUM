create database empresa

create table empleado (
    emp_codigo serial,
    emp_nombre varchar (50)not null,
    emp_apellido varchar (50)not null,
    emp_edad integer,
    emp_sexo varchar (50)not null,
    emp_nit varchar (50),
    emp_telefono integer,
    emp_situacion smallint default 1,
    primary key (emp_codigo)
)

create table puesto (
    pue_codigo serial,
    pue_nombre varchar (50) not null,
    pue_observacion varchar (50)not null,
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
