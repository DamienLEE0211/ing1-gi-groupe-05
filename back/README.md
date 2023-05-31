version php >= 8.1
```
test
```

Installer composer 
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

Installer symfony
```bash
curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash

sudo apt install symfony-cli
```

Installer les dépendances
```bash
composer require symfony/orm-pack
```

Créer la base de données (apres avoir configurer le .env)
```bash
php bin/console doctrine:database:create
```

Créer les tables
```bash
php bin/console doctrine:migrations:migrate
```

Créer des données de test
```bash
php bin/console doctrine:fixtures:load
```
Installer php-xml
```bash
sudo apt install php8.2-xml
```

Lancer le serveur
```bash
symfony server:start
```
