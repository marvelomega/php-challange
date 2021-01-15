<h1>PHP Challenge</h1>

<h3>Features</h3>

<ul>
    <li>Docker with Ngnix, Php 7.2 and Mysql 5.7.22 Images</li>
    <li>Laravel 7 with Rest APIs</li>
    <li>Eloquent ORM</li>
    <li>PhpUnity </li>
</ul>
<hr>

<h3>GIT and Structure:</h3>
<h4>Project:</h4> 
<a href="https://github.com/marvelomega/php-challenge">https://github.com/marvelomega/php-challenge</a>
         
<h4>Folders and Files:</h4>
 - config: Container's configuration files <br>
 - src: Laravel Application<br>
 - docker-compose.yml: Docker configuration file<br>
 - Dockfiler: Docker configuration file drivers 
    
<h3>Installation</h3>
<h4>Docker:</h4>
<ul>
    <li>Download: 
        <a href="https://www.docker.com/products/docker-desktop">https://www.docker.com/products/docker-desktop</a>
    </li>
    <li>(For Windows): Install Windows Subsystem Linux: 
        <a href="https://docs.microsoft.com/en-us/windows/wsl/install-win10">https://docs.microsoft.com/en-us/windows/wsl/install-win10</a>
    </li>
</ul>

<p>Once Docker is installed you should be able to run the following from command line (terminal / cmd / powershell):</p>

<h4>Composer:</h4>
<ul>
    <li>Documentation: 
        <a href="https://getcomposer.org/doc/">https://getcomposer.org/doc/</a>
     </li>
    <li>Download and Install: 
        <a href="https://getcomposer.org/download/">https://getcomposer.org/download/</a>
    </li>
</ul>

<h4>Run Application</h4>
<ol>
    <li>In src folder, open the terminal and use command <b>composer update</b>.</li>
    <li>type the following command: <b>docker-compose up -d</b></li>
    <li><b>docker exec -it php-challenge_laravel_app_1 bash</b></li>
    <li><b>cd usr/share/ngnix</b></li>
    <li><b>php artisan migrate</b> to generate the database:</li>
</ol>

<h4>Project URLs</h4>
<ul>
    <li>Application: http://localhost:8080/</li>
    <li>Database: http://localhost:3306/</li>
</ul>

<h4>Application Links</h4>
<ul>
    <li>Home Page: http://localhost:8080/</li>
    <li>Login: http://localhost:8080/login</li>
    <li>Home Page (logged): http://localhost:8000/home</li>
    <li>People: http://localhost:8000/people</li>
    <li>Ship Order: http://localhost:8000/ship-order</li>
</ul>

<h4>API URLs</h4>
<ul>
    <li>People: http://localhost:8000/api/people</li>
    <li>Person: http://localhost:8000/api/person/[id]</li>
    <li>Ship Orders: http://localhost:8000/api/ship-order</li>
</ul>

<h4>Tests</h4>
<ol>
    <li>type the following command: <b>cd src</b></li>
    <li><b>vendor/bin/phpuinit</b> to run all tests</li>
    <li><b>vendor/bin/phpuinit /test/unit/[test-name]</b> to run a specific test</li>
</ol>

<h4>Environment Info (.env)</h4>
DB_CONNECTION=mysql<br>
DB_HOST=mysqldb<br>
DB_PORT=3306<br>
DB_DATABASE=challenge<br>
DB_USERNAME=root<br>
DB_PASSWORD=laravel<br>


     
    