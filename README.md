eventcalender-symfony
=====================
This is a project using symfony, for add, remove, manage events based on categories.

objectives
==========
I am trying to achieved best cut edge understanding of symfony framework. Trying to figure out, how easy to develop a website or webservices using framework. In which case this is best for use.

## Framworks
* [Symfony 3.4](https://symfony.com/)   

#### Install
```bash
$ php -r "file_put_contents('symfony', file_get_contents('https://symfony.com/installer'));"
```
#### Create project
```bash
$ php symfony new eventcalender-symfony 3.4
```
<p style="text-align:center">OR</p>   

```bash
$ composer create-project symfony/skeleton my_project_name
```

## 

* bootstrap v4.1.0
install
```bash
$ composer require twbs/bootstrap:4.1.0
```
uninstall
```bash
$ composer remove twbs/bootstrap
```
Composer list commands
----------------------
```bash
$ composer list
```

## TWIG Template
Twig is a php template engine that is used by symfony, just like most of others, i.e. blade, Mustache, Smarty, handlebars, etc.

base file
```html
<html>
<head>
  <title>{% block title %}Welcome!{% endblock %}</title>
  {% block stylesheets %}{% endblock %}
</head>
<body>
  <header><header>
  <div class="container">
     {% block body %}{% endblock %}
  </div>
  <footer></footer>
  {% block javascripts %}{% endblock %}
</body>
</html>
```

router action file
```html
<!-- include base template -->
{% extends 'base.html.twig' %}

<!-- this content replaced with body -->
{% block body %}
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Title</h2>
    </div>
    <div class="card-body">
        <p>Welcome to Event Calender</p>
    </div>
</div>
{% endblock %}

<!-- style block replacement -->
{% block stylesheets %}
<style>
	body{font:'Verdana' 20px;}
</style>
{% endblock %}

```