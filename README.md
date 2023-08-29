# CakePHP Application Skeleton

![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

**Documentación Técnica del Sistema de Autenticación con CRUD y Exportación de Datos**

**-Introducción**

Esta documentación técnica proporciona una descripción exhaustiva del Sistema de Autenticación, que integra operaciones CRUD (Create, Read, Update, Delete) y capacidades de exportación de datos en formatos EXCEL, CSV y TXT. El sistema está construido utilizando PHP 7.4.23 bajo el framework CakePHP 4 y utiliza MySQL como base de datos.

**-Requisitos del Sistema**

El sistema requiere que se cumplan los siguientes requisitos técnicos:

PHP 7.4.23

Framework CakePHP 4

Base de datos MySQL (utilizando phpMyAdmin u otro gestor)

Servidor Apache

Biblioteca DataTables

Proceso de Instalación

- Clonar o descargar el repositorio en la ubicación deseada.

- Iniciar el proyecto CakePHP ejecutando el siguiente comando:
  - **composer create-project --prefer-dist cakephp/app:~4.0 login\_crud**


- Generar una migración para crear la tabla de usuarios con los campos requeridos:
  - **cake bake migration CreateUsers nombre:string apellido:string equipo:string edad:integer email:string:unique password created datetime modified datetime**


- Aplicar la migración en la base de datos:
  - **cake migrations migrate**


- Crear el modelo y los archivos relacionados:
  - **cake bake model Users**
  - **cake bake all users**


- Instalar el paquete de autenticación requerido:
  - **composer require "cakephp/authentication:^2.4"**


- Instalar el paquete que funciona para csv y txt
  - **composer require phpoffice/phpspreadsheet**


**Componentes y Funcionalidades**

Controlador de Usuarios (UsersController)

- **Crear Usuario**
  - Permite agregar un nuevo usuario a la base de datos proporcionando la información necesaria.
  - Ver Usuario: Proporciona detalles sobre un usuario específico en función de su ID.
  - Actualizar Usuario: Permite editar y actualizar la información de un usuario existente.
  - Eliminar Usuario: Elimina un usuario de la base de datos.
  - Autenticación y Sesiones

- **Iniciar Sesión (Login)**
  - Permite a los usuarios autenticarse utilizando su correo electrónico y contraseña encriptada. Si la autenticación es exitosa, se redirige al usuario a la página de inicio.

- **Cerrar Sesión (Logout)**
  - Permite a los usuarios cerrar su sesión actual.
  - Descarga de Datos

- **Descarga de Excel**

    - Genera un archivo XLSX que contiene los registros de usuarios, con las columnas correspondientes a ID, Nombre, Apellido, Equipo, Edad y Correo Electrónico.
- **Descarga de TXT**
  - Genera un archivo de texto plano que contiene los mismos registros de usuarios en un formato legible.
  - Modelo y Entidad de Usuarios

- **El UsersTable**
  - define la estructura y las reglas de validación de la tabla de usuarios.
  - La entidad User se encarga de encriptar y validar las contraseñas antes de almacenarlas en la base de datos.
  - Controlador de Aplicación (AppController)

- **El AppController**
  - configura la inicialización y los componentes compartidos en toda la aplicación.
  - Define las acciones que no requieren autenticación y carga los middleware esenciales, como el manejador de errores y el middleware de autenticación.
  - Clase Application

- **La clase Application**
  - configura la aplicación en términos generales.
  - Carga componentes, plugins y configuraciones requeridas.
  - Define el flujo de middleware para manejar errores, autenticación y otras tareas esenciales.
  - Configuración

- **-Uso**
  - El sistema se accede a través de una interfaz web. Los usuarios autenticados pueden utilizar las operaciones CRUD después de iniciar sesión. Además, pueden exportar datos en los formatos Excel y TXT para su análisis y manipulación externa.
- **Imagenes**
![Imagen 1](https://i.ibb.co/F5cdywC/1.png)
[![Imagen 2](https://i.ibb.co/H4rGQ63/2.png)](https://i.ibb.co/H4rGQ63/2.png)
[![Imagen 3](https://i.ibb.co/tpXpcN7/3.png)](https://i.ibb.co/tpXpcN7/3.png)
[![Imagen 4](https://i.ibb.co/wzzy9wx/4.png)](https://i.ibb.co/wzzy9wx/4.png)
[![Imagen 6](https://i.ibb.co/n78s6JX/6.png)](https://i.ibb.co/n78s6JX/6.png)
[![Imagen 7](https://i.ibb.co/KWNV5By/7.png)](https://i.ibb.co/KWNV5By/7.png)
[![Captura](https://i.ibb.co/TrCYCRS/Captura.png)](https://i.ibb.co/TrCYCRS/Captura.png)