<?php
$this->addRoute('Publication/index/{id1}', 'Publication,index');
$this->addRoute('Publication/create', 'Publication,create');
$this->addRoute('Publication/home', 'Publication,loadAll');
$this->addRoute('User/register', 'User,register');
$this->addRoute('User/login', 'User,login');
$this->addRoute('User/login', 'User,login');
$this->addRoute('User/logout', 'User,logout'); //this route doesnt require a view it is only used to trigger the logout function in the User controller
$this->addRoute('Profile/home', 'Profile,profilePage');
$this->addRoute('Profile/creation', 'Profile,create');
$this->addRoute('Profile/modify', 'Profile,modify');
$this->addRoute('Profile/delete', 'Profile,delete');
