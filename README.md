# AOT Computers – Web shop

PHP/MySQL web shop za računarsku opremu, urađen kao moj maturski rad
(oko 2021. godine). U 2026. sam ga dockerizovao, pa se pokreće jednom komandom.

> **Napomena:** Ovo je stari školski projekat i nije spreman za produkciju.
> Pisan je za PHP 5.6 i vjerovatno ima sigurnosnih propusta (npr. SQL upiti
> bez parametara). Nemoj ga postavljati javno na internet.

## Tehnologije

- PHP 5.6 (Apache)
- MariaDB 10.11
- PHPMailer (Gmail SMTP, za slanje verifikacijskih kodova)
- Docker i Docker Compose

PHP 5.6 je namjerno izabran: originalni kod i verzija PHPMailera koja je uz
njega pisani su za PHP 5.x.

## Funkcionalnosti

- Registracija i prijava korisnika uz verifikacijski kod na mejl
- Prikaz proizvoda po kategorijama (npr. procesori)
- Admin nalog

## Pokretanje lokalno

Potreban je [Docker](https://www.docker.com/) sa Docker Composeom.

1. Kloniraj repo:
```
   git clone [https://github.com/denissofovic/aot-computers-webshop.git](https://github.com/denissofovic/legacy-php-webshop)
   cd legacy-php-webshop
```

2. Napravi svoj config fajl iz predloška:
```
   include/config.php
```

3. Uredi `include/config.php`:
   - **Baza:** zadane vrijednosti već odgovaraju `docker-compose.yml`
     (`DB_HOST = 'db'`, korisnik `root`, lozinka `root`, baza `trgovina`).
   - **Admin:** generiši hash lozinke i zalijepi ga u `ADMIN_PASS_HASH`:
```
     docker compose run --rm web php -r "echo password_hash('tvoja_lozinka', PASSWORD_DEFAULT);"
```
   - **Mejl:** upiši `MAIL_USER` i `MAIL_PASS`. Gmail traži
     [App Password](https://myaccount.google.com/apppasswords)
     (mora biti uključena 2-Step Verification), a ne običnu lozinku naloga.

4. Pokreni sve:
```
   docker compose up --build
```

5. Otvori http://localhost:8080

Baza se pri prvom pokretanju sama napravi i napuni iz `db/init.sql`.

## Korisne komande

| Komanda | Šta radi |
|---|---|
| `docker compose down` | Zaustavlja kontejnere (podaci baze ostaju sačuvani) |
| `docker compose down -v` | Zaustavlja i briše podatke baze, pa se `init.sql` ponovo uveze pri sljedećem pokretanju |
| `docker compose up --build` | Ponovo gradi image (treba samo nakon izmjene `Dockerfile`-a) |

## Napomene

- Na Apple Silicon računarima PHP 5.6 image radi kroz emulaciju
  (`platform: linux/amd64`), pa može biti malo sporiji.
