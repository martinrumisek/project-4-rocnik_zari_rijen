# Zprovoznění projektu
- V repozitáři není zahrnutý Vendor
- Je tedy potřeba nainstalovat potřebné knihovny pomocí "composer install"
- Taky doporučuji v kořenovém adresáři vytvořit soubor .env s řádkem "CI_ENVIRONMENT = development" pro developerský režim (lepší popisky chyb)

# Aplikace
- base_url nastaveno v app na: http://localhost/project-4-rocnik_zari_rijen/

# Routy
- / - Hlavní stránka (karty závodů)
- race/(id) - Stránka závodu (tabulka ročníků)
- profile - Stránka profilu přihlášeného uživatele

# Databáze
- Na portu 3306
- Používá účet root bez hesla
- Jméno databáze: projekt_cyklistika
- Je potřeba nahrát data z projekt_cyklistika.sql

# Další informace
- Hlavní controller: Home
- Chybí stažené loga (musí se přidat do složky /assets/img/loga)