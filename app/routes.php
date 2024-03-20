<?php
//add all the routes here !
$this->addRoute('Publication/index/{id1}', 'Publication,index');
$this->addRoute('Publication/create', 'Publication,create');
$this->addRoute('Publication/home', 'Publication,loadAll');