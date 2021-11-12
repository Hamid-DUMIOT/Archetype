# HAMIDDUMIOT

Le projet ArcheType est un site d'un cabinet d'architecte.

## Environnement de développement

### Pré-requis
PHP 8.0.10
Composer 
Symfony 5 
Docker
Docker-compose

# On peut verifier tout cela avec : symfony check:requirements

### Run l'environnement de dev

docker-compose up -d
symfony serve -d

# mailer
ajouter a .env.local.php :
'MAILER_DSN' => 'smtp://archetype.contact21@gmail.com:groupe11@smtp.gmail.com'