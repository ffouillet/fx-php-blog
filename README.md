## PHP MicroFramework + Small Blog

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/96d66d84f15a43699a34ae52510852bb)](https://www.codacy.com/app/ffouillet/fx-php-blog?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ffouillet/fx-php-blog&amp;utm_campaign=Badge_Grade)

A simple blog powered by a microframework done from scratch (except for templating).
The microframework is strongly inspired by Symfony.    
Starting file is index.php in public directory.
Some code or logic portions may look ugly, this project has been done in strong time constraint.


### Running the framework
Create the config.xml file in parameters directory, add your own logic and don't forget to create database and tables you need.

#### config.xml 
```xml
<?xml version="1.0" encoding="utf-8" ?>

<config>
    <define var="routesFilePath" value="config/routes.xml" type="absolute_path"/>
    <define var="accessControlFilePath" value="config/access_control.xml" type="absolute_path"/>

    <define var="db_driver" value="PDOMysql"/>
    <define var="db_name" value=""/>
    <define var="db_host" value=""/>
    <define var="db_user" value=""/>
    <define var="db_password" value =""/>
</config>
```
