# **VarietApp**
Aquest projecte és una aplicació web desenvolupada amb Laravel i MySQL per gestionar el registre i la multiplicació de llavors de varietats locals. Aquest README proporciona una guia pas a pas per instal·lar, configurar i executar l'aplicació.
## **Requisits Previs**
Abans de començar, assegura't de tenir instal·lades les següents eines al teu sistema:

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (versió 7.4 o superior)
- [MySQL](https://www.mysql.com/)
- [Node.js](https://nodejs.org/) (opcional per a la compilació d'actius front-end)
## **Instal·lació**
### **1. Clonar el Repositori**
Clona el repositori del projecte des de GitHub al teu directori local:

```

git clone https://github.com/rcontreraslo/VarietApp.git

```

cd project-name
### **2. Instal·lar Dependències**
Executa el següent comandament per instal·lar totes les dependències PHP necessàries:
```

composer install

```
### **3. Configurar l'Entorn**
Obre el fitxer .env amb un editor de text i actualitza les següents línies per configurar la connexió a la base de dades:
```

DB\_CONNECTION=mysql

DB\_HOST=127.0.0.1

DB\_PORT=3306

DB\_DATABASE=nom\_de\_la\_teva\_base\_de\_dades

DB\_USERNAME=el\_teu\_usuari

DB\_PASSWORD=la\_teva\_contrasenya

```
### **4. Migrar la Base de Dades**
Executa les migracions per crear les taules necessàries a la base de dades:

```

php artisan migrate

```
### **5. Executar el Servidor de Desenvolupament**
Finalment, inicia el servidor de desenvolupament de Laravel:
```

php artisan serve

```

Ara pots accedir a l'aplicació al teu navegador a través de l'URL http://localhost:8000.
## **Llicència**
Aquest projecte està llicenciat sota la Llicència MIT. Consulta el fitxer LICENSE per a més informació.

Aquest README proporciona una guia completa per instal·lar, configurar i executar l'aplicació web. Si necessites més informació, consulta la [documentació de Laravel](https://laravel.com/docs) o contacta'ns directament.
